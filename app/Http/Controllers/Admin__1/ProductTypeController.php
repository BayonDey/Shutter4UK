<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Session;

use App\Utility;

use App\Model\ProductType;
use App\Model\Product;
use App\Model\Metatag;
use App\Model\ProductCategory;
use App\Model\UserPermission;
// use File;
// use Illuminate\Http\File;
use ZipArchive;
// use Symfony\Component\Console\Input\Input;

class ProductTypeController extends Controller
{

    public function getProductTypeList()
    {
        $product_types = ProductType::where('deleted', 0)->orderBy('order_no')->get();

        return view('admin.product.product_type_list', ['product_types' => $product_types]);
    }

    public function productTypeUpDown($id, $flag)
    {
        if ($flag == 'top') {
            ProductType::where('id', '!=', $id)->update(['order_no' => DB::raw('order_no + 1')]);
            ProductType::where('id', $id)->update(['order_no' => 1]);
        } elseif ($flag == 'up') {
            $pTypeRow = ProductType::find($id);
            $pTypeRow_currentNo = $pTypeRow->order_no;

            $lessOrderType = ProductType::select('id', 'order_no')->where('order_no', '<', $pTypeRow_currentNo)->where('deleted', 0)->orderBy('order_no', 'DESC')->first();
            $pTypeRow_previousId = $lessOrderType->id;
            $pTypeRow_previousNo = $lessOrderType->order_no;

            ProductType::where('id', $id)->update(['order_no' => $pTypeRow_previousNo]);
            ProductType::where('id', $pTypeRow_previousId)->update(['order_no' => $pTypeRow_currentNo]);
        } elseif ($flag == 'down') {
            $pTypeRow = ProductType::find($id);
            $pTypeRow_currentNo = $pTypeRow->order_no;

            $lessOrderType = ProductType::select('id', 'order_no')->where('order_no', '>', $pTypeRow_currentNo)->where('deleted', 0)->orderBy('order_no')->first();
            $pTypeRow_nextId = $lessOrderType->id;
            $pTypeRow_nextNo = $lessOrderType->order_no;

            ProductType::where('id', $id)->update(['order_no' => $pTypeRow_nextNo]);
            ProductType::where('id', $pTypeRow_nextId)->update(['order_no' => $pTypeRow_currentNo]);
        } elseif ($flag == 'bottom') {
            $li_totalPType = ProductType::count();
            $pTypeRow = ProductType::find($id);
            $pTypeRow_currentNo = $pTypeRow->order_no;

            ProductType::where('id', '!=', $id)->where('order_no', '>', $pTypeRow_currentNo)
                ->update(['order_no' => DB::raw('order_no - 1')]);
            ProductType::where('id', $id)->update(['order_no' => $li_totalPType]);
        }
        // return redirect()->route('product_type_list');
        return redirect()->route('product');
    }

    public function createProductType()
    {
        if (UserPermission::checkPermission('products', 'add') > 0) {
            return view('admin.product.product_type_form', ['pType' => []]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('product');
        }
    }

    public function editProductType($id)
    {
        if (UserPermission::checkPermission('products', 'edit') > 0) {
            $pType = ProductType::find($id);
            $Metatag = Metatag::where('url', '/' . $pType->url)->first();

            return view('admin.product.product_type_form', ['pType' => $pType, 'Metatag' => $Metatag]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('product');
        }
    }

    public function storeProductType(Request $request)
    {
        $inputs = $request->all();
        // $meta['keywords'] = $meta['footer'] = $meta['keywords'] = $meta['keywords'] = $meta['keywords'] = $meta['keywords'] = $meta['keywords'] = '';
        $inputs['order_no'] = $inputs['discount_txt_size'] = $inputs['NS_HTMLButtonSwitch'] = $inputs['louvres_only_available'] = 1;
        $inputs['HP_MainImageAltText'] = $inputs['discount_txt_color'] =  '';
        $inputs['NS_FontFamily'] = $inputs['NS_FontSize'] = $inputs['NS_FontStyles'] = '';
        $inputs['NS_FontWeight'] =  $inputs['NS_HTMLButtonText'] = '';
        $inputs['discount_txt_size_parttwo'] = $inputs['FLASH_FontFamily_PartOne'] = $inputs['FLASH_FontFamily_PartTwo'] = '';
        $inputs['discount_txt_color_parttwo'] = $inputs['discount_txt_weight_parttwo'] = $inputs['discount_txt_style_partone'] = '';
        $inputs['discount_txt_style_parttwo'] = $inputs['image_logo'] = $inputs['collectionlogooption'] = '';
        $inputs['saleimage'] =  $inputs['tb_text'] = '';
        $inputs['tb_bg_color'] = $inputs['default_html_btn_colour'] = $inputs['mngCombineSlider'] = '';
        $inputs['bigtxtcolour'] = $inputs['bigtext_TextBanner'] = $inputs['midtxtcolour'] = '';
        $inputs['smalltext_TextBanner'] = $inputs['smalltxtcolour'] = $inputs['vrysmalltext_TextBanner'] = '';
        $inputs['bg_colour_TextBanner'] = $inputs['htmlbtntext_TextBanner'] = $inputs['htmlbtnlink_TextBanner'] = '';
        $inputs['htmlbtncolour_TextBanner'] = $inputs['htmlbtnlink_TextBanner'] = '';
        $inputs['BannerChkHome'] = 'OnlySlider';
        $inputs['louvres_only_available'] = (isset($inputs['louvres_only_available'])) ? 1 : 0;

        // $inputs['pimage'] = $inputs['header_image'] = $inputs['delivery_image'] = $inputs['flash_disabled_image'] = $inputs['discount_txt_img'] = '';
        foreach ($inputs as $key => $val) {
            $inputs[$key] = ($val == null) ? "" : $val;
        }

        $meta['url'] = '/' . $inputs['url'];
        $meta['title'] = $inputs['title'];
        $meta['description'] = $inputs['description'];

        if ($request->hasFile('pimage')) {
            $inputs['pimage'] = Utility::saveImage($request->file('pimage'), 'v2_product_types', 'pimage');
        }
        if ($request->hasFile('header_image')) {
            $inputs['header_image'] = Utility::saveImage($request->file('header_image'), 'v2_product_types', 'header_image');
        }
        if ($request->hasFile('delivery_image')) {
            $inputs['delivery_image'] = Utility::saveImage($request->file('delivery_image'), 'v2_product_types', 'delivery_image');
        }
        if ($request->hasFile('flash_disabled_image')) {
            $inputs['flash_disabled_image'] = Utility::saveImage($request->file('flash_disabled_image'), 'v2_product_types', 'flash_disabled_image');
        }
        if ($request->hasFile('discount_txt_img')) {
            $inputs['discount_txt_img'] = Utility::saveImage($request->file('discount_txt_img'), 'v2_product_types', 'discount_txt_img');
        }

        if ($request->id == 0) {

            $validate = $request->validate(
                [
                    'pname' => 'required',
                    'url' => 'required|unique:v2_product_types',
                ],
                [
                    'pname.required' => 'The name field is required.',
                ]
            );

            $ProductType = ProductType::create($inputs);
            if ($ProductType) {
                $Metatag = Metatag::create($meta);
                Session::flash('success', 'Type creaeted successfully');
            }
        } else {
            $id = $request->id;
            $ProductType = ProductType::find($id);

            $old_url = '/' . $ProductType->url;

            $validate = $request->validate(
                [
                    'pname' => 'required',
                    'url' => 'required|unique:v2_product_types,url,' . $id,
                ],
                [
                    'pname.required' => 'The name field is required.',
                ]
            );
            $old_pimage = $ProductType->pimage;
            $old_header_image = $ProductType->header_image;
            $old_delivery_image = $ProductType->delivery_image;
            $old_flash_disabled_image = $ProductType->flash_disabled_image;
            $old_discount_txt_img = $ProductType->discount_txt_img;

            if (isset($inputs['switch_frontAll'])) {
                $updateCats = ProductCategory::where('product_type_id', $id)->update(['promote_to_front' => 't']);
                $updatePro = Product::where('product_type_id', $id)->update(['promote_to_front' => 't']);
            }

            unset($inputs['_token']);
            unset($inputs['switch_frontAll']);
            unset($inputs['title']);
            unset($inputs['description']);

            $update = ProductType::where('id', $id)->update($inputs);
            $updateMeta = Metatag::where('url', $old_url)->update($meta);
            Session::flash('success', 'Type update successfully');

            if ($update) {
                if (($old_pimage != '') && ($request->hasFile('pimage'))) {
                    Utility::unlinkFile($old_pimage, 'v2_product_types');
                }
                if (($old_header_image != '') && ($request->hasFile('header_image'))) {
                    Utility::unlinkFile($old_header_image, 'v2_product_types');
                }
                if (($old_delivery_image != '') && ($request->hasFile('delivery_image'))) {
                    Utility::unlinkFile($old_delivery_image, 'v2_product_types');
                }
                if (($old_flash_disabled_image != '') && ($request->hasFile('flash_disabled_image'))) {
                    Utility::unlinkFile($old_flash_disabled_image, 'v2_product_types');
                }
                if (($old_discount_txt_img != '') && ($request->hasFile('discount_txt_img'))) {
                    Utility::unlinkFile($old_discount_txt_img, 'v2_product_types');
                }
            }
        }
        return redirect()->route('product');
    }

    public function sampleAvailableOrNot($id, $flag)
    {
        // You can use this form to allow all products in all categories and sub-categories under Test Blinds to be offered as samples
        Product::where('product_type_id', $id)->update(['allow_samples' => $flag]);
        Session::flash('success', 'Update successfully');

        return redirect()->route('product_list', ['product_type_id' => $id, 'parent_id' => 0]);
    }

    public function deleteProductType($id)
    {
        if (UserPermission::checkPermission('products', 'delete') > 0) {
            ProductType::where('id', $id)->update(['deleted' => 1]);
            ProductCategory::where('product_type_id', $id)->update(['deleted' => 1]);
            Product::where('product_type_id', $id)->update(['deleted' => 1]);
            Session::flash('success', 'Deleted successfully');
            return redirect()->route('product_type_list');
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('product');
        }
    }

    public function downloadProductImage()
    {
        if (UserPermission::checkPermission('download_product_image') > 0) {
            $product_types = ProductType::where('deleted', 0)->orderBy('pname')->get();

            return view('admin.admin_manage.download_product_image', ['productTypes' => $product_types]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('product');
        }
    }

    public function createProductImageZip(Request $request)
    {
        $return = ['return' => 0, 'msg' => 'Undefine'];
        if ($request->type_id > 0) {
            $id = $request->type_id;
            $pType = ProductType::select('id', 'pname')->find($id);
            $proList = Product::select('id', 'name', 'image_name')->where('product_type_id', $id)->where('deleted', 0)->get();
            $imgListArr = [];
            foreach ($proList as $pro) {
                if (($pro->image_name != '') && file_exists(public_path() . "/uploads/v2_products/$pro->image_name")) {
                    $imgListArr[] = public_path() . "/uploads/v2_products/$pro->image_name";
                }
            }


            if (count($imgListArr) > 0) {
                $return = ['return' => 1, 'msg' => 'Success'];

                $zipname = $pType->pname . '.zip';
                Utility::unlinkFile($zipname, '..');

                $zip = new ZipArchive;
                $zip->open($zipname, ZipArchive::CREATE);

                header('Content-Type: application/zip');
                header('Content-disposition: attachment; filename=' . $zipname);

                foreach ($imgListArr as $file) {
                    $zip->addFile($file);
                }

                header('Content-Length: ' . filesize($zipname));
                readfile($zipname);
                $zip->close();
                exit();
            } else {
                $return['msg'] = "No image found.";
            }
        } else {
            $return['msg'] = "No product found.";
        }
        echo json_encode($return);
        // return redirect()->route('download_product_image');
    }

    public function downloadProductImageZip($id)
    {
        $pType = ProductType::select('id', 'pname')->find($id);
        $proList = Product::select('id', 'name', 'image_name')->where('product_type_id', $id)->where('deleted', 0)->get();
        $imgListArr = [];
        foreach ($proList as $pro) {
            if (($pro->image_name != '') && file_exists(public_path() . "/uploads/v2_products/$pro->image_name")) {
                $imgListArr[] = public_path() . "/uploads/v2_products/$pro->image_name";
            }
        }

        if (count($imgListArr) > 0) {

            $zipname = $pType->pname . '.zip';

            $zip = new ZipArchive;
            $zip->open($zipname, ZipArchive::CREATE);

            header('Content-Type: application/zip');
            header('Content-disposition: attachment; filename=' . $zipname);

            foreach ($imgListArr as $file) {
                $zip->addFile($file);
            }

            header('Content-Length: ' . filesize($zipname));
            readfile($zipname);
            $zip->close();
            exit();
        } else {
            Session::flash('error', 'No image found.');
            // $return['msg'] = "No image found.";
        }

        return redirect()->route('download_product_image');
    }
}
