<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\GuideLandingValue;
use App\Model\GuideText;
use App\Model\Supplier;
use App\Model\ProductGuide;
use Illuminate\Http\Request;
use App\Utility;
use  Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Validator;
use App\Model\UserPermission;
use App\Model\ProductType;
use App\Model\Band;
use App\Model\Product;

class GuideController extends Controller
{
    public function guideList()
    {
        if (UserPermission::checkPermission('manage_guide_text') > 0) {
            $guides = GuideText::where('deleted', 0)->get();
            $activeTR = (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0;

            return view('admin.guide.guide_list', ['guides' => $guides, 'activeTR' => $activeTR]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    public function guideCreate()
    {
        if (UserPermission::checkPermission('manage_guide_text', 'add') > 0) {
            return view('admin.guide.guide_form');
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('guide_list');
        }
    }

    public function guideEdit($id)
    {
        if (UserPermission::checkPermission('manage_guide_text', 'edit') > 0) {
            $guide = GuideText::find($id);
            return view('admin.guide.guide_form', ['guide' => $guide]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('guide_list');
        }
    }


    public function guide_store(Request $request)
    {
        $inputs = $request->input();
        $id = $request->id;

        $validate = $request->validate(
            [
                'text' => 'required',
            ]
        );

        $fields['text'] = $request->text;
        $fields['link'] = ($request->link == null) ? '' : $request->link;

        if ($request->hasFile('PDF_Upload')) {
            $fields['PDF_Upload'] = Utility::saveImage($request->file('PDF_Upload'), 'v2_guide_text', 'PDF_Upload');
        }

        if ($request->id == null) {
            $create = GuideText::create($fields);
            if ($create) {
                $id = $create->id;
                Session::flash('success', 'Guide added successfully');
            }
        } else {
            $id = $request->id;
            $update = GuideText::where('id', $id)->update($fields);
            if ($update) {
                Session::flash('success', 'Guide update successfully');
            }
        }
        return redirect()->route('guide_list', ['tr' => $id]);
    }

    public function guideDelete($id)
    {
        if (UserPermission::checkPermission('manage_guide_text', 'delete') > 0) {
            $delete = GuideText::where('id', $id)->update(['deleted' => 1]);
            if ($delete) {
                Session::flash('success', 'Deleted successfully');
            }
            return redirect()->route('guide_list');
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('guide_list');
        }
    }


    public function productGuideList()
    {
        if (UserPermission::checkPermission('manage_product_guide') > 0) {
            $guideList = ProductGuide::get();
            $activeTR = (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0;

            return view('admin.guide.product_guide_list', ['guideList' => $guideList, 'activeTR' => $activeTR]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    public function productGuideCreate()
    {
        if (UserPermission::checkPermission('manage_product_guide', 'add') > 0) {
            return view('admin.guide.product_guide_form');
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('product_guide');
        }
    }

    public function productGuideEdit($id)
    {
        if (UserPermission::checkPermission('manage_product_guide', 'edit') > 0) {
            $proGuide = ProductGuide::find($id);

            $textIds = [];
            if (count($proGuide->guideLandingValueMap) > 0) {
                foreach ($proGuide->guideLandingValueMap as $map) {
                    $textIds[] = $map->text_id;
                }
            }

            $guideText = GuideText::whereNotIn('id', $textIds)->where('deleted', 0)->get();
            // dd($guideText);
            // dd($proGuide->guideLandingValueMap);
            return view('admin.guide.product_guide_form', ['id' => $id, 'proGuide' => $proGuide, 'guideText' => $guideText]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('product_guide');
        }
    }

    public function productGuide_store(Request $request)
    {
        $inputs = $request->input();
        $id = $request->id;

        $validate = $request->validate([
            'name' => 'required',
        ]);

        $fields['name'] = $request->name;

        if ($request->id == null) {
            $create = ProductGuide::create($fields);
            if ($create) {
                $id = $create->id;
                Session::flash('success', 'Guide added successfully');
            }
        } else {
            $id = $request->id;
            $update = ProductGuide::where('id', $id)->update($fields);
            if ($update) {
                Session::flash('success', 'Guide update successfully');
            }
        }
        return redirect()->route('product_guide_edit', $id);
    }

    public function productGuideDelete($id)
    {
        if (UserPermission::checkPermission('manage_product_guide', 'delete') > 0) {
            $delete = ProductGuide::find($id)->delete();
            if ($delete) {
                Session::flash('success', 'Delete successfully');
                return redirect()->route('product_guide');
            }
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('product_guide');
        }
    }


    public function productGuideField_store(Request $request)
    {
        $inputs = $request->input();
        // dd($inputs );
        if (($request->guide_text_id > 0) && ($request->guide_id > 0)) {
            $fieldAdd = GuideLandingValue::create(['text_id' => $request->guide_text_id, 'guide_id' => $request->guide_id, 'value' => '']);
            if ($fieldAdd) {
                Session::flash('success', 'Field added successfully');
            }
        }
        return redirect()->route('product_guide_edit', $request->guide_id);
    }

    public function productGuideField_image_and_delete(Request $request)
    {
        $inputs = $request->input();

        if ($request->click_type == 'save_img') {

            if ($request->hasFile('imgvalue')) {
                foreach ($request->imgvalue as $id => $row) {
                    $oldRow = GuideLandingValue::find($id);
                    $imageName = Utility::saveImage($row, 'guide_landing_values', $id);

                    $update = GuideLandingValue::where('id', $id)->update(['value' => $imageName]);
                    if ($oldRow) {
                        Utility::unlinkFile($oldRow->value, 'guide_landing_values');
                    }
                }
            }
        } elseif ($request->click_type == 'delete') {
            if ((isset($request->delete)) && (count($request->delete) > 0)) {
                foreach ($request->delete as $id => $row) {
                    $oldRow = GuideLandingValue::find($id);
                    $fieldDel = GuideLandingValue::find($id)->delete();
                    if ($fieldDel) {
                        Utility::unlinkFile($oldRow->value, 'guide_landing_values');
                        Session::flash('success', 'Deleted successfully');
                    }
                }
            }
        }



        return redirect()->route('product_guide_edit', $request->guide_id);
    }



    public function assign_group_to_product()
    {
        if (UserPermission::checkPermission('assign_group_to_product') > 0) {
            $guideList = ProductGuide::get();
            $supplierList = Supplier::where('is_delete', '0')->get();
            $pTypes = ProductType::select('id', 'pname')->where('deleted', 0)->orderBy('pname')->get();
            $bandList = Band::select('id', 'name')->where('deleted', 0)->orderBy('name')->get();

            $productList =  Product::select('id', 'name')->where('deleted', 0)->orderBy('name')->get();
            return view('admin.guide.assign_group_to_product', [
                'guideList' => $guideList,
                'supplierList' => $supplierList,
                'pTypes' => $pTypes,
                'bandList' => $bandList,
                'productList' => $productList,
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }


    public function guide_matrix()
    {
        $get = $_GET;
        $flag = $get['flag'];
        $supplier_id = $get['supplier_id'];
        $product_type_id = $get['product_type_id'];
        $band_id = (isset($get['band_id'])) ? (((count($get['band_id']) == 1) && ($get['band_id'][0] == 0)) ? 0 : $get['band_id']) : 0;   //=== $get['band_id'] = []
        $product_id = (isset($get['product_id'])) ? (((count($get['product_id']) == 1) && ($get['product_id'][0] == 0)) ? 0 : $get['product_id']) : 0;   //=== $get['product_id'] = []
        $bandList = $productList = [];
        $chain_text = 'All Blinds';
        // dd($get);
        $return = [];

        if (($flag == 'supplier_id') || ($flag == 'product_type_id')) {
            if (($supplier_id == 0) && ($product_type_id == 0)) {
                $chain_text = "All Blinds";
                $bandList = Band::select('id', 'name')->where('deleted', 0)->orderBy('name')->get();
                $productList =  Product::select('id', 'name')->where('deleted', 0)->orderBy('name')->get();
            } elseif (($supplier_id == 0) && ($product_type_id > 0)) {
                $bandList = Band::select('id', 'name')->where('product_type_id', $product_type_id)->where('deleted', 0)->orderBy('name')->get();
                $productList =  Product::select('id', 'name')->where('product_type_id', $product_type_id)->where('deleted', 0)->orderBy('name')->get();
           
                $pType = ProductType::find($product_type_id);
                if(!empty($pType)){
                    $chain_text = "All $pType->pname Blinds";
                }

            } elseif (($supplier_id > 0) && ($product_type_id == 0)) {
                $bandList = Band::select('id', 'name')->where('supplier_id', $supplier_id)->where('deleted', 0)->orderBy('name')->get();
                $productList =  Product::select('id', 'name')->where('supplier_id', $supplier_id)->where('deleted', 0)->orderBy('name')->get();
          
                $supplier = Supplier::where('supplier_id', $supplier_id)->first();
                if(!empty($supplier)){
                    $chain_text = "All Blinds from supplier $supplier->supplier_name";
                }
            } elseif (($supplier_id > 0) && ($product_type_id > 0)) {
                $bandList = Band::select('id', 'name')->where('supplier_id', $supplier_id)->where('product_type_id', $product_type_id)->where('deleted', 0)->orderBy('name')->get();
                $productList =  Product::select('id', 'name')->where('supplier_id', $supplier_id)->where('product_type_id', $product_type_id)->where('deleted', 0)->orderBy('name')->get();
            }
        } elseif (($flag == 'band_id')) {
            $productList = GuideText::product_list_filter_with_band($supplier_id, $product_type_id, $band_id);
        }

        $bandList_html = "<option value='0'>All Bands</option>";
        $productList_html = "<option value='0'>All Products</option>";
        if (count($bandList) > 0) {
            foreach ($bandList as $band) {
                $bandList_html .= "<option value='$band->id'>$band->name</option>";
            }
        } else {
            $bandList_html = "<option value='0'>No Bands</option>";
        }

        if (count($productList) > 0) {
            foreach ($productList as $product) {
                $productList_html .= "<option value='$product->id'>$product->name</option>";
            }
        } else {
            $productList_html = "<option value='0'>No Products</option>";
        }
        $return['bandList_html'] = $bandList_html;
        $return['productList_html'] = $productList_html;
        $return['chain_text'] = '';

        echo json_encode($return);
    }

    public  function guide_matrix_save(Request $request)
    {
        $inputs = $request->input();
        // dd($inputs);
        $guide_id = ($request->guide_id == null) ? 0 : $request->guide_id;
        $band_ids = (isset($request->band_ids)) ? (((count($request->band_ids) == 1) && ($request->band_ids[0] == 0)) ? 0 : $request->band_ids) : 0;   //=== request->band_ids = []
        $product_ids = (isset($request->product_ids)) ? (((count($request->product_ids) == 1) && ($request->product_ids[0] == 0)) ? 0 : $request->product_ids) : 0;   //=== request->product_ids = []

        $li_product = 0;
        if ($product_ids != 0) {

            foreach ($product_ids as $product_id) {
                // dd($product_id."==".$guide_id);
                if (GuideText::update_matrix_guide($product_id, $guide_id)) {
                    $li_product++;
                }
            }

            if ($li_product > 0) {
                Session::flash('success', "Guide assigned successfully to $li_product products");
            } else {
                Session::flash('error', "No guide assigned");
            }
        } elseif (($product_ids != 0) || ($band_ids != 0) || ($request->supplier_id > 0) || ($request->product_type_id > 0)) {
            if ($band_ids != 0) {
                $productList = GuideText::product_list_filter_with_band($request->supplier_id, $request->product_type_id, $band_ids);
            } else {
                $productList = GuideText::product_list_filter($request->supplier_id, $request->product_type_id);
            }
            foreach ($productList as $product) {
                if (GuideText::update_matrix_guide($product->id, $guide_id)) {
                    $li_product++;
                }
            }

            if ($li_product > 0) {
                Session::flash('success', "Guide assigned successfully to $li_product products");
            } else {
                Session::flash('error', "No guide assigned");
            }
        } else {
            Session::flash('error', "You have not made a selection");
        }

        return redirect()->route('assign_group_to_product');
        // dd($inputs);
    }
}
