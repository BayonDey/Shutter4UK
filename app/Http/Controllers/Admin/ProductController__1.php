<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  Illuminate\Support\Facades\Session;
use App\Utility;
use App\Model\Product;
use App\Model\ProductType;
use App\Model\ProductCategory;
use App\Model\Page;
use App\Model\ProductTab;
use App\Model\Supplier;
use App\Model\Band;
use App\Model\Filter;
use App\Model\MapBandGroup;
use App\Model\MapSubGroupOption;
use App\Model\Metatag;
use App\Model\Option;
use App\Model\ProductFilter;
use App\Model\ProductTemplate;
use App\Model\ProductFilterMap;
use App\Model\ProductGuide;
use App\Model\ProductLinks;
use App\Model\TemplateLandingValue;
use App\Model\ProductValue;
use App\Model\UserPermission;
use App\Model\ProductPriceTemp;
use App\Model\ProductPrice;
use App\Model\GuideText;

class ProductController extends Controller
{

    public function getProductList($product_type_id = 0, $parent_id = 0)
    {
        $product_types = DB::table('v2_product_types')->select('id', 'pname', 'url')->where('deleted', 0)->orderBy('order_no')->get();
        if ($product_type_id == 0) {
            $product_type_id = $product_types[0]->id;
        }
        $product_cats = DB::table('v2_categories')->select('id', 'name', 'promote_to_front')
            ->where('product_type_id', $product_type_id)->where('deleted', 0)
            ->orderBy('promote_to_front', 'ASC')->orderBy('order_no')->get();

        if ($parent_id == 0 && (count($product_cats) > 0)) {
            $parent_id = $product_cats[0]->id;
        }

        if ($product_type_id != 0 && $parent_id != 0) {
            $products = Product::select('id', 'product_type_id', 'parent_id', 'name', 'supplied_name', 'trade_percentage', 'sales_percentage', 'sale_start', 'sale_end', 'lead_time_days', 'allow_samples', 'image_name', 'promote_to_front')
                ->where('product_type_id', $product_type_id)->where('deleted', 0)
                ->where('parent_id', $parent_id)
                ->orderBy('order_no')
                ->get();
        } elseif ($product_type_id != 0 && $parent_id == 0) {
            $products = Product::select('id', 'product_type_id', 'parent_id', 'name', 'supplied_name', 'trade_percentage', 'sales_percentage', 'sale_start', 'sale_end', 'lead_time_days', 'allow_samples', 'image_name', 'promote_to_front')
                ->where('product_type_id', $product_type_id)->where('deleted', 0)
                ->orderBy('order_no')
                ->get();
        } else {
            $products = Product::select('id', 'product_type_id', 'parent_id', 'name', 'supplied_name', 'trade_percentage', 'sales_percentage', 'sale_start', 'sale_end', 'lead_time_days', 'allow_samples', 'image_name', 'promote_to_front')
                ->where('deleted', 0)->orderBy('order_no')
                ->get();
        }

        return view(
            'admin.product.product_list',
            [
                'product_type_id' => $product_type_id,
                'parent_id' => $parent_id,
                'product_types' => $product_types,
                'product_cats' => $product_cats,
                'products' => $products,
            ]
        );
    }

    public function getProductList_serach(Request $request)
    {
        $inputs = $request->input();
        $product_name = (isset($_GET['product_name'])) ? $_GET['product_name'] : '';
        $product_id = (isset($_GET['product_id'])) ? $_GET['product_id'] : 0;
        $p_type_id = (isset($_GET['p_type_id'])) ? $_GET['p_type_id'] : 0;
        $supplier_id = (isset($_GET['supplier_id'])) ? $_GET['supplier_id'] : 0;

        $product_types = ProductType::select('id', 'pname')->orderBy('pname', 'ASC')->where('deleted', '0')->get();
        $suppliers = Supplier::select('supplier_id', 'supplier_name')->where('is_delete', '0')->get();

        $query =  DB::table('v2_products as p')
            ->join('suppliers as s', 's.supplier_id', '=', 'p.supplier_id')
            ->join('v2_product_types as pt', 'pt.id', '=', 'p.product_type_id')
            ->select('p.id', 'p.name', 'p.supplied_name', 'p.image_name',  'pt.pname as p_type_name', 's.supplier_name')
            ->where('p.deleted', 0);

        if ($product_name != '') {
            $query->where("name", 'LIKE', "%$product_name%")->orderBy('name');
        } else if ($product_id > 0) {
            $query->where("p.id", $product_id);
        } else if ($p_type_id > 0) {
            $query->where("p.product_type_id", $p_type_id);
        } else if ($supplier_id > 0) {
            $query->where("p.supplier_id", $supplier_id);
        }

        $productList = $query->paginate(200);
        // dd($request->product_name);

        return view(
            'admin.product.product_search_list',
            [
                'product_name' => $product_name,
                'product_id' => $product_id,
                'p_type_id' => $p_type_id,
                'supplier_id' => $supplier_id,
                'products' => $productList,
                'product_types' => $product_types,
                'suppliers' => $suppliers,
            ]
        );
    }

    public function getProductCatList($product_type_id)
    {

        $product_types = DB::table('v2_product_types')->select('id', 'pname')->orderBy('pname', 'ASC')->get();

        if ($product_type_id == 0) {
            $product_cat = DB::table('v2_categories')->select('id', 'name', 'promote_to_front', 'order_no')->get();
        } else {
            $product_cat = DB::table('v2_categories')->select('id', 'name', 'promote_to_front', 'order_no')
                ->where('product_type_id', $product_type_id)
                ->get();
        }
        // dd($product_type);
        return view(
            'admin.product.product_cat_list',
            [
                'product_type_id' => $product_type_id,
                'product_types' => $product_types,
                'product_cat' => $product_cat
            ]
        );
    }

    public function getProductDetails($id)
    {
        $product = Product::find($id);
        $selected_filter_map = ProductFilterMap::where('product_id', $id)->get();


        $template = ProductTemplate::find($product->template_id);
        $templateFields = $template->fildIds;
        $pTemplateVal = ProductValue::where('product_id', $id)->get();
        $pTempVal = [];
        if (count($pTemplateVal) > 0) {
            foreach ($pTemplateVal as $val) {
                $pTempVal[$val->field_id] = $val->value;
            }
        }

        $templateAssign = ProductTemplate::find($product->assign_template_id);
        $templateLandingFields = (isset($templateAssign->landingValuefildIds)) ? $templateAssign->landingValuefildIds : [];
        // dd($templateLandingFields);
        return view('admin.product.product_details', [
            'product' => $product,
            'product_guide' => $product->selectedGuideText,
            'search_filter' => $product->searchFilterMap,
            'selected_filter_map' => $selected_filter_map,
            'templateFields' => $templateFields,
            'pTempVal' => $pTempVal,
            'templateLandingFields' => $templateLandingFields,
        ]);
    }


    public function createProduct($typeId, $catId)
    {
        if (UserPermission::checkPermission('products', 'add') > 0) {

            $pTypes = ProductType::select('id', 'pname')->where('deleted', 0)->orderBy('order_no')->get();
            $pCats = ProductCategory::select('id', 'name', 'parent_id')->where('product_type_id', $typeId)->where('deleted', 0)->orderBy('order_no')->get();
            $suppliers = Supplier::select('supplier_id', 'supplier_name')->where('is_delete', '0')->get();
            $bands = Band::select('id', 'name')->where('deleted', 0)->orderBy('name')->get();
            $pFilterColor = ProductFilter::where('type_id', 1)->orderBy('name')->get();
            $pFilterFeatures = ProductFilter::where('type_id', 2)->orderBy('name')->get();
            $pFilterBuy = ProductFilter::where('type_id', 3)->orderBy('name')->get();
            $pTemplates = ProductTemplate::where('status_deleted', 0)->orderBy('name')->get();
            $product_guides = ProductGuide::orderBy('name')->get();

            // dd( $pCats);
            return view('admin.product.product_form', [
                'product' => [],
                'typeId' => $typeId,
                'catId' => $catId,
                'pTypes' => $pTypes,
                'pCats' => $pCats,
                'suppliers' => $suppliers,
                'bands' => $bands,
                'pFilterColor' => $pFilterColor,
                'pFilterFeatures' => $pFilterFeatures,
                'pFilterBuy' => $pFilterBuy,
                'pTemplates' => $pTemplates,
                'filter_map_ids' => [],
                'product_guides' => $product_guides,
                'selected_guides' => [],
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('product');
        }
    }



    public function EditProduct($id)
    {
        if (UserPermission::checkPermission('products', 'edit') > 0) {
            $product = Product::find($id);

            $pTypes = ProductType::select('id', 'pname')->where('deleted', 0)->orderBy('order_no')->get();
            $pCats = ProductCategory::select('id', 'name', 'parent_id')->where('product_type_id', $product->product_type_id)->where('deleted', 0)->orderBy('order_no')->get();
            $suppliers = Supplier::select('supplier_id', 'supplier_name')->where('is_delete', '0')->get();
            $bands = Band::select('id', 'name')->where('deleted', 0)->orderBy('name')->get();
            $pFilterColor = ProductFilter::where('type_id', 1)->orderBy('name')->get();
            $pFilterFeatures = ProductFilter::where('type_id', 2)->orderBy('name')->get();
            $pFilterBuy = ProductFilter::where('type_id', 3)->orderBy('name')->get();
            $pTemplates = ProductTemplate::where('status_deleted', 0)->orderBy('name')->get();
            $filter_map = DB::table('v3_product_filter_map')->where('product_id', $id)->get();
            $product_guides = ProductGuide::orderBy('name')->get();
            $band_groups = MapBandGroup::where('band_id', $product->band_id)->orderBy('position')->get();

            $pro_link = Product::get_view_site_link($id, 'product');
            $meta_data = Metatag::where('url', "/$pro_link")->first();
            // dd($band_group );
            $filter_map_ids = [];
            if (count($filter_map)) {
                foreach ($filter_map as $row) {
                    $filter_map_ids[] = $row->filter_id;
                }
            }

            $selected_guides = [];
            if (count($product->selectedGuideText) > 0) {
                foreach ($product->selectedGuideText as $text) {
                    $selected_guides[] = $text->text_id;
                }
            }
            // dd($meta_data);
            return view('admin.product.product_form', [
                'product' => $product,
                'pTypes' => $pTypes,
                'pCats' => $pCats,
                'suppliers' => $suppliers,
                'bands' => $bands,
                'pFilterColor' => $pFilterColor,
                'pFilterFeatures' => $pFilterFeatures,
                'pFilterBuy' => $pFilterBuy,
                'pTemplates' => $pTemplates,
                'filter_map_ids' => $filter_map_ids,
                'product_guides' => $product_guides,
                'selected_guides' => $selected_guides,
                'meta_data' => $meta_data,
                'search_filter' => $product->searchFilterMap,
                'band_groups' => $band_groups
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('product');
        }
    }



    public function storeProduct(Request $request)
    {
        $inputs = $request->input();
        $filters = (isset($inputs['filters'])) ? $inputs['filters'] : [];
        $template_field = [];
        if (isset($request->tmpsec)) {
            if ($request->id > 0) {
                ProductValue::where('product_id', $request->id)->delete();
            }

            $template_field = (isset($inputs['template_field'])) ? $inputs['template_field'] : [];
            $assign_template_field = (isset($inputs['assign_template_field'])) ? $inputs['assign_template_field'] : [];

            if (count($assign_template_field) > 0) {
                foreach ($assign_template_field as $field_id => $fieldVal) {
                    TemplateLandingValue::where('template_id', $request->assign_template_id)->where('field_id', $field_id)->update(['value' => $fieldVal]);
                }
            }
        }
        $guidesText = (isset($inputs['guidesText'])) ? $inputs['guidesText'] : [];
        // dd($guidesText);
        unset($inputs['filters']);
        unset($inputs['tmpsec']);
        unset($inputs['template_field']);
        unset($inputs['assign_template_field']);
        unset($inputs['guidesText']);
        if ($request->id > 0) {

            $metadata['url'] = "/" . Product::get_view_site_link($request->id, 'product');
            $metadata['title'] = ($request->meta_title == null) ? '' : $request->meta_title;
            $metadata['description'] = ($request->meta_desc == null) ? '' : $request->meta_desc;
            unset($inputs['meta_title']);
            unset($inputs['meta_desc']);
        }

        // dd($inputs);
        foreach ($inputs as $key => $val) {
            $inputs[$key] = ($val == null) ? "" : $val;
            $inputs[$key] = (in_array($key, ['trade_percentage', 'profit_margin', 'sales_percentage']) && ($inputs[$key] == '')) ? 0 : $inputs[$key];
        }
        $inputs['louvres_only_available'] = (isset($inputs['louvres_only_available'])) ? 1 : 0;
        $inputs['show_main_img'] = (isset($inputs['show_main_img'])) ? 'Y' : 'N';
        $inputs['m_image_sm'] = (isset($inputs['m_image_sm'])) ? 1 : 0;
        $inputs['out_stock'] = (isset($inputs['out_stock'])) ? 'yes' : 'no';
        // dd($inputs);

        $validate = $request->validate([
            'name' => 'required',
            'supplied_name' => 'required',
            'supplier_id' => 'required',
            'product_type_id' => 'required',
            'parent_id' => 'required',
        ]);


        if ($request->hasFile('lifestyleimg_name')) {
            $inputs['lifestyleimg_name'] = Utility::saveImage($request->file('lifestyleimg_name'), 'v2_products', 'lifestyleimg_name');
        }
        if ($request->hasFile('lifestleimg_scnd')) {
            $inputs['lifestleimg_scnd'] = Utility::saveImage($request->file('lifestleimg_scnd'), 'v2_products', 'lifestleimg_scnd');
        }
        if ($request->hasFile('colleclifestyle_name')) {
            $inputs['colleclifestyle_name'] = Utility::saveImage($request->file('colleclifestyle_name'), 'v2_products', 'colleclifestyle_name');
        }
        if ($request->hasFile('favorite_img_name')) {
            $inputs['favorite_img_name'] = Utility::saveImage($request->file('favorite_img_name'), 'v2_products', 'favorite_img_name');
        }
        if ($request->hasFile('image_name')) {
            $inputs['image_name'] = Utility::saveImage($request->file('image_name'), 'v2_products', 'image_name');
        }
        if ($request->hasFile('first_swatch_image')) {
            $inputs['first_swatch_image'] = Utility::saveImage($request->file('first_swatch_image'), 'v2_products', 'first_swatch_image');
        }
        if ($request->hasFile('first_swatch_UploadPDF')) {
            $inputs['first_swatch_UploadPDF'] = Utility::saveImage($request->file('first_swatch_UploadPDF'), 'v2_products', 'first_swatch_UploadPDF');
        }
        if ($request->hasFile('second_swatch_image')) {
            $inputs['second_swatch_image'] = Utility::saveImage($request->file('second_swatch_image'), 'v2_products', 'second_swatch_image');
        }
        if ($request->hasFile('second_swatch_UploadPDF')) {
            $inputs['second_swatch_UploadPDF'] = Utility::saveImage($request->file('second_swatch_UploadPDF'), 'v2_products', 'second_swatch_UploadPDF');
        }
        if ($request->hasFile('third_swatch_image')) {
            $inputs['third_swatch_image'] = Utility::saveImage($request->file('third_swatch_image'), 'v2_products', 'third_swatch_image');
        }
        if ($request->hasFile('third_swatch_UploadPDF')) {
            $inputs['third_swatch_UploadPDF'] = Utility::saveImage($request->file('third_swatch_UploadPDF'), 'v2_products', 'third_swatch_UploadPDF');
        }
        if ($request->id == 0) {
            $create = Product::create($inputs);
            if ($create) {
                $id = $create->id;
                if (count($filters) > 0) {
                    foreach ($filters as $filter_id) {
                        ProductFilterMap::create(['filter_id' => $filter_id, 'product_id' => $create->id]);
                    }
                }
                Session::flash('success', 'Product create successfully');
            }
        } else {
            $id = $request->id;
            $product = Product::find($id);
            unset($inputs['_token']);
            $old_lifestyleimg_name = $product->lifestyleimg_name;
            $old_lifestleimg_scnd = $product->lifestleimg_scnd;
            $old_colleclifestyle_name = $product->colleclifestyle_name;
            $old_favorite_img_name = $product->favorite_img_name;
            $old_image_name = $product->image_name;

            ProductFilterMap::where('product_id', $id)->delete();

            if (count($filters) > 0) {
                foreach ($filters as $filter_id) {
                    ProductFilterMap::create(['filter_id' => $filter_id, 'product_id' => $id]);
                }
            }
            $update = Product::where('id', $id)->update($inputs);

            $metaCheck = Metatag::where('url', $metadata['url'])->count();
            if ($metaCheck == 0) {
                Metatag::create($metadata);
            } else {
                Metatag::where('url', $metadata['url'])->update($metadata);
                // Session::flash('success', 'Meta update successfully');
            }
            if ($update) {
                Session::flash('success', 'Product update successfully');
            }
        }



        // dd($template_field);
        if (count($template_field) > 0) {
            foreach ($template_field as $field_id => $fieldVal) {
                ProductValue::create(['product_id' => $id, 'field_id' => $field_id, 'value' => ((is_null($fieldVal)) ? '' : $fieldVal)]);
            }
        }

        ProductLinks::where('product_id', $id)->delete();
        if (count($guidesText) > 0) {
            foreach ($guidesText as $text_id) {
                ProductLinks::create(['product_id' => $id, 'text_id' => $text_id, 'guide_id' => (($request->id == 0) ? $request->guide_id : $product->guide_id), 'flag' => 1]);
            }
        }

        return redirect()->route('product_details', $id);
    }

    public function get_catlist_by_type_id_ajax($typeId)
    {
        $pCats = ProductCategory::select('id', 'name', 'parent_id')->where('product_type_id', $typeId)->where('deleted', 0)->orderBy('order_no')->get();
        $html = "<option value='0'>Select...</option>";

        foreach ($pCats as $cat) {
            $catName = ($cat->parent_id == 0) ? $cat->name : "- $cat->name";
            $html .= "<option value='$cat->id' >$catName</option>";
        }
        echo $html;
    }
    public function get_template_fields_ajax($template_id, $pId)
    {
        $template = ProductTemplate::find($template_id);
        $templateFields = $template->fildIds;
        $pTemplateVal = ProductValue::where('product_id', $pId)->get();
        $pTempVal = [];
        if (count($pTemplateVal) > 0) {
            foreach ($pTemplateVal as $val) {
                $pTempVal[$val->field_id] = $val->value;
            }
        }

        // dd('$pTemplateVal');
        return view('admin.product.ajax_product_form', [
            'templateFields' => $templateFields,
            'pTempVal' => $pTempVal,
        ]);
    }

    public function get_assign_template_fields($template_id)
    {
        $template = ProductTemplate::find($template_id);
        $templateFields = $template->landingValuefildIds;
        // dd($templateFields);
        return view('admin.product.ajax_product_form', [
            'templateFieldsVal' => $templateFields,
        ]);
    }


    public function get_option_list_by_group_id_ajax($groupId)
    {
        $options = Option::where('group_id', $groupId)->get();
        $html = "<div class='row'>  <div class='col-md-6'> <div calss='form-group'><label class='label-title'>Option:  </label>
        <select class='form-control' id='filter_optionSelect' name='filter_optionSelect[]' multiple>";
        $html .= "<option value='0'>Filter at Group Level</option>";
        if (count($options) > 0) {
            foreach ($options as $option) {
                $html .= "<option value='$option->option_id'>$option->option_name</option>";
            }
        } else {
            $html .= "<option value='0'>No options found for this group</option>";
        }
        $html .= "</select></div></div>";
        $html .= " <div class='col-md-6'><div id='subGroupList'></div> </div></div>";
        echo $html;
    }


    public function get_sub_group_by_option_id_ajax($optionId)
    {
        if (is_numeric($optionId)) {
            $subGroups = MapSubGroupOption::where('option_id', $optionId)->get();
            $html = "<div calss='form-group'><label class='label-title'>Sub Group</label> <select class='form-control' id='filter_subGroupSelect'>";
            $html .= "<option value='0'>None</option>";
            if (count($subGroups) > 0) {
                foreach ($subGroups as $subGr) {
                    $html .= "<option value='$subGr->sub_group_id'>" . $subGr->subGroupName->group_title . "</option>";
                }
            }
            $html .= "</select></div>";
            $html .= "<p class='mb-0 mt-2' id='noteSubGr'><small>Note: If you wish to filter by sub group, please use the select box above. If not keep the value below at 'none'.</small></p>";
        } else {
            $html = '';
        }
        echo $html;
    }

    public function productFilterSave_ajax(Request $request)
    {
        $inputs = $request->input();
        if (isset($request->filter_optionSelect)) {
            $filter_optionSelect = $request->filter_optionSelect;
        } else {
            $filter_optionSelect = [0];
        }
        foreach ($filter_optionSelect as $optionId) {
            $data['product_id'] = $request->id;
            $data['width'] = ($request->filter_width > 0) ? $request->filter_width : 0;
            $data['height'] = ($request->filter_height > 0) ? $request->filter_height : 0;
            $data['lt_gt'] = "$request->filter_lt_gt";
            $data['group_id'] = ($request->filter_GroupSelect > 0) ? $request->filter_GroupSelect : 0;
            $data['option_id'] = $optionId;
            $data['slatwidth_option_id'] = ($request->filter_subGroupSelect > 0) ? $request->filter_subGroupSelect : 0;
            $create = Filter::create($data);
            if ($create) {
                Session::flash('success', 'Filter save successfully');
            } else {
                Session::flash('error', 'Something was wrong');
            }
        }
        // return redirect()->route('product_details', $request->id);
    }


    public function productUpDown($id, $product_type_id, $parent_id, $flag)
    {
        if ($flag == 'top') {
            Product::where('id', '!=', $id)
                ->where('product_type_id', $product_type_id)->where('parent_id', $parent_id)
                ->update(['order_no' => DB::raw('order_no + 1')]);
            Product::where('id', $id)->update(['order_no' => 1]);
        } elseif ($flag == 'up') {
            $pTypeRow = Product::find($id);
            $pTypeRow_currentNo = $pTypeRow->order_no;

            $lessOrderType = Product::select('id', 'order_no')
                ->where('product_type_id', $product_type_id)->where('parent_id', $parent_id)
                ->where('order_no', '<', $pTypeRow_currentNo)->where('deleted', 0)->orderBy('order_no', 'DESC')->first();
            $pTypeRow_previousId = $lessOrderType->id;
            $pTypeRow_previousNo = $lessOrderType->order_no;

            Product::where('id', $id)->update(['order_no' => $pTypeRow_previousNo]);
            Product::where('id', $pTypeRow_previousId)->update(['order_no' => $pTypeRow_currentNo]);
        } elseif ($flag == 'down') {
            $pTypeRow = Product::find($id);
            $pTypeRow_currentNo = $pTypeRow->order_no;

            $lessOrderType = Product::select('id', 'order_no')
                ->where('product_type_id', $product_type_id)->where('parent_id', $parent_id)
                ->where('order_no', '>', $pTypeRow_currentNo)->where('deleted', 0)->orderBy('order_no')->first();
            $pTypeRow_nextId = $lessOrderType->id;
            $pTypeRow_nextNo = $lessOrderType->order_no;

            Product::where('id', $id)->update(['order_no' => $pTypeRow_nextNo]);
            Product::where('id', $pTypeRow_nextId)->update(['order_no' => $pTypeRow_currentNo]);
        } elseif ($flag == 'bottom') {
            $li_totalPType = Product::where('product_type_id', $product_type_id)->where('parent_id', $parent_id)->count();
            $pTypeRow = Product::find($id);
            $pTypeRow_currentNo = $pTypeRow->order_no;

            Product::where('id', '!=', $id)->where('product_type_id', $product_type_id)->where('parent_id', $parent_id)
                ->where('order_no', '>', $pTypeRow_currentNo)
                ->update(['order_no' => DB::raw('order_no - 1')]);
            Product::where('id', $id)->update(['order_no' => $li_totalPType]);
        }
        // return redirect()->route('product_list', ['product_type_id' => $product_type_id, 'parent_id' => $parent_id]);
        return redirect()->route('product');
    }

    public function sampleAvailableOrNot($id, $product_type_id, $parent_id, $flag)
    {
        // You can use this form to allow the product Swatch test to be offered as a sample
        Product::where('id', $id)->update(['allow_samples' => $flag]);
        Session::flash('success', 'Update successfully');

        return redirect()->route('product_list', ['product_type_id' => $product_type_id, 'parent_id' => $parent_id]);
    }

    public function deleteProduct($id)
    {
        if (UserPermission::checkPermission('products', 'delete') > 0) {
            $Product = Product::find($id);
            Product::where('id', $id)->update(['deleted' => 1]);
            Session::flash('success', 'Deleted successfully');
            // return redirect()->route('product_list', ['product_type_id' => $Product->product_type_id, 'parent_id' => $Product->parent_id]);
            return redirect()->route('product');
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('product');
        }
    }


    public function product()
    {
        if (UserPermission::checkPermission('products') > 0) {
            $pTypes = ProductType::where('deleted', 0)->orderBy('order_no')->get();

            $gt_type = (isset($_GET['type']) && ($_GET['type'] > 0)) ? $_GET['type'] : 0;
            $gt_category = (isset($_GET['category']) && ($_GET['category'] > 0)) ? $_GET['category'] : 0;


            $pPages = Page::orderBy('menu_id')->orderBy('order_no')->get(); // For modal
            // dd($pPages);
            return view('admin.product.product', [
                'pTypes' => $pTypes,
                'gt_type' => $gt_type,
                'gt_category' => $gt_category,
                'pPages' => $pPages,
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }


    public function getProCatByType_ajax($pTypeId)
    {
        $pCats = ProductCategory::select('id', 'name', 'product_type_id', 'promote_to_front')
            ->where('product_type_id', $pTypeId)->where('parent_id', 0)->where('deleted', 0)->orderBy('order_no')
            ->get();

        return view('admin.product.ajax_product', [
            'pTypeId' => $pTypeId,
            'pCats' => $pCats,
        ]);
    }

    public function getProAndSubCatByCat_ajax($pTypeId, $pCatId)
    {
        $pSubCats = ProductCategory::select('id', 'name', 'product_type_id', 'promote_to_front')
            ->where('parent_id', $pCatId)->where('deleted', 0)->orderBy('order_no')
            ->get();

        $products =  Product::select(
            'id',
            'product_type_id',
            'parent_id',
            'name',
            'supplied_name',
            'trade_percentage',
            'profit_margin',
            'sales_percentage',
            'sale_start',
            'sale_end',
            'lead_time_days',
            'allow_samples',
            'image_name',
            'promote_to_front'
        )
            ->where('product_type_id', $pTypeId)->where('deleted', 0)->where('parent_id', $pCatId)
            ->orderBy('order_no')->get();

        return view('admin.product.ajax_product', [
            'pTypeId' => $pTypeId,
            'pCatId' => $pCatId,
            'pSubCats' => $pSubCats,
            'products' => $products,
        ]);
    }

    public function getProForSubCatCat_ajax($pTypeId, $pCatId)
    {
        $products =  Product::select(
            'id',
            'product_type_id',
            'parent_id',
            'name',
            'supplied_name',
            'trade_percentage',
            'profit_margin',
            'sales_percentage',
            'sale_start',
            'sale_end',
            'lead_time_days',
            'allow_samples',
            'image_name',
            'promote_to_front'
        )
            ->where('product_type_id', $pTypeId)->where('deleted', 0)->where('parent_id', $pCatId)
            ->orderBy('order_no')->get();

        // dd($products);
        return view('admin.product.ajax_product', [
            'pTypeId' => $pTypeId,
            'pCatId' => $pCatId,
            'subCatProducts' => $products,
        ]);
    }


    public function setPriceForTypeCategoryProduct(Request $request)
    {
        $inputs = $request->input();
        // dd($inputs);
        $arr = [
            'trade_percentage' => $request->trade_percentage,
            'profit_margin' => $request->profit_margin,
            'sales_percentage' => $request->sales_percentage,
            'sale_start' => $request->sale_start,
            'sale_end' => $request->sale_end,
        ];
        if ($request->setPrice_flag == 'setPriceType') {
            $update = Product::where('product_type_id', $request->setPrice_id)->where('deleted', 0)->update($arr);
        } elseif ($request->setPrice_flag == 'setPriceCat') {
            $update = Product::where('parent_id', $request->setPrice_id)->where('deleted', 0)->update($arr);
        } elseif ($request->setPrice_flag == 'setPricePro') {
            $update = Product::where('id', $request->setPrice_id)->update($arr);
        }
        if ($update) {
            Session::flash('success', 'Price set successfully');
        }

        return redirect()->route('product');
    }

    public function setLeadTimeForTypeCategoryProduct(Request $request)
    {
        $inputs = $request->input();
        $arr = [
            'lead_time_days' => $request->lead_time_days,
        ];

        if ($request->setLeadTime_flag == 'setLeadTimeType') {
            $update = Product::where('product_type_id', $request->setLeadTime_id)->where('deleted', 0)->update($arr);
        } elseif ($request->setLeadTime_flag == 'setLeadTimeCat') {
            $update = Product::where('parent_id', $request->setLeadTime_id)->where('deleted', 0)->update($arr);
        } elseif ($request->setLeadTime_flag == 'setLeadTimePro') {
            $update = Product::where('id', $request->setLeadTime_id)->update($arr);
        }
        if ($update) {
            Session::flash('success', 'Lead Time set successfully');
        }

        return redirect()->route('product');
    }


    public function generateCsvForProductType()
    {
        $la_output = ProductType::getCsvArrForProductType();
        Utility::arrayToCSV($la_output, 'ProductType_' . time());
    }

    public function generateCsvForProductCategory($pTypeId)
    {
        $la_output = ProductType::getCsvArrForProductCategory($pTypeId);
        Utility::arrayToCSV($la_output, 'ProductCategory_' . time());
    }

    public function generateCsvForProductList($pTypeId, $pCatId)
    {
        $la_output = ProductType::getCsvArrForProductList($pTypeId, $pCatId);
        Utility::arrayToCSV($la_output, 'Product_' . time());
    }


    public function getAssignContentList_ajax($id, $flag, $hitNo) // reload footer list
    {
        session_start();
        if ($flag == 'assignContentPro') {
            echo ProductTab::getAssignedContentListForProduct($id);
        } elseif (($flag == 'assignContentType') || ($flag == 'assignContentCat')) {
            echo ProductTab::getAssignedContentListUnsaved($id, $flag, $hitNo);
        }
    }

    public function assignContentSession_ajax(Request $request) // Assign add & edit
    {
        session_start();
        $inputs = $request->input();
        $id = $request->id;
        $flag = $request->flag;
        $tab_name = $request->name;
        $page_id = $request->page_id;

        // dd($inputs);
        $err = 0;
        $msg = '';
        $returnArr = [];
        if ($tab_name == '') {
            $err = 1;
            $msg = "Cannot update content tabs, no tab name specified";
        } else if ($page_id == 0) {
            $err = 1;
            $msg = "Cannot update content tabs, no content page specified";
        } else {
            if ($flag == 'assignContentPro') {
                if ($request->actionFlag == 'add') {

                    $tabCount = ProductTab::where('product_id', $id)->count() + 1;
                    $tabCountArr = ['name' => $tab_name, 'product_id' => $id, 'page_id' => $page_id, 'order_no' => $tabCount];
                    $create = ProductTab::create($tabCountArr);
                    if ($create) {
                        $err = 0;
                        $msg = "Tab content successfully assigned";
                    } else {
                        $err = 1;
                        $msg = "Error";
                    }
                } elseif ($request->actionFlag == 'edit') {
                    $update = ProductTab::where('id', $request->actionId)->update(['name' => $tab_name, 'page_id' => $page_id]);
                    if ($update) {
                        $err = 0;
                        $msg = "Tab content successfully assigned";
                    }
                }
                // dd($msg);
            } else {
                if ($flag == 'assignContentType') {
                    $dataType = 'type';
                } else {
                    $dataType = 'cat';
                }
                if ($request->actionFlag == 'add') {
                    if (!isset($_SESSION['assign_content'][$dataType][$id])) {
                        $_SESSION['assign_content'][$dataType][$id] = [];
                    }
                    $countTab = count($_SESSION['assign_content'][$dataType][$id]);
                    $tabCountArr = ['name' => $tab_name, 'type_id' => $id, 'page_id' => $page_id, 'order_no' => $countTab + 1];
                    $_SESSION['assign_content'][$dataType][$id][$countTab] = $tabCountArr;
                } elseif ($request->actionFlag == 'edit') {
                    $_SESSION['assign_content'][$dataType][$id][$request->actionId]['name'] = $tab_name;
                    $_SESSION['assign_content'][$dataType][$id][$request->actionId]['page_id'] = $page_id;
                }
            }
        }
        $returnArr['err'] = $err;
        $returnArr['msg'] = $msg;
        // dd($inputs);
        echo json_encode($returnArr);
    }

    public function actionAssignContent_ajax(Request $request) // delete & get data for edit
    {
        session_start();
        $inputs = $request->input();
        $return = [];
        $err = 0;
        $msg = "";
        $descFooter = "";
        if ($request->flag == 'assignContentPro') {
            $selectTab = ProductTab::find($request->tabId);
            if ($request->selectVal == 'delete') {
                if ($selectTab->delete()) {
                    $msg = "Successfully deleted content tab: “" . $selectTab->name . "”";
                    $descFooter = ProductTab::getAssignedContentListForProduct($selectTab->product_id);
                }
            } elseif ($request->selectVal == 'edit') {
                $return['tabData'] = $selectTab;
            } elseif ($request->selectVal == 'up') {
                $upTab = ProductTab::where('product_id', $selectTab->product_id)->where('order_no', '<', $selectTab->order_no)
                    ->orderBy('order_no', 'DESC')->first();
                ProductTab::where('id', $request->tabId)->update(['order_no' => $upTab->order_no]);
                ProductTab::where('id', $upTab->id)->update(['order_no' => $selectTab->order_no]);
                $descFooter = ProductTab::getAssignedContentListForProduct($selectTab->product_id);
            } elseif ($request->selectVal == 'down') {
                $downTab = ProductTab::where('product_id', $selectTab->product_id)->where('order_no', '>', $selectTab->order_no)
                    ->orderBy('order_no', 'ASC')->first();
                ProductTab::where('id', $request->tabId)->update(['order_no' => $downTab->order_no]);
                ProductTab::where('id', $downTab->id)->update(['order_no' => $selectTab->order_no]);
                $descFooter = ProductTab::getAssignedContentListForProduct($selectTab->product_id);
            }
            // dd( $return);
        } elseif ($request->flag == 'assignContentType') {
            if ($request->selectVal == 'delete') {
                unset($_SESSION['assign_content']['type'][$request->flagId][$request->tabId]);
                $descFooter = ProductTab::getAssignedContentListUnsaved($request->flagId, $request->flag, 'reload');
            } elseif ($request->selectVal == 'edit') {
                $return['tabData'] =  $_SESSION['assign_content']['type'][$request->flagId][$request->tabId];
            }
        } else {
            if ($request->selectVal == 'delete') {
                unset($_SESSION['assign_content']['cat'][$request->flagId][$request->tabId]);
                $descFooter = ProductTab::getAssignedContentListUnsaved($request->flagId, $request->flag, 'reload');
            } elseif ($request->selectVal == 'edit') {
                $return['tabData'] =  $_SESSION['assign_content']['cat'][$request->flagId][$request->tabId];
            }
        }
        $return['err'] = $err;
        $return['msg'] = $msg;
        // $return['tabData'] = $tab;
        $return['descFooter'] = $descFooter;

        echo json_encode($return);
    }

    public function assignContentSave_ajax($flagId, $flag)
    {
        session_start();
        $proNo = 0;
        $return = [];

        if ($flag == 'assignContentType') {
            $products = Product::select('id')->where('product_type_id', $flagId)->get();
            $dataFlag = 'type';
        } else {
            $products = Product::select('id')->where('parent_id', $flagId)->get();
            $dataFlag = 'cat';
        }
        if (count($products) > 0) {
            foreach ($products as $pro) {
                $proNo++;
                ProductTab::where('product_id', $pro->id)->delete();
                $saveData = (isset($_SESSION['assign_content'][$dataFlag][$flagId])) ? $_SESSION['assign_content'][$dataFlag][$flagId] : [];
                if (count($saveData) > 0) {
                    foreach ($saveData as $data) {
                        $fields = ['name' => $data['name'], 'product_id' => $pro->id, 'page_id' => $data['page_id'], 'order_no' => $data['order_no']];
                        ProductTab::create($fields);
                    }
                }
            }
        }
        // $_SESSION['assign_content'][$dataFlag][$flagId] = [];
        $msg = "<p class='success'> $proNo products updated</p> ";

        $return['msg'] = $msg;
        echo json_encode($return);
    }

    public function get_view_site_link($id, $flag)
    {
        $get_full_url = Product::get_view_site_link($id, $flag);
        $siteUrl = env('APP_URL') . $get_full_url;
        header("location: $siteUrl");
        exit();
    }

    public function delete_product_filter($pId, $wd, $hg, $lt_gt, $gpId, $opId)
    {
        $del = Filter::where('product_id', $pId)->where('width', $wd)->where('height', $hg)->where('lt_gt', $lt_gt)
            ->where('group_id', $gpId)->where('option_id', $opId)->delete();
        if ($del) {
            Session::flash('success', 'Filter delete successfully');
        }
        return redirect()->route('product_edit', $pId);
    }


    //==============================================//
    //============== START :: UPLOAD PRICE ==================//
    //===========================================//
    public function uploadPrice()
    {
        if (UserPermission::checkPermission('upload_prices') > 0) {

            return view('admin.product.upload_price');
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }


    public function uploadPriceTempList_ajax()
    {
        $bandList = Band::where('deleted', 0)->orderBy('name')->get();
        $loadTempData = ProductPriceTemp::select('id', 'temp_name', 'date_upload')->distinct('temp_name')->get();
        // dd($loadTempData);
        return view('admin.product.uploadPriceTempList_ajax', [
            'bandList' => $bandList,
            'loadTempData' => $loadTempData,
        ]);
    }


    public function uploadPriceAssignOptionList_ajax()
    {
        $priceList = ProductPrice::select('csv_name', 'band_id')
            ->where('option_id', null)->where('csv_name', '!=', null)->distinct('csv_name')->get();
        $bandIds = [];
        // dd($priceList);

        if (count($priceList) > 0) {
            foreach ($priceList as $price) {
                $bandIds[] = $price->band_id;
            }
        }

        $grList = DB::table('v2_map_band_group as gr_map')
            ->join('v2_group as gr', 'gr.group_id', '=', 'gr_map.group_id')
            ->select('gr_map.*', 'gr.group_admin_name')
            ->where('gr_map.removed', 0)
            ->where('gr.deleted', 0)
            ->whereIn('gr_map.band_id', $bandIds)
            ->get();

        // dd($grList);
        return view('admin.product.uploadPriceAssignOptionList_ajax', [
            'priceOptionList' => $priceList,
            'grList' => $grList,
        ]);
    }

    public function uploadPrice_store(Request $request)
    {
        $row = 0;
        $importArr = [];
        $importBandArr = [];
        $name = $request->name;
        $fileName = $_FILES['csv']['name'];

        if ($name == null) {
            Session::flash('error', 'You must specify a name');
            return redirect()->route('upload_price');
        }
        if ($fileName == '') {
            Session::flash('error', 'The CSV file was empty');
            return redirect()->route('upload_price');
        }

        if (($handle = fopen($_FILES['csv']['tmp_name'], "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);

                for ($c = 0; $c < $num; $c++) {
                    $importArr[$row][] = $data[$c];
                    if (($c == 4) && !in_array($data[$c], $importBandArr)) {
                        $importBandArr[] = $data[$c];
                    }
                }
                $row++;
                // dd($importArr);
            }
            fclose($handle);
        }
        $importBandData = Band::whereIn('name', $importBandArr)->get();

        if (count($importArr) > 1) {
            // dd($importArr);
            foreach ($importArr as $rowKey => $importRow) {
                $bandId = 0;
                if ($rowKey > 0) {
                    if (count($importBandData) > 0) {
                        foreach ($importBandData as $bandRow) {
                            if ($bandRow->name == $importRow[4]) {
                                $bandId = $bandRow->id;
                            }
                        }
                    }

                    $temp_name = trim($name) . (($importRow[4]) ?  (': ' . trim($importRow[4])) : '');

                    $csv_name = trim($name) . " - " . $importRow[4] . " : " . trim($importRow[6]);
                    $csv_hash = md5($csv_name);

                    $values = array(
                        'id' =>  $bandId,
                        'temp_name' => $temp_name,
                        'band' => $bandId,
                        'width_min' => $importRow[0],
                        'width_max' => $importRow[1],
                        'height_min' => $importRow[2],
                        'height_max' => $importRow[3],
                        'price' => $importRow[5],
                        'csv_hash' => $csv_hash,
                        'csv_name' => $csv_name
                    );
                    ProductPriceTemp::create($values);
                }
            }
        }
        return redirect()->route('upload_price');
        // dd($importArr);
        // dd($_FILES['csv']['tmp_name']);
    }


    public function assignTempPrice_ajax($id, $band_id)
    {
        $temData = ProductPriceTemp::where('id', $id)->get();
        // dd($temData);
        if ((count($temData) > 0) && ($band_id > 0)) {
            $delete = ProductPrice::where('band_id', $band_id)->delete();
            foreach ($temData as $row) {
                $fields = [
                    'band_id' => $band_id,
                    'width_min' => $row->width_min,
                    'width_max' => $row->width_max,
                    'height_min' => $row->height_min,
                    'height_max' => $row->height_max,
                    'price' => $row->price,
                    'csv_hash' => $row->csv_hash,
                    'csv_name' => $row->csv_name,
                    'option_id' => null,
                ];
                $insert = ProductPrice::create($fields);
            }


            $delete = ProductPriceTemp::where('id', $id)->delete();
        }
    }


    public function deleteTempPrice_ajax($id)
    {
        $delete = ProductPriceTemp::where('id', $id)->delete();
        echo $delete;
    }


    public function getOptionByGrId_ajax($GrId, $BandId)
    {
        $optionList = Option::select('option_id', 'option_name')->where('group_id', $GrId)->get();

        $optionHtml = "<select class='selectOptionDropdown form-control' id='selectOptionDropdown__$BandId'><option value=''>Select option...</option>";
        if (count($optionList) > 0) {
            foreach ($optionList as $option) {
                $optionHtml .= "<option value='$option->option_id'>$option->option_name</option>";
            }
        }
        $optionHtml .= "</select>";

        echo $optionHtml;
    }


    public function saveOptionbox_ajax($optionId, $bandId)
    {
        $return = ['success' => 0, 'msg' => ''];
        if (($optionId != '') && ($optionId != 0)) {
            $update = ProductPrice::where('band_id', $bandId)->update(['option_id' => $optionId]);
            if ($update) {
                $return = ['success' => 1, 'msg' => 'Option assigned'];
            } else {
                $return['msg'] = "Something wrong";
            }
        } else {
            $return['msg'] = "No option selected";
        }

        echo json_encode($return);
    }

    public function delete_price_option($bandId)
    {
        $return = ['success' => 0, 'msg' => 'Something wrong'];
        if (($bandId != '') && ($bandId != 0)) {
            $update = ProductPrice::where('band_id', $bandId)->delete();
            if ($update) {
                $return = ['success' => 1, 'msg' => 'Delete successfully'];
            }
        }

        echo json_encode($return);
    }


    public function product_price_list()
    {
        $supplierList = Supplier::where('is_delete', '0')->get();
        $pTypes = ProductType::select('id', 'pname')->where('deleted', 0)->orderBy('pname')->get();
        $bandList = Band::select('id', 'name')->where('deleted', 0)->orderBy('name')->get();
        $productList =  Product::select('id', 'name')->where('deleted', 0)->orderBy('name')->get();

        return view('admin.product.product_price_list', [
            'supplierList' => $supplierList,
            'pTypes' => $pTypes,
            'bandList' => $bandList,
            'productList' => $productList
        ]);
    }

    public function view_product_price_table(Request $request)
    {
        $inputs = $request->input();

        $supplier_id = ($request->supplier_id == null) ? 0 : $request->supplier_id;
        $product_type_id = ($request->product_type_id == null) ? 0 : $request->product_type_id;
        $band_ids = (isset($request->band_ids)) ? (((count($request->band_ids) == 1) && ($request->band_ids[0] == 0)) ? 0 : $request->band_ids) : 0;   //=== request->band_ids = []
        $product_ids = (isset($request->product_ids)) ? (((count($request->product_ids) == 1) && ($request->product_ids[0] == 0)) ? 0 : $request->product_ids) : 0;   //=== request->product_ids = []

        if (($band_ids != 0) || ($supplier_id > 0) || ($product_type_id > 0)) {
            if ($band_ids == 0) {
                $band_list = GuideText::band_list_filter($supplier_id, $product_type_id);
                $band_ids = [];
                if (count($band_list) > 0) {
                    foreach ($band_list as $band) {
                        $band_ids[] = $band->id;
                    }
                }
            }

            if (count($band_ids) > 0) {

                $priceList =  DB::table('v2_product_price as pp')
                    ->join('v2_band as b', 'b.id', '=', 'pp.band_id')
                    ->join('suppliers as s', 's.supplier_id', '=', 'b.supplier_id')
                    ->join('v2_product_types as pt', 'pt.id', '=', 'b.product_type_id')
                    // ->join('v2_option as o', 'o.option_id', '=', 'pp.option_id')
                    ->select('pp.*', 'b.name as band_name', 'pt.pname as p_type_name', 's.supplier_name')
                    ->where('b.deleted', 0)
                    // ->where('s.is_delete', 0)
                    // ->where('pt.deleted', 0)
                    ->whereIn('b.id', $band_ids)
                    ->get();
                // dd($priceList);
                return view('admin.product.ajax_product_price_table', [
                    'priceList' => $priceList,
                ]);
            } else {
                echo "<div class='col-md-12 no-product'>No data found</div>";
            }
        } else {
            echo "<div class='col-md-12 no-product'>You have not selected Supplier from dropdown</div>";
        }
        exit();
        // dd($inputs);
    }

    public function update_product_price(Request $request)
    {
        $inputs = $request->input();
        if (($request->width_min > 0) && ($request->width_max > 0) && ($request->height_min > 0) && ($request->height_max > 0) && ($request->price > 0)) {
            if ($request->width_min >= $request->width_max) {
                echo "Width to must be greater than Width from";
            } elseif ($request->height_min >= $request->height_max) {
                echo "Drop to must be greater than Drop from";
            } else {
                ProductPrice::where('price_id', $request->price_id)->update([
                    'width_min' => $request->width_min,
                    'width_max' => $request->width_max,
                    'height_min' => $request->height_min,
                    'height_max' => $request->height_max,
                    'price' => $request->price,
                ]);
                echo 1;
            }
        } else {
            echo "Fill all fields";
        }

        exit();
        // dd($inputs);
    }
}
