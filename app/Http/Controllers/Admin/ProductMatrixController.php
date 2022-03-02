<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Session;

use App\Model\UserPermission;
use App\Model\Supplier;
use App\Model\ProductType;
use App\Model\Band;
use App\Model\Product;
use App\Model\GuideText;
use App\Model\MapProductTemplateField;
use App\Model\ProductTemplate;
use App\Model\TemplateLandingValue;
use App\Model\MapBandGroup;
use App\Model\Filter;

class ProductMatrixController extends Controller
{
    public function product_price_matrix()
    {
        if (UserPermission::checkPermission('manage_price_matrix') > 0) {
            $supplierList = Supplier::where('is_delete', '0')->get();
            $pTypes = ProductType::select('id', 'pname')->where('deleted', 0)->orderBy('pname')->get();
            $bandList = Band::select('id', 'name')->where('deleted', 0)->orderBy('name')->get();
            $productList =  Product::select('id', 'name')->where('deleted', 0)->orderBy('name')->get();

            return view('admin.product_matrix.product_price_matrix', [
                'supplierList' => $supplierList,
                'pTypes' => $pTypes,
                'bandList' => $bandList,
                'productList' => $productList
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }


    public function product_matrix_price_save(Request $request)
    {
        $inputs = $request->input();
        $supplier_id = ($request->supplier_id == null) ? 0 : $request->supplier_id;
        $product_type_id = ($request->product_type_id == null) ? 0 : $request->product_type_id;
        $band_ids = (isset($request->band_ids)) ? (((count($request->band_ids) == 1) && ($request->band_ids[0] == 0)) ? 0 : $request->band_ids) : 0;   //=== request->band_ids = []
        $product_ids = (isset($request->product_ids)) ? (((count($request->product_ids) == 1) && ($request->product_ids[0] == 0)) ? 0 : $request->product_ids) : 0;   //=== request->product_ids = []

        $li_product = 0;
        if ($product_ids != 0) {

            foreach ($product_ids as $product_id) {
                $fields = [
                    'trade_percentage' => $request->trade_percentage,
                    'profit_margin' => $request->profit_margin,
                    'sales_percentage' => $request->sales_percentage,
                    'sale_start' => $request->sale_start,
                    'sale_end' => $request->sale_end,
                    'lead_time_days' => ($request->lead_time_days == null) ? 0 : $request->lead_time_days,
                ];

                Product::where('id', $product_id)->update($fields);
            }
            Session::flash('success', "Update successfully");
        } elseif (($product_ids != 0) || ($band_ids != 0) || ($supplier_id > 0) || ($product_type_id > 0)) {
            if ($band_ids != 0) {
                $productList = GuideText::product_list_filter_with_band($supplier_id, $product_type_id, $band_ids);
            } else {
                $productList = GuideText::product_list_filter($supplier_id, $product_type_id);
            }
            // dd($productList);
            foreach ($productList as $product) {
                $fields = [
                    'trade_percentage' => $request->trade_percentage,
                    'profit_margin' => $request->profit_margin,
                    'sales_percentage' => $request->sales_percentage,
                    'sale_start' => $request->sale_start,
                    'sale_end' => $request->sale_end,
                    'lead_time_days' => ($request->lead_time_days == null) ? 0 : $request->lead_time_days,
                ];

                Product::where('id', $product->id)->update($fields);
            }
            Session::flash('success', "Update successfully");
        } else {
            Session::flash('error', "You have not made a selection");
        }
        return redirect()->route('product_price_matrix');
    }



    public function product_template_matrix()
    {
        if (UserPermission::checkPermission('manage_product_template_matrix') > 0) {
            $pTemplate = ProductTemplate::where('status_deleted', '0')->orderBy('name', 'ASC')->get();
            $supplierList = Supplier::where('is_delete', '0')->get();
            $pTypes = ProductType::select('id', 'pname')->where('deleted', 0)->orderBy('pname')->get();
            $bandList = Band::select('id', 'name')->where('deleted', 0)->orderBy('name')->get();
            $productList =  Product::select('id', 'name')->where('deleted', 0)->orderBy('name')->get();

            return view('admin.product_matrix.product_template_matrix', [
                'pTemplate' => $pTemplate,
                'supplierList' => $supplierList,
                'pTypes' => $pTypes,
                'bandList' => $bandList,
                'productList' => $productList
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }


    public function product_template_matrix_save(Request $request)
    {
        $inputs = $request->input();
        $supplier_id = ($request->supplier_id == null) ? 0 : $request->supplier_id;
        $product_type_id = ($request->product_type_id == null) ? 0 : $request->product_type_id;
        $band_ids = (isset($request->band_ids)) ? (((count($request->band_ids) == 1) && ($request->band_ids[0] == 0)) ? 0 : $request->band_ids) : 0;   //=== request->band_ids = []
        $product_ids = (isset($request->product_ids)) ? (((count($request->product_ids) == 1) && ($request->product_ids[0] == 0)) ? 0 : $request->product_ids) : 0;   //=== request->product_ids = []
        $template_id = ($request->template_id == null) ? 0 : $request->template_id;
        $selected_tabs = $request->selected_tabs;

        $tempFields = MapProductTemplateField::where('template_id', $template_id)->get();
        $tempLandingValues = TemplateLandingValue::where('template_id', $template_id)->get();

 
        $li_product = 0;
        if ($product_ids != 0) {

            foreach ($product_ids as $product_id) {
                $fields = [
                    'template_id' => $template_id,
                ];

                Product::where('id', $product_id)->update($fields);
            }
            Session::flash('success', "Update successfully");
        } elseif (($product_ids != 0) || ($band_ids != 0) || ($request->supplier_id > 0) || ($request->product_type_id > 0)) {
            if ($band_ids != 0) {
                $productList = GuideText::product_list_filter_with_band($request->supplier_id, $request->product_type_id, $band_ids);
            } else {
                $productList = GuideText::product_list_filter($request->supplier_id, $request->product_type_id);
            }
            // dd($productList);
            foreach ($productList as $product) {
                $fields = [
                    'template_id' => $template_id,
                ];

                Product::where('id', $product->id)->update($fields);
            }
            Session::flash('success', "Update successfully");
        } else {
            Session::flash('error', "You have not made a selection");
        }
        return redirect()->route('product_template_matrix');
    }



    public function product_option_matrix()
    {
        if (UserPermission::checkPermission('manage_filter_option_matrix') > 0) {
            $bandId = (isset($_GET['bandId']) && ($_GET['bandId'] > 0)) ? $_GET['bandId'] : 0;

            $band_groups = [];
            if ($bandId > 0) {
                $band_groups = MapBandGroup::where('band_id', $bandId)->orderBy('position')->get();
            }

            $supplierList = Supplier::where('is_delete', '0')->get();
            $pTypes = ProductType::select('id', 'pname')->where('deleted', 0)->orderBy('pname')->get();
            $bandList = Band::select('id', 'name')->where('deleted', 0)->orderBy('name')->get();
            $productList =  Product::select('id', 'name')->where('deleted', 0)->orderBy('name')->get();

            return view('admin.product_matrix.product_option_matrix', [
                'bandId' => $bandId,
                'supplierList' => $supplierList,
                'pTypes' => $pTypes,
                'bandList' => $bandList,
                'productList' => $productList,
                'band_groups' => $band_groups,
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }



    public function product_option_matrix_save(Request $request)
    {
        $inputs = $request->input();
        $supplier_id = ($request->supplier_id == null) ? 0 : $request->supplier_id;
        $product_type_id = ($request->product_type_id == null) ? 0 : $request->product_type_id;
        $band_ids = (isset($request->band_ids)) ? (((count($request->band_ids) == 1) && ($request->band_ids[0] == 0)) ? 0 : $request->band_ids) : 0;   //=== request->band_ids = []
        $product_ids = (isset($request->product_ids)) ? (((count($request->product_ids) == 1) && ($request->product_ids[0] == 0)) ? 0 : $request->product_ids) : 0;   //=== request->product_ids = []

        // dd($inputs);
        $li_product = 0;
        if ($product_ids != 0) {

            foreach ($product_ids as $product_id) {
                if (isset($request->filter_optionSelect)) {
                    $filter_optionSelect = $request->filter_optionSelect;
                } else {
                    $filter_optionSelect = [0];
                }
                foreach ($filter_optionSelect as $optionId) {
                    $data['product_id'] = $product_id;
                    $data['width'] = ($request->filter_width > 0) ? $request->filter_width : 0;
                    $data['height'] = ($request->filter_height > 0) ? $request->filter_height : 0;
                    $data['lt_gt'] = "$request->filter_lt_gt";
                    $data['group_id'] = ($request->filter_GroupSelect > 0) ? $request->filter_GroupSelect : 0;
                    $data['option_id'] = $optionId;
                    $data['slatwidth_option_id'] = ($request->filter_subGroupSelect > 0) ? $request->filter_subGroupSelect : 0;

                    $create = Filter::create($data);
                }
            }
            Session::flash('success', "Update successfully");
        } elseif (($product_ids != 0) || ($band_ids != 0) || ($supplier_id > 0) || ($product_type_id > 0)) {
            if ($band_ids != 0) {
                $productList = GuideText::product_list_filter_with_band($supplier_id, $product_type_id, $band_ids);
            } else {
                $productList = GuideText::product_list_filter($supplier_id, $product_type_id);
            }
            // dd($productList);
            foreach ($productList as $product) {
                if (isset($request->filter_optionSelect)) {
                    $filter_optionSelect = $request->filter_optionSelect;
                } else {
                    $filter_optionSelect = [0];
                }
                foreach ($filter_optionSelect as $optionId) {
                    $data['product_id'] = $product->id;
                    $data['width'] = ($request->filter_width > 0) ? $request->filter_width : 0;
                    $data['height'] = ($request->filter_height > 0) ? $request->filter_height : 0;
                    $data['lt_gt'] = "$request->filter_lt_gt";
                    $data['group_id'] = ($request->filter_GroupSelect > 0) ? $request->filter_GroupSelect : 0;
                    $data['option_id'] = $optionId;
                    $data['slatwidth_option_id'] = ($request->filter_subGroupSelect > 0) ? $request->filter_subGroupSelect : 0;

                    $create = Filter::create($data);
                }
            }
            Session::flash('success', "Update successfully");
        } else {
            Session::flash('error', "You have not made a selection");
        }
        return redirect()->route('product_option_matrix');
    }
}
