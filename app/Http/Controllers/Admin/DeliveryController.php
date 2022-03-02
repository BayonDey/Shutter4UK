<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\AssignExpressDelivery;
use App\Model\DeliveryOptions;
use App\Model\ExpressDelivery;
use App\Model\ManageContent;
use App\Model\ProductCategory;
use App\Model\ProductType;
use App\Model\Supplier;
use App\Model\UserPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DeliveryController extends Controller
{
    public function express_delivery_list()
    {
        if (UserPermission::checkPermission('assign_express_delivery') > 0) {
            $dataList = DB::table('assign_express_delivery as ed')
                ->join('suppliers as s', 's.supplier_id', '=', 'ed.supplier_id')
                ->join('v2_product_types as pt', 'pt.id', '=', 'ed.product_type_id')
                ->join('v2_categories as c', 'c.id', '=', 'ed.parent_id')

                ->select(
                    'ed.*',
                    's.supplier_name',
                    'pt.pname as type_name',
                    'c.name as cat_name',
                )
                ->orderBy('pt.pname')
                ->get();
            return view('admin.delivery.express_delivery_list', [
                'dataList' => $dataList,
                'activeTR' => (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0

            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    public function assign_express_delivery()
    {
        if (UserPermission::checkPermission('assign_express_delivery', 'add') > 0) {
            $supplierList = Supplier::where('is_delete', '0')->get();
            $pTypes = ProductType::select('id', 'pname')->where('deleted', 0)->orderBy('pname')->get();
            $catList = ProductCategory::select('id', 'name')->where('deleted', 0)->get();
            return view('admin.delivery.assign_express_delivery', [
                'supplierList' => $supplierList,
                'pTypes' => $pTypes,
                'catList' => $catList,
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('express_delivery_list');
        }
    }

    public function assign_express_delivery_save(Request $request)
    {
        $input = $request->input();
        if (($request->product_type_id > 0) && ($request->supplier_id > 0) && (count($request->parent_id) > 0)) {
            $createI = 0;
            foreach ($request->parent_id as $parent_id) {
                if ($parent_id > 0) {
                    $fields['parent_id'] = $parent_id;
                    $fields['product_type_id'] = $request->product_type_id;
                    $fields['supplier_id'] = $request->supplier_id;

                    $check = AssignExpressDelivery::where('product_type_id', $request->product_type_id)
                        ->where('parent_id', $parent_id)->where('supplier_id', $request->supplier_id)->first();
                    if (empty($check)) {
                        $create = AssignExpressDelivery::create($fields);
                        if ($create) {
                            $createI++;
                        }
                    }
                }
            }
            if ($createI > 0) {
                Session::flash('success', $createI . ' row created successfully');
            } else {
                Session::flash('error', 'No row created');
            }
        } else {
            Session::flash('error', 'All fields are required');
            return redirect()->route('assign_express_delivery');
        }
        return redirect()->route('express_delivery_list');
    }

    public function  express_delivery_edit($id)
    {
        if (UserPermission::checkPermission('assign_express_delivery', 'edit') > 0) {
            $deliveryData = AssignExpressDelivery::find($id);
            $selectTypeId = $deliveryData->product_type_id;

            $supplierList = Supplier::where('is_delete', '0')->get();
            $pTypes = ProductType::select('id', 'pname')->where('deleted', 0)->orderBy('pname')->get();
            $catList = ProductCategory::select('id', 'name')->where('product_type_id', $selectTypeId)->get();

            return view('admin.delivery.express_delivery_edit', [
                'deliveryData' => $deliveryData,
                'supplierList' => $supplierList,
                'pTypes' => $pTypes,
                'catList' => $catList,
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('express_delivery_list');
        }
    }

    public function express_delivery_store(Request $request)
    {
        $input = $request->input();

        $validate = $request->validate(
            [
                'product_type_id' => 'required',
                'parent_id' => 'required',
                'supplier_id' => 'required',
            ]
        );
        $fields['product_type_id'] = $request->product_type_id;
        $fields['parent_id'] = $request->parent_id;
        $fields['supplier_id'] = $request->supplier_id;
        if ($request->id > 0) {
            $update = AssignExpressDelivery::where('id', $request->id)->update($fields);
            if ($update) {
                Session::flash('success', 'Update successfully');
            } else {
                Session::flash('error', 'Something was wrong');
            }
        } else {
            Session::flash('error', 'Data not found');
        }
        return redirect()->route('express_delivery_list', ['tr' => $request->id]);
    }

    public function assign_express_delivery_delete(Request $request)
    {
        if (UserPermission::checkPermission('assign_express_delivery', 'delete') > 0) {
            if (count($request->ids) == 0) {
                Session::flash('error', 'Not selected');
            } else {
                $delete = AssignExpressDelivery::whereIn('id', $request->ids)->delete();

                if ($delete) {
                    Session::flash('success', "Delete successfully");
                } else {
                    Session::flash('error', "Something wrong");
                }
            }
            echo 1;
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('express_delivery_list');
        }
    }
    ///////////// END:: Express Delivery=========================//
    //
    //
    //
    //=============== START:: Express Delivery Cost =============//

    public function express_delivery_cost_list()
    {
        if (UserPermission::checkPermission('express_delivery_cost') > 0) {
            $dataList = DB::table('express_delivery as ed')
                ->join('suppliers as s', 's.supplier_id', '=', 'ed.supplier_id')

                ->select(
                    'ed.*',
                    's.supplier_name',
                )
                ->orderBy('ed.id', 'DESC')
                ->get();
            return view('admin.delivery.express_delivery_cost_list', [
                'dataList' => $dataList,
                'activeTR' => (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0

            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    public function  express_delivery_cost_create()
    {
        if (UserPermission::checkPermission('express_delivery_cost', 'add') > 0) {

            $supplierList = Supplier::where('is_delete', '0')->get();
            return view('admin.delivery.express_delivery_cost_form', [
                'supplierList' => $supplierList,
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('express_delivery_cost_list');
        }
    }

    public function  express_delivery_cost_edit($id)
    {
        if (UserPermission::checkPermission('express_delivery_cost', 'edit') > 0) {
            $supplierList = Supplier::where('is_delete', '0')->get();
            $deliveryData = ExpressDelivery::find($id);
            return view('admin.delivery.express_delivery_cost_form', [
                'supplierList' => $supplierList,
                'deliveryData' => $deliveryData,
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('express_delivery_cost_list');
        }
    }


    public function express_delivery_cost_store(Request $request)
    {
        $input = $request->input();
        // dd($input);
        $validate = $request->validate(
            [
                'supplier_id' => 'required',
                'delivery_cost' => 'required',
                'delivery_cost_discount' => 'required',
                'express_delivery_text' => 'required',
            ]
        );
        $fields['supplier_id'] = $request->supplier_id;
        $fields['delivery_cost'] = $delivery_cost = $request->delivery_cost;
        $fields['delivery_cost_discount'] = $delivery_cost_discount = $request->delivery_cost_discount;
        $fields['express_delivery_text'] = $express_delivery_text = $request->express_delivery_text;
        $fields['enable_or_disable'] = $request->enable_or_disable;

        // total_cost_vat
        // total_cost_discount
        $vat = ManageContent::where('content_type', 'vat')->where('content_key', 'vat_percentage')->first()->content_sub_title;
        // dd($vat);
        if ($fields["delivery_cost"]) {

            $vat_percentage = ($vat * $delivery_cost) / 100;

            $fields["total_cost_vat"] = $vat_percentage + $delivery_cost;

            $calculatediscountcost = 0;

            if ($delivery_cost_discount != 0) {
                $calculatediscountcost = $delivery_cost - ($delivery_cost_discount * $delivery_cost) / 100;
                $calculatediscountcost = $calculatediscountcost + ($calculatediscountcost * $vat) / 100;
                $fields["total_cost_discount"] = $calculatediscountcost;
            }
        }



        $id = $request->id;

        if ($request->id > 0) {
            $update = ExpressDelivery::where('id', $request->id)->update($fields);
            if ($update) {
                Session::flash('success', 'Update successfully');
            } else {
                Session::flash('error', 'Something was wrong');
            }
        } else {
            $create = ExpressDelivery::create($fields);
            if ($create) {
                $id = $create->id;
                Session::flash('success', 'Created successfully');
            } else {
                Session::flash('error', 'Something was wrong');
            }
        }
        return redirect()->route('express_delivery_cost_list', ['tr' => $id]);
    }

    public function express_delivery_cost_delete(Request $request)
    {
        if (UserPermission::checkPermission('express_delivery_cost', 'delete') > 0) {
            if (count($request->ids) == 0) {
                Session::flash('error', 'Not selected');
            } else {
                $delete = ExpressDelivery::whereIn('id', $request->ids)->delete();

                if ($delete) {
                    Session::flash('success', "Delete successfully");
                } else {
                    Session::flash('error', "Something wrong");
                }
            }
            echo 1;
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('express_delivery_cost_list');
        }
    }
    //=============== END:: Express Delivery Cost =============//
    //
    //
    //
    //=============== START:: Manage Delivery Options =============//
    public function delivery_option_list()
    {
        if (UserPermission::checkPermission('delivery_option_list') > 0) {
            $dataList = DeliveryOptions::get();
            return view('admin.delivery.delivery_option_list', [
                'dataList' => $dataList,
                'activeTR' => (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0

            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    public function  delivery_option_create()
    {
        if (UserPermission::checkPermission('delivery_option_list', 'add') > 0) {
            return view('admin.delivery.delivery_option_form', []);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('delivery_option_list');
        }
    }

    public function  delivery_option_edit($id)
    {
        if (UserPermission::checkPermission('delivery_option_list', 'edit') > 0) {
            $rowData = DeliveryOptions::find($id);
            return view('admin.delivery.delivery_option_form', [
                'rowData' => $rowData,
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('delivery_option_list');
        }
    }

    public function delivery_option_store(Request $request)
    {
        $input = $request->input();
        // dd($input);
        $validate = $request->validate(
            [
                'name' => 'required',
                'display_name' => 'required',
                'price' => 'required',
            ]
        );
        $fields['name'] = $request->name;
        $fields['display_name'] = $display_name = $request->display_name;
        $fields['price'] = $price = $request->price;
        $fields['free_over_amount'] = ($request->free_over_amount == null) ? 0 : $request->free_over_amount;
  
        $id = $request->id;

        if ($request->id > 0) {
            $update = DeliveryOptions::where('id', $request->id)->update($fields);
            if ($update) {
                Session::flash('success', 'Update successfully');
            } else {
                Session::flash('error', 'Something was wrong');
            }
        } else {
            $create = DeliveryOptions::create($fields);
            if ($create) {
                $id = $create->id;
                Session::flash('success', 'Created successfully');
            } else {
                Session::flash('error', 'Something was wrong');
            }
        }
        return redirect()->route('delivery_option_list', ['tr' => $id]);
    }

    public function delivery_option_delete(Request $request)
    {
        if (UserPermission::checkPermission('delivery_option_list', 'delete') > 0) {
            if (count($request->ids) == 0) {
                Session::flash('error', 'Not selected');
            } else {
                $delete = DeliveryOptions::whereIn('id', $request->ids)->delete();

                if ($delete) {
                    Session::flash('success', "Delete successfully");
                } else {
                    Session::flash('error', "Something wrong");
                }
            }
            echo 1;
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('delivery_option_list');
        }
    }
    //=============== END:: Manage Delivery Options =============//
}
