<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'v2_product_types';

    protected $fillable = [
        'pname', 'category_id', 'pdesc', 'pimage', 'short_desc', 'header_image',
        'width', 'width1', 'height', 'height1', 'price', 'discount', 'scheme',
        'profit_margin', 'position', 'url', 'system_name', 'order_no', 'taxonomy', 'promote_to_front', 'is_flash', 'tag_cloud', 'delivery_image', 'x', 'start_date', 'end_date', 'code', 'flash_disabled_image', 'discount_text', 'totalchars', 'AssignTemplate', 'HP_MainImageAltText', 'deleted', 'TagCloudMeasurement', 'TagCloudKeyworkOrPhase', 'TagCloudAreaOrPostCodes', 'discount_txt_img',
        'discount_txt_size',
        'discount_txt_color', 'discount_txt_weight', 'BannerChkHome', 'NS_FontFamily', 'NS_FontSize', 'NS_FontStyles', 'NS_FontWeight', 'NS_HTMLButtonSwitch', 'NS_HTMLButtonText', 'discount_text_parttwo', 'discount_txt_size_parttwo', 'FLASH_FontFamily_PartOne', 'FLASH_FontFamily_PartTwo', 'discount_txt_color_parttwo', 'discount_txt_weight_parttwo', 'discount_txt_style_partone', 'discount_txt_style_parttwo', 'Discount_Image_Alt', 'image_logo', 'collectionlogooption', 'saleimage', 'louvres_only_available', 'searchrslt', 'category_limit', 'tb_text', 'tb_bg_color', 'product_cap_text', 'head_captxt_desc', 'product_cap_text_option', 'head_captxt_desc_option', 'op_extra_promo_code', 'searchfilterpage', 'product_footer_scroll', 'f_footer_scroll', 'default_html_btn_colour', 'main_banner_promote_front', 'banner_start_date', 'banner_end_date', 'mngCombineSlider', 'bigtxtfontsize', 'bigtxtcolour', 'bigtext_TextBanner', 'midtxtfontsize', 'midtxtcolour', 'smalltext_TextBanner', 'smalltxtfontsize', 'smalltxtcolour', 'vrysmalltext_TextBanner', 'bg_colour_TextBanner', 'htmlbtntext_TextBanner', 'htmlbtnlink_TextBanner',
        'htmlbtncolour_TextBanner'
    ];
    public $timestamps = false;

    protected $attributes = [
        'pimage' => '',
        'header_image' => '',
        'delivery_image' => '',
        'flash_disabled_image' => '',
        'discount_txt_img' => '',
    ];

    public static function getCsvArrForProductType()
    {
        $pTypes = ProductType::select('id', 'pname')->where('deleted', 0)->orderBy('order_no')->get();

        $la_output[0] = ['no' => 'SL No.', 'id' => 'ID', 'pname' => 'Product type', 'promote_to_front' => 'Promote to front'];
        foreach ($pTypes as $i => $type) {
            $la_output[$i + 1]['no'] = $i + 1;
            $la_output[$i + 1]['id'] = $type->id;
            $la_output[$i + 1]['pname'] = $type->pname;
            $la_output[$i + 1]['promote_to_front'] = ($type->promote_to_front == 't') ? 'Yes' : 'No';
        }
        return  $la_output;
    }

    public static function getCsvArrForProductCategory($pTypeId){
        
        $pType = ProductType::find($pTypeId);

        $pCats = ProductCategory::select('id', 'name', 'product_type_id', 'promote_to_front')
            ->where('product_type_id', $pTypeId)->where('deleted', 0)->where('parent_id', 0)->orderBy('order_no')
            ->get();

        $la_output[0] = ['', 'Product type:', $pType->pname];
        $la_output[1] = ['no' => 'SL No.', 'id' => 'ID', 'name' => 'Category name', 'promote_to_front' => 'Promote to front'];
        foreach ($pCats as $i => $row) {
            $la_output[$i + 2]['no'] = $i + 1;
            $la_output[$i + 2]['id'] = $row->id;
            $la_output[$i + 2]['name'] = $row->name;
            $la_output[$i + 2]['promote_to_front'] = ($row->promote_to_front == 't') ? 'Yes' : 'No';
        }
        return  $la_output;
    }

    public static function getCsvArrForProductList($pTypeId, $pCatId){

        $pType = ProductType::find($pTypeId);
        $pCats = ProductCategory::find($pCatId);

        $products = Product::where('product_type_id', $pTypeId)->where('parent_id', $pCatId)
            ->where('deleted', 0)->orderBy('order_no')
            ->get();

        $la_output[0] = ['', 'Product type:', $pType->pname, '', 'Category name:', $pCats->name];
        $la_output[1] = [
            'no' => 'SL No.',
            'id' => 'ID',
            'name' => 'Product name',
            'supplied_name' => 'Supplied name',
            'trade_percentage' => 'Trade percentage',
            'profit_margin' => 'Profit margin',
            'sales_percentage' => 'Sales percentage',
            'sale_start' => 'Sale start',
            'sale_end' => 'Sale end'
        ];
        foreach ($products as $i => $row) {
            $la_output[$i + 2]['no'] = $i + 1;
            $la_output[$i + 2]['id'] = $row->id;
            $la_output[$i + 2]['name'] = $row->name;
            $la_output[$i + 2]['supplied_name'] = $row->supplied_name;
            $la_output[$i + 2]['trade_percentage'] = $row->trade_percentage . "%";
            $la_output[$i + 2]['profit_margin'] = $row->profit_margin . "%";
            $la_output[$i + 2]['sales_percentage'] = $row->sales_percentage . "%";
            $la_output[$i + 2]['sale_start'] = date('d/m/Y', strtotime($row->sale_start));
            $la_output[$i + 2]['sale_end'] = date('d/m/Y', strtotime($row->sale_end));
        }
        if (count($products) == 0) {
            $la_output[2]['no'] = '';
            $la_output[2]['id'] = '';
            $la_output[2]['name'] = '';
            $la_output[2]['supplied_name'] = 'No product';
            $la_output[2]['trade_percentage'] = '';
            $la_output[2]['profit_margin'] = '';
            $la_output[2]['sales_percentage'] = '';
            $la_output[2]['sale_start'] = '';
            $la_output[2]['sale_end'] = '';
        }
        return  $la_output;
    }
}
