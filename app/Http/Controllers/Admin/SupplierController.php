<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Model\Band;
use App\Model\Group;
use App\Model\MapBandGroup;
use App\Model\MapSubGroupOption;
use App\Model\Option;
use App\Model\ProductType;
use  Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Model\Supplier;
use App\Model\Supplierftpdetail;
use Illuminate\Http\Request;
use App\Model\UserPermission;
use App\Utility;

class SupplierController extends Controller
{
    public function supplierList()
    {
        if (UserPermission::checkPermission('view_suppliers') > 0) {
            $suppliers = Supplier::where('is_delete', '0')->get();
            $activeTR = (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0;

            // dd($suppliers[0]->bands);
            return view('admin.suppliers.supplier_list', ['suppliers' => $suppliers, 'activeTR' => $activeTR]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    public function createSupplier()
    {
        if (UserPermission::checkPermission('view_suppliers', 'add') > 0) {
            return view('admin.suppliers.supplier_form', ['supplier' => []]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('supplier_list');
        }
    }

    public function editSupplier($id)
    {
        if (UserPermission::checkPermission('view_suppliers', 'edit') > 0) {
            return view('admin.suppliers.supplier_form', ['supplier' => Supplier::where('supplier_id', $id)->first()]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('supplier_list');
        }
    }

    public function storeSupplier(Request $request)
    {
        $inputs = $request->input();

        $validate = $request->validate(
            [
                'supplier_name' => 'required',
                'address_one' => 'required',
                'postcode' => 'required',
                'account_number' => 'required',
                'supplier_login_password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6'
            ]
        );
        foreach ($inputs as $key => $val) {
            $inputs[$key] = ($val == null) ? "" : $val;
            $inputs[$key] = (in_array($key, ['edi_lead_days']) && ($inputs[$key] == '')) ? 0 : $inputs[$key];
        }
        unset($inputs['supplier_id']);
        unset($inputs['password_confirmation']);

        if ($request->supplier_login_password != '') {
            $supplier_login_password = md5($request->supplier_login_password);
            $inputs['supplier_login_password'] = $supplier_login_password;
        }

        if ($request->supplier_id == '') {
            $validate = $request->validate(
                [
                    'supplier_email' => 'required|email|unique:suppliers',
                    'phone' => 'required|unique:suppliers',
                    'supplier_login_user' => 'required|unique:suppliers',
                ]
            );
            $create = Supplier::create($inputs);
            if ($create) {
                $id = $create->supplier_id;
                Supplierftpdetail::create(['Supplier_Id' => $id, 'HostAddress' => '', 'UserName' => '', 'Password' => '']);

                Session::flash('success', 'Supplier created successfully.');
            }
        } else {
            $id = $request->supplier_id;

            unset($inputs['_token']);
            $update = Supplier::where('supplier_id', $id)->update($inputs);
            if ($update) {
                Session::flash('success', 'Supplier update successfully.');
            }
        }
        return redirect()->route('supplier_list', ['tr' => $id]);
    }

    public function deleteSupplier($id)
    {
        if (UserPermission::checkPermission('view_suppliers', 'delete') > 0) {
            $row = Supplier::where('supplier_id', $id)->update(['is_delete' => '1']);
            return redirect()->route('supplier_list');
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('supplier_list');
        }
    }



    //============== START:: Supplier FTP details ============//

    public function setSupplierFTP($supplierId)
    {
        if (UserPermission::checkPermission('view_suppliers') > 0) {
            $ftpData = Supplierftpdetail::where('Supplier_Id', $supplierId)->first();

            return view('admin.suppliers.supplier_ftp_form', ['ftpData' => $ftpData, 'supplierId' => $supplierId]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    public function storeSupplierFTP(Request $request)
    {
        $inputs = $request->input();

        $validate = $request->validate(
            [
                'HostAddress' => 'required',
                'UserName' => 'required',
                'Password' => 'min:6|required_with:Password_confirm|same:Password_confirm',
                'Password_confirm' => 'min:6'
            ]
        );

        $fields['HostAddress'] = $request->HostAddress;
        $fields['UserName'] = $request->UserName;
        $fields['Password'] = $request->Password;
        $fields['Supplier_Id'] = $request->Supplier_Id;
        if ($request->Password != '') {
            $fields['Password']  = Hash::make($request->Password);
        }

        if ($request->id == null) {

            $create = Supplierftpdetail::create($fields);
            if ($create) {
                $id = $create->id;

                Session::flash('success', 'FTP created successfully.');
            }
        } else {
            $id = $request->id;
            $update = Supplierftpdetail::where('id', $id)->update($fields);
            if ($update) {
                Session::flash('success', 'FTP update successfully.');
            }
        }
        return redirect()->route('supplier_list', ['tr' => $request->Supplier_Id]);
    }
    //============== END:: Supplier FTP details ============//

    //============== START:: Manage Bands ============//
    public function bandList($supplierId)
    {
        if (UserPermission::checkPermission('view_bands') > 0) {
            if ($supplierId > 0) {
                $bands = Band::where('supplier_id', $supplierId)->where('deleted', 0)->get();
            } else {
                $bands = Band::where('deleted', 0)->get();
            }
            $suppliers = Supplier::where('is_delete', '0')->get();
            // dd($supplierId);
            return view('admin.suppliers.band_list', [
                'supplierId' => $supplierId,
                'bands' => $bands,
                'suppliers' => $suppliers,
                'activeTR' => (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0

            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }


    public function bandCreate($supplierId)
    {
        if (UserPermission::checkPermission('view_bands', 'add') > 0) {
            $suppliers = Supplier::where('is_delete', '0')->get();
            $product_types = ProductType::where('deleted', 0)->orderBy('pname')->get();

            return view('admin.suppliers.band_create_form', [
                'supplierId' => $supplierId,
                'suppliers' => $suppliers,
                'product_types' => $product_types,
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    public function bandCreate_store(Request $request)
    {
        $inputs = $request->input();
        $validate = $request->validate(
            [
                'name' => 'required',
                'product_type_id' => 'required',
                'supplier_id' => 'required',
            ]
        );

        $create = Band::create($inputs);
        if ($create) {
            $id = $create->id;
            Session::flash('success', 'Band created successfully.');
            return redirect()->route('band_edit', $id);
        } else {
            Session::flash('error', 'Something was wrong.');
            return redirect()->route('band_list', $request->supplier_id);
        }
    }


    public function bandEdit($bandId)
    {
        if (UserPermission::checkPermission('view_bands', 'edit') > 0) {
            $la_filterGr = [];
            $suppliers = Supplier::where('is_delete', '0')->get();
            $product_types = ProductType::where('deleted', 0)->orderBy('pname')->get();
            $band = Band::find($bandId);
            if (empty($band)) {
                Session::flash('error', 'Band not found.');
                return redirect()->route('band_list', 0);
            }
            $bandGroups = MapBandGroup::where('band_id', $bandId)->where('removed', 0)->orderBy('position')->get();
            // $bandGroupsRemove = MapBandGroup::where('band_id', $bandId)->where('removed', 1)->get();
            // dd($bandGroups);
            $la_groupData = $allGroup = [];
            $grId = '';
            if (isset($_GET['grId'])) {
                $grId = $_GET['grId'];
                $la_groupData = Group::where('group_id', $_GET['grId'])->first();

                if (count($bandGroups) > 0) {
                    $grIds = [];
                    foreach ($bandGroups as $bandGr) {
                        $grIds[] = $bandGr->group_id;
                    }
                }

                // $allGroup = Group::where('group_type', 'Options')->where('deleted', 0)->whereNotIn('group_id', $grIds)->orderBy('group_admin_name')->get();

                $allGroup = DB::table('v2_group')
                    ->join('v2_map_band_group', 'v2_map_band_group.group_id', '=', 'v2_group.group_id')
                    ->select('v2_group.group_id', 'v2_group.group_admin_name', 'v2_map_band_group.removed')
                    ->whereNotIn('v2_map_band_group.group_id', $grIds)
                    ->where('v2_group.group_type', 'Options') 

                    ->where('v2_group.deleted', 0)
                    // ->groupBy('v2_map_band_group.group_id')
                    ->get();
                // dd($allGroup);

                $gr_name = '';
                foreach ($allGroup as $gr) {
                    if ($gr->group_admin_name !=  $gr_name) {
                        $la_filterGr[] = $gr;

                        $gr_name = $gr->group_admin_name;
                    }
                }
             }
            $parentOptionId = (isset($_GET['parentOptionId'])) ? $_GET['parentOptionId'] : '';


            $la_optionData = $la_optionGroup = [];
            $optionId = $groupId = '';
            if (isset($_GET['optionId'])) {
                $optionId = $_GET['optionId'];
                $groupId = $_GET['groupId'];
                $la_optionData = Option::where('option_id', $optionId)->first();
                $la_optionGroup = Group::where('group_id', $groupId)->first();
                // dd($la_optionGroup->getGroup);
            }


            // dd($band->bandGroups);

            $activeGrTR = (isset($_GET['grTR']) && ($_GET['grTR'] > 0)) ? $_GET['grTR'] : 0;
            $activeOpTR = (isset($_GET['opTR']) && ($_GET['opTR'] > 0)) ? $_GET['opTR'] : 0;

            return view('admin.suppliers.band_edit_form', [
                'suppliers' => $suppliers,
                'product_types' => $product_types,
                'band' => $band,
                'bandGroups' => $bandGroups,

                'grId' => $grId,
                'parentOptionId' => $parentOptionId,
                'la_groupData' => $la_groupData,
                'allGroup' => $la_filterGr,
                'activeGrTR' => $activeGrTR,

                'optionId' => $optionId,
                'groupId' => $groupId,
                'la_optionData' => $la_optionData,
                'la_optionGroup' => $la_optionGroup,
                'activeOpTR' => $activeOpTR,


            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }


    public function bandUpdate_store(Request $request)
    {
        $inputs = $request->input();
        unset($inputs['_token']);
        // dd($inputs);
        $validate = $request->validate(
            [
                'name' => 'required',
                'product_type_id' => 'required',
                'supplier_id' => 'required',
            ]
        );

        $update = Band::where('id', $request->id)->update($inputs);
        if ($update) {
            $id = $request->id;
            Session::flash('success', 'Band update successfully.');
            return redirect()->route('band_edit', $id);
        } else {
            Session::flash('error', 'Something was wrong.');
            return redirect()->route('band_edit', $request->id);
        }
    }

    public function bandDelete($bandId)
    {
        if (UserPermission::checkPermission('view_bands', 'delete') > 0) {
            $band = Band::find($bandId);

            $delete = Band::where('id', $bandId)->update(['deleted' => 1]);
            if ($delete) {
                Session::flash('success', 'Band deleted successfully.');
                return redirect()->route('band_list', $band->supplier_id);
            }
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }


    public function bandGroup_store(Request $request)
    {
        $groupId = $request->group_id;
        $inputs = $request->input();
        $validate = $request->validate([
            'group_title' => 'required',
            'group_admin_name' => 'required',
        ]);

        $fields['group_title'] = ($request->group_title == null) ? '' : $request->group_title;
        $fields['group_admin_name'] = ($request->group_admin_name == null) ? '' : $request->group_admin_name;
        $fields['group_type'] = ($request->group_type == null) ? '' : $request->group_type;
        $fields['popup_url'] = ($request->popup_url == null) ? '' : $request->popup_url;
        $fields['group_edi_field'] = ($request->group_edi_field == null) ? '' : $request->group_edi_field;
        $fields['textforpdf'] = ($request->textforpdf == null) ? '' : $request->textforpdf;
        $fields['description'] = ($request->description == null) ? '' : $request->description;
        $fields['pre_price'] = (isset($request->pre_price)) ? '1' : '0';

        if ($request->hasFile('pop_image')) {
            $fields['pop_image'] = Utility::saveImage($request->file('pop_image'), 'v2_group', 'pop_image');
        }
        if ($request->hasFile('UploadedPDF_File')) {
            $fields['UploadedPDF_File'] = Utility::saveImage($request->file('UploadedPDF_File'), 'v2_group', 'UploadedPDF_File');
        }

        if ($request->group_id == null) {
            $createGr = Group::create($fields);
            if ($createGr) {
                $groupId = $createGr->id;
                if ($request->parentOptionId > 0) {
                    $bandSubGroupCount = MapSubGroupOption::where('option_id', $request->parentOptionId)->count();
                    MapSubGroupOption::create(['option_id' => $request->parentOptionId, 'sub_group_id' => $groupId, 'position' => ($bandSubGroupCount + 1)]);

                    Session::flash('success', 'Sub group created successfully.');
                } else {
                    $bandGroupCount = MapBandGroup::where('band_id', $request->band_id)->count();
                    MapBandGroup::create(['band_id' => $request->band_id, 'group_id' => $groupId, 'position' => ($bandGroupCount + 1)]);

                    Session::flash('success', 'Band group created successfully.');
                }
            }
        } else {
            $fields['choice_xml'] = ($request->choice_xml == null) ? '' : $request->choice_xml;
            $fields['optionname_xml'] = ($request->optionname_xml == null) ? '' : $request->optionname_xml;
            $fields['group_isatlas'] = (isset($request->group_isatlas)) ? 1 : 0;

            $updateGr = Group::where('group_id', $request->group_id)->update($fields);
            if ($updateGr) {
                $groupId = $request->group_id;

                Session::flash('success', 'Band group update successfully.');
            }
        }
        return redirect()->route('band_edit', ['bandId' => $request->band_id, 'grTR' => $groupId]);
    }


    public function bandGroupRemove($id, $bandId, $flagId, $flag = 'group')
    {
        if (UserPermission::checkPermission('view_bands') > 0) {
            // $group = Group::where('group_id', $id)->first();
            if ($flag == 'group') {
                $delete = MapBandGroup::where('group_id', $id)->where('band_id', $bandId)->update(['removed' => 1]);
            } else {
                $delete = MapSubGroupOption::where('sub_group_id', $id)->where('option_id', $flagId)->update(['removed' => 1]);
            }
            if ($delete) {
                Session::flash('success', 'Band group removed successfully.');
            } else {
                Session::flash('error', 'Something wrong.');
            }
            return redirect()->route('band_edit', $bandId);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }


    public function bandGroupEnableDisable_ajax($grId)
    {
        $grData = Group::where('group_id', $grId)->first();
        $return = [];
        if ($grData->deleted == 0) {
            $update = Group::where('group_id', $grId)->update(['deleted' => 1]);
            if ($update) {
                $return['msg'] = 'Disable Successfully';
            }
        } else {
            $update = Group::where('group_id', $grId)->update(['deleted' => 0]);
            if ($update) {
                $return['msg'] = 'Enable Successfully';
            }
        }
        echo json_encode($return);
    }

    public function bandGroupMove($groupId, $bandId, $position, $moveFlag = 'up')
    {

        if (UserPermission::checkPermission('view_bands') > 0) {
            $group = Group::where('group_id', $groupId)->first();
            if ($moveFlag == 'up') {
                $upRow = DB::table('v2_map_band_group as mbg')
                    ->join('v2_group', 'mbg.group_id', '=', 'v2_group.group_id')
                    ->select('mbg.*')
                    ->where('mbg.band_id', $bandId)
                    ->where('mbg.position', '<', $position)
                    ->where('v2_group.deleted', 0)
                    ->orderBy('mbg.position', 'DESC')
                    ->first();
                if (empty($upRow)) {
                    Session::flash('error', 'Position has some problem.');
                    return redirect()->route('band_edit', $bandId);
                }
                $upRow_position = $upRow->position;

                $rowUpdate = MapBandGroup::where('band_id', $bandId)->where('group_id', $groupId)->update(['position' => $upRow_position]);
                $up_rowUpdate = MapBandGroup::where('band_id', $bandId)->where('group_id', $upRow->group_id)
                    ->update(['position' => $position]);
                Session::flash('success', 'Move up successfully.');
                // dd($upRow);
            } else {
                $downRow = DB::table('v2_map_band_group as mbg')
                    ->join('v2_group', 'mbg.group_id', '=', 'v2_group.group_id')
                    ->select('mbg.*')
                    ->where('mbg.band_id', $bandId)
                    ->where('mbg.position', '>', $position)
                    ->where('v2_group.deleted', 0)
                    ->orderBy('mbg.position', 'ASC')
                    ->first();

                if (empty($downRow)) {
                    Session::flash('error', 'Position has some problem.');
                    return redirect()->route('band_edit', $bandId);
                }
                $downRow_position = $downRow->position;

                $rowUpdate = MapBandGroup::where('band_id', $bandId)->where('group_id', $groupId)->update(['position' => $downRow_position]);
                $down_rowUpdate = MapBandGroup::where('band_id', $bandId)->where('group_id', $downRow->group_id)
                    ->update(['position' => $position]);
                Session::flash('success', 'Move down successfully.');
            }
            return redirect()->route('band_edit', $bandId);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }



    public function bandGroupOption_store(Request $request)
    {
        $band_id = $request->band_id;
        $group_id = $request->group_id;
        $option_id = $request->option_id;
        $inputs = $request->input();
        $validate = $request->validate([
            'option_name' => 'required',
        ]);

        $fields['group_id'] = ($request->group_id == null) ? 0 : $request->group_id;
        $fields['option_name'] = ($request->option_name == null) ? '' : $request->option_name;
        $fields['image_url'] = ($request->image_url == null) ? '' : $request->image_url;
        $fields['price_mod'] = ($request->price_mod == null) ? 0 : $request->price_mod;
        $fields['option_edi_field'] = ($request->option_edi_field == null) ? '' : $request->option_edi_field;
        $fields['price_mod_factor'] = $request->price_mod_factor;
        $fields['configdefault'] = (isset($request->configdefault)) ? '1' : '0';
        $fields['validatetooptonxml'] = (isset($request->validatetooptonxml)) ? '1' : '0';

        if ($request->hasFile('image_url')) {
            $fields['image_url'] = Utility::saveImage($request->file('image_url'), 'v2_option', 'image_url');
        }

        if ($request->option_id == 0) {
            $createOption = Option::create($fields);
            if ($createOption) {
                $option_id = $createOption->id;

                Session::flash('success', 'Option created successfully.');
            }
        } else {

            $updateOption = Option::where('option_id', $option_id)->update($fields);
            if ($updateOption) {
                Session::flash('success', 'Option update successfully.');
            }
        }
        if ($option_id > 0) {
            if ($fields['configdefault'] == '1') {
                Option::where('group_id', $fields['group_id'])->where('option_id', '!=', $option_id)
                    ->update(['configdefault' => 0]);
            }
        }
        return redirect()->route('band_edit', ['bandId' => $request->band_id, 'opTR' => $option_id]);
    }


    public function bandGroupOptionDelete($optionId, $bandId)
    {
        if (UserPermission::checkPermission('view_bands') > 0) {
            $option = Option::where('option_id', $optionId)->first();

            $delete = Option::where('option_id', $optionId)->update(['deleted' => 1]);
            if ($delete) {
                Session::flash('success', 'Option deleted successfully.');
            } else {
                Session::flash('error', 'Something wrong.');
            }
            return redirect()->route('band_edit', $bandId);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    public function enableWebUpdate(Request $request)
    {
        $inputs = $request->input();

        $MapBandGroup = MapBandGroup::where('band_id', $request->band_id)->get();

        foreach ($MapBandGroup as $groupData) {
            $update = Group::where('group_id', $groupData->group_id)->update(['enableordisable' => '1']);
            $group = Group::where('group_id', $groupData->group_id)->first();

            $groupOptios = $group->groupOptios;
            if (!empty($groupOptios)) {
                foreach ($groupOptios as $option) {
                    $update = Option::where('option_id', $option->option_id)->update(['disableid' => '1']);

                    $la_subGroups = MapSubGroupOption::where('option_id', $option->option_id)->get();
                    if (!empty($la_subGroups)) {
                        // dd($la_subGroups);
                        foreach ($la_subGroups as $subGroup) {
                            $update = Group::where('group_id', $subGroup->sub_group_id)->update(['enableordisable' => '1']);


                            $la_subGrOptions = Option::where('group_id', $subGroup->sub_group_id)->get();
                            if (!empty($la_subGrOptions)) {
                                foreach ($la_subGrOptions as $subGrOption) {
                                    $update = Option::where('option_id', $subGrOption->option_id)->update(['disableid' => '1']);
                                }
                            }
                        }
                    }
                }
            }
        }



        if (isset($request->group_enableordisable)) {

            foreach ($request->group_enableordisable as $group_id => $row) {
                $update = Group::where('group_id', $group_id)->update(['enableordisable' => '0']);
            }
        }
        if (isset($request->option_disableid)) {
            foreach ($request->option_disableid as $option_id => $row) {
                $update = Option::where('option_id', $option_id)->update(['disableid' => '0']);
            }
        }
        return redirect()->route('band_edit', ['bandId' => $request->band_id]);
    }
    //============== END:: Manage Bands ============//


    public function copyBand(Request $request)
    {
        $groups = MapBandGroup::where('band_id', $request->band_id)->get();
        $bandRow = Band::find($request->band_id);
        // dd($groups);
        $newBandName = $request->new_band_name;
        if ($newBandName != '') {
            unset($bandRow->id);
            $bandRow->name = $newBandName;

            $newBand = Band::create($bandRow->toArray()); //-- Copy Band
            if ($newBand->id) {
                if (!empty($groups)) {
                    foreach ($groups as $gr) {
                        if ($gr->group_id > 0) {
                            $group = Group::where('group_id', $gr->group_id)->first();
                            $groupOptios = $group->groupOptios;

                            unset($group->group_id);
                            $group->pre_price = ($group->pre_price != '') ? $group->pre_price : '0';
                            // dd($group->toArray());
                            $newGr = Group::create($group->toArray()); // Create Group
                            if ($newGr->id) {
                                $bandGrCt = MapBandGroup::where('band_id', $newBand->id)->count();
                                MapBandGroup::create(['band_id' => $newBand->id, 'group_id' => $newGr->id, 'position' => ($bandGrCt + 1)]);

                                if (!empty($groupOptios)) {
                                    foreach ($groupOptios as $op) {
                                        $option = Option::where('option_id', $op->option_id)->first();

                                        $subGroups = MapSubGroupOption::where('option_id', $op->option_id)->get();

                                        unset($option->option_id);
                                        $option->group_id = $newGr->id;
                                        $option->price_mod_factor = ($option->price_mod_factor != '') ? $option->price_mod_factor : 'pc';
                                        $newOption = Option::create($option->toArray()); // Create Option

                                        if ($newOption->id) {
                                            if (!empty($subGroups)) {
                                                foreach ($subGroups as $subGr) {
                                                    $subGroup = Group::where('group_id', $subGr->sub_group_id)->first();

                                                    $subGrOptions = Option::where('group_id', $subGroup->group_id)->get();

                                                    unset($subGroup->group_id);
                                                    $subGroup->pre_price = ($subGroup->pre_price != '') ? $subGroup->pre_price : '0';
                                                    $newSubGr = Group::create($subGroup->toArray()); // Create Sub Group

                                                    if ($newSubGr->id) {
                                                        MapSubGroupOption::create(['option_id' => $newOption->id, 'sub_group_id' => $newSubGr->id]);
                                                        if (!empty($subGrOptions)) {
                                                            foreach ($subGrOptions as $sbGrOption) {
                                                                unset($sbGrOption->option_id);

                                                                $sbGrOption->group_id = $newSubGr->id;
                                                                $sbGrOption->price_mod_factor = ($sbGrOption->price_mod_factor != '') ? $sbGrOption->price_mod_factor : 'pc';
                                                                $newSubOption = Option::create($sbGrOption->toArray()); // Create Sub Option
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                Session::flash('success', 'Band copy successfully.');
                            }


                            return redirect()->route('band_list',  ['supplierId' => $newBand->supplier_id, 'tr' => $newBand->id]);
                        }
                    }
                }
            }
        } else {
            Session::flash('error', 'No Band name specified.');

            return redirect()->route('band_list', ['supplierId' => $bandRow->supplier_id, 'tr' => $request->band_id]);
        }
    }

    public function importGroupToBand(Request $request)
    {
        if ($request->group_id > 0) {
            $group = Group::where('group_id', $request->group_id)->first();
            $groupOptios = $group->groupOptios;

            unset($group->group_id);
            $group->pre_price = ($group->pre_price != '') ? $group->pre_price : '0';
            $group->group_title = $group->group_title. ' -copy';
            $group->group_admin_name = $group->group_admin_name. ' -copy';
            // dd($group->toArray());
            $newGr = Group::create($group->toArray()); // Create Group
            if ($newGr->id) {
                $bandGrCt = MapBandGroup::where('band_id', $request->band_id)->count();
                MapBandGroup::create(['band_id' => $request->band_id, 'group_id' => $newGr->id, 'position' => ($bandGrCt + 1)]);

                if (!empty($groupOptios)) {
                    foreach ($groupOptios as $op) {
                        $option = Option::where('option_id', $op->option_id)->first();

                        $subGroups = MapSubGroupOption::where('option_id', $op->option_id)->get();

                        unset($option->option_id);
                        $option->group_id = $newGr->id;
                        $option->price_mod_factor = ($option->price_mod_factor != '') ? $option->price_mod_factor : 'pc';
                        $newOption = Option::create($option->toArray()); // Create Option

                        if ($newOption->id) {
                            if (!empty($subGroups)) {
                                foreach ($subGroups as $subGr) {
                                    $subGroup = Group::where('group_id', $subGr->sub_group_id)->first();

                                    $subGrOptions = Option::where('group_id', $subGroup->group_id)->get();

                                    unset($subGroup->group_id);
                                    $subGroup->pre_price = ($subGroup->pre_price != '') ? $subGroup->pre_price : '0';
                                    $newSubGr = Group::create($subGroup->toArray()); // Create Sub Group

                                    if ($newSubGr->id) {
                                        MapSubGroupOption::create(['option_id' => $newOption->id, 'sub_group_id' => $newSubGr->id]);
                                        if (!empty($subGrOptions)) {
                                            foreach ($subGrOptions as $sbGrOption) {
                                                unset($sbGrOption->option_id);

                                                $sbGrOption->group_id = $newSubGr->id;
                                                $sbGrOption->price_mod_factor = ($sbGrOption->price_mod_factor != '') ? $sbGrOption->price_mod_factor : 'pc';
                                                $newSubOption = Option::create($sbGrOption->toArray()); // Create Sub Option
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                Session::flash('success', 'Band group imported successfully.');
            }


            return redirect()->route('band_edit', ['bandId' => $request->band_id, 'grTR' => $newGr->id]);
        }
    }
}
