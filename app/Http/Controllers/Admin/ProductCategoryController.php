<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Session;
use App\Utility;
use App\Model\ProductCategory;
use App\Model\Product;
use App\Model\ProductType;
use App\Model\UserPermission;

class ProductCategoryController extends Controller
{

    public function getProductCatList($product_type_id)
    {
        $product_types = ProductType::select('id', 'pname')->where('deleted', 0)->orderBy('order_no')->get();
        if ($product_type_id == 0 && (count($product_types) > 0)) {
            $product_type_id = $product_types[0]->id;
        }
        // if ($product_type_id == 0) {
        //     $product_cat = DB::table('v2_categories')->select('id', 'name', 'product_type_id', 'promote_to_front', 'order_no')->orderBy('order_no')->get();
        // } else {
        $product_cat = ProductCategory::select('id', 'name', 'product_type_id', 'promote_to_front', 'order_no')
            ->where('product_type_id', $product_type_id)->where('deleted', 0)->orderBy('order_no')
            ->get();
        // }

        return view(
            'admin.product.product_cat_list',
            [
                'product_type_id' => $product_type_id,
                'product_types' => $product_types,
                'product_cat' => $product_cat
            ]
        );
    }

    public function productCatUpDown($id, $product_type_id, $flag)
    {
        if ($flag == 'top') {
            ProductCategory::where('id', '!=', $id)->where('product_type_id', $product_type_id)->update(['order_no' => DB::raw('order_no + 1')]);
            ProductCategory::where('id', $id)->update(['order_no' => 1]);
        } elseif ($flag == 'up') {
            $pTypeRow = ProductCategory::find($id);
            $pTypeRow_currentNo = $pTypeRow->order_no;

            $lessOrderType = ProductCategory::select('id', 'order_no')->where('product_type_id', $product_type_id)->where('order_no', '<', $pTypeRow_currentNo)->where('deleted', 0)->orderBy('order_no', 'DESC')->first();
            $pTypeRow_previousId = $lessOrderType->id;
            $pTypeRow_previousNo = $lessOrderType->order_no;

            ProductCategory::where('id', $id)->update(['order_no' => $pTypeRow_previousNo]);
            ProductCategory::where('id', $pTypeRow_previousId)->update(['order_no' => $pTypeRow_currentNo]);
        } elseif ($flag == 'down') {
            $pTypeRow = ProductCategory::find($id);
            $pTypeRow_currentNo = $pTypeRow->order_no;

            $lessOrderType = ProductCategory::select('id', 'order_no')->where('product_type_id', $product_type_id)->where('order_no', '>', $pTypeRow_currentNo)->where('deleted', 0)->orderBy('order_no')->first();
            $pTypeRow_nextId = $lessOrderType->id;
            $pTypeRow_nextNo = $lessOrderType->order_no;

            ProductCategory::where('id', $id)->update(['order_no' => $pTypeRow_nextNo]);
            ProductCategory::where('id', $pTypeRow_nextId)->update(['order_no' => $pTypeRow_currentNo]);
        } elseif ($flag == 'bottom') {
            $li_totalPType = ProductCategory::where('product_type_id', $product_type_id)->count();
            $pTypeRow = ProductCategory::find($id);
            $pTypeRow_currentNo = $pTypeRow->order_no;

            ProductCategory::where('id', '!=', $id)->where('product_type_id', $product_type_id)->where('order_no', '>', $pTypeRow_currentNo)
                ->update(['order_no' => DB::raw('order_no - 1')]);
            ProductCategory::where('id', $id)->update(['order_no' => $li_totalPType]);
        }
        // return redirect()->route('product_cat_list', $product_type_id);
        return redirect()->route('product');
    }

    public function sampleAvailableOrNot($id, $product_type_id, $flag)
    {
        // You can use this form to allow all products in all categories and sub-categories under New Collection to be offered as samples
        Product::where('parent_id', $id)->where('product_type_id', $product_type_id)->update(['allow_samples' => $flag]);
        Session::flash('success', 'Update successfully');
        return redirect()->route('product');

        // return redirect()->route('product_list', ['product_type_id' => $product_type_id, 'parent_id' => $id]);
    }


    public function createProductCategory($product_type_id)
    {
        if (UserPermission::checkPermission('products', 'add') > 0) {

            $product_types = ProductType::select('id', 'pname')->where('deleted', 0)->orderBy('order_no')->get();
            $pParentCat = ProductCategory::select('id', 'name')->where('product_type_id', $product_type_id)
                ->where('parent_id', 0)->where('deleted', 0)->orderBy('order_no')->get();
            $product_templates = DB::table('v2_product_templates')->where('status_deleted', 0)->orderBy('name', 'ASC')->get();
            $collection_images = DB::table('v3_collection_images')->orderBy('name', 'ASC')->get();

            return view('admin.product.product_category_form', [
                'product_type_id' => $product_type_id,
                'pTypes' => $product_types,
                'pParentCat' => $pParentCat,
                'pTemplate' => $product_templates,
                'collection_images' => $collection_images,
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('product');
        }
    }

    public function editProductCategory($id)
    {
        if (UserPermission::checkPermission('products', 'edit') > 0) {
            $product_types = ProductType::select('id', 'pname')->where('deleted', 0)->orderBy('order_no')->get();
            $product_templates = DB::table('v2_product_templates')->where('status_deleted', 0)->orderBy('name', 'ASC')->get();

            $pCat = ProductCategory::find($id);

            $pParentCat = ProductCategory::select('id', 'name')->where('product_type_id', $pCat->product_type_id)
                ->where('deleted', 0)->orderBy('order_no')->get();
            $collection_images = DB::table('v3_collection_images')->orderBy('name', 'ASC')->get();

            return view('admin.product.product_category_form', [
                'pCat' => $pCat, 'pTypes' => $product_types,
                'pParentCat' => $pParentCat,
                'pTemplate' => $product_templates,
                'collection_images' => $collection_images,

            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('product');
        }
    }


    public function storeProductCategory(Request $request)
    {
        $inputs = $request->all();
        $validate = $request->validate([
            'name' => 'required',
        ]);
        $inputs['assigneddeliverydate'] = $inputs['HolidayLeadDate'] = $inputs['mngMessageDate'] = date('Y-m-d');
        $image_logo = $image_name = $first_swatch_image = $first_swatch_UploadPDF = $second_swatch_image = $second_swatch_UploadPDF = '';
        $third_swatch_image = $third_swatch_UploadPDF = $leftcornerimage = $f_scroll_image = $express_delivery = '';
        // dd($inputs);
        foreach ($inputs as $key => $val) {
            $inputs[$key] = ($val == null) ? "" : $val;
        }
        $inputs['louvres_only_available'] = (isset($inputs['louvres_only_available'])) ? 1 : 0;
        if ($request->hasFile('image_name')) {
            $inputs['image_name'] = Utility::saveImage($request->file('image_name'), 'v2_categories', 'image_name');
        }
        if ($request->hasFile('first_swatch_image')) {
            $inputs['first_swatch_image'] = Utility::saveImage($request->file('first_swatch_image'), 'v2_categories', 'first_swatch_image');
        }
        if ($request->hasFile('first_swatch_UploadPDF')) {
            $inputs['first_swatch_UploadPDF'] = Utility::saveImage($request->file('first_swatch_UploadPDF'), 'v2_categories', 'first_swatch_UploadPDF');
        }
        if ($request->hasFile('second_swatch_image')) {
            $inputs['second_swatch_image'] = Utility::saveImage($request->file('second_swatch_image'), 'v2_categories', 'second_swatch_image');
        }
        if ($request->hasFile('second_swatch_UploadPDF')) {
            $inputs['second_swatch_UploadPDF'] = Utility::saveImage($request->file('second_swatch_UploadPDF'), 'v2_categories', 'second_swatch_UploadPDF');
        }
        if ($request->hasFile('third_swatch_image')) {
            $inputs['third_swatch_image'] = Utility::saveImage($request->file('third_swatch_image'), 'v2_categories', 'third_swatch_image');
        }
        if ($request->hasFile('third_swatch_UploadPDF')) {
            $inputs['third_swatch_UploadPDF'] = Utility::saveImage($request->file('third_swatch_UploadPDF'), 'v2_categories', 'third_swatch_UploadPDF');
        }
        if ($request->hasFile('leftcornerimage')) {
            $inputs['leftcornerimage'] = Utility::saveImage($request->file('leftcornerimage'), 'v2_categories', 'leftcornerimage');
        }
        if ($request->hasFile('f_scroll_image')) {
            $inputs['f_scroll_image'] = Utility::saveImage($request->file('f_scroll_image'), 'v2_categories', 'f_scroll_image');
        }
        if ($request->hasFile('express_delivery')) {
            $inputs['express_delivery'] = Utility::saveImage($request->file('express_delivery'), 'v2_categories', 'express_delivery');
        }

        if ($request->id == 0) {
            $ProductCategory = ProductCategory::create($inputs);
            if ($ProductCategory) {
                $id = $ProductCategory->id;
                Session::flash('success', 'Creaeted successfully');
            }
        } else {
            $id = $request->id;
            $pCat = ProductCategory::find($id);

            $old_image_name = $pCat->image_name;
            $old_first_swatch_image = $pCat->first_swatch_image;
            $old_first_swatch_UploadPDF = $pCat->first_swatch_UploadPDF;
            $old_second_swatch_image = $pCat->second_swatch_image;
            $old_second_swatch_UploadPDF = $pCat->second_swatch_UploadPDF;
            $old_third_swatch_image = $pCat->third_swatch_image;
            $old_third_swatch_UploadPDF = $pCat->third_swatch_UploadPDF;
            $old_leftcornerimage = $pCat->leftcornerimage;
            $old_f_scroll_image = $pCat->f_scroll_image;
            $old_express_delivery = $pCat->express_delivery;

            if (isset($inputs['switch_frontAll'])) {
                $updatePro = Product::where('parent_id', $id)->update(['promote_to_front' => 't']);
            }
            unset($inputs['_token']);
            unset($inputs['switch_frontAll']);
            // dd($inputs);
            $update = ProductCategory::where('id', $id)->update($inputs);
            Session::flash('success', 'Update successfully');

            if ($update) {
                if (($old_image_name != '') && ($request->hasFile('image_name'))) {
                    Utility::unlinkFile($old_image_name, 'v2_categories');
                }
                if (($old_first_swatch_image != '') && ($request->hasFile('first_swatch_image'))) {
                    Utility::unlinkFile($old_first_swatch_image, 'v2_categories');
                }
                if (($old_first_swatch_UploadPDF != '') && ($request->hasFile('first_swatch_UploadPDF'))) {
                    Utility::unlinkFile($old_first_swatch_UploadPDF, 'v2_categories');
                }
                if (($old_second_swatch_image != '') && ($request->hasFile('second_swatch_image'))) {
                    Utility::unlinkFile($old_second_swatch_image, 'v2_categories');
                }
                if (($old_second_swatch_UploadPDF != '') && ($request->hasFile('second_swatch_UploadPDF'))) {
                    Utility::unlinkFile($old_second_swatch_UploadPDF, 'v2_categories');
                }
                if (($old_third_swatch_image != '') && ($request->hasFile('third_swatch_image'))) {
                    Utility::unlinkFile($old_third_swatch_image, 'v2_categories');
                }
                if (($old_third_swatch_UploadPDF != '') && ($request->hasFile('third_swatch_UploadPDF'))) {
                    Utility::unlinkFile($old_third_swatch_UploadPDF, 'v2_categories');
                }
                if (($old_leftcornerimage != '') && ($request->hasFile('leftcornerimage'))) {
                    Utility::unlinkFile($old_leftcornerimage, 'v2_categories');
                }
                if (($old_f_scroll_image != '') && ($request->hasFile('f_scroll_image'))) {
                    Utility::unlinkFile($old_f_scroll_image, 'v2_categories');
                }
                if (($old_express_delivery != '') && ($request->hasFile('express_delivery'))) {
                    Utility::unlinkFile($old_express_delivery, 'v2_categories');
                }
            }
        }
        // return redirect()->route('product_cat_list', $request->product_type_id);
        return redirect()->route('product', ['type' => $request->product_type_id]);
    }


    public function deleteProductCategory($id)
    {
        if (UserPermission::checkPermission('products', 'delete') > 0){
            $ProductCategory = ProductCategory::find($id);
            ProductCategory::where('id', $id)->update(['deleted' => 1]);
            Product::where('parent_id', $id)->update(['deleted' => 1]);
            Session::flash('success', 'Deleted successfully');
            // return redirect()->route('product_cat_list', $ProductCategory->product_type_id);
            return redirect()->route('product');
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('product');
        }
    }

    public function getProCatByTypeId_ajax($product_type_id)
    {
        $product_cat = ProductCategory::select('id', 'name')
            ->where('product_type_id', $product_type_id)->where('deleted', 0)->orderBy('order_no')
            ->get();
        $selectCat = "<option value=''>None</option>";
        if (!empty($product_cat)) {
            foreach ($product_cat as $cat) {
                $selectCat .= "<option value='$cat->id'>$cat->name</option>";
            }
        }
        echo $selectCat;
    }
}
