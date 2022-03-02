<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\ProductLinks;
use App\Model\Band;
use App\Model\ProductTab;

class Product extends Model
{
    protected $table = 'v2_products';
    public $timestamps = false;

    protected $fillable = [
        'name', 'supplied_name', 'parent_id', 'supplier_id', 'image_name', 'description',
        'composition', 'technical_info', 'swatch_image', 'product_type_id', 'bname',
        'finish', 'max_width', 'max_drop', 'max_width_turned', 'max_drop_turned',
        'rshape', 'raise_option', 'linning', 'pattern_repeat', 'fabric_join', 'template_id',
        'band_id', 'trade_percentage', 'profit_margin', 'sales_percentage', 'sale_start',
        'sale_end', 'lead_time_days', 'allow_samples', 'deleted', 'tag_cloud',
        'product_keyword', 'order_no', 'x', 'start_date', 'end_date', 'code', 'out_stock',
        'due_date', 'promote_to_front', 'guide_id', 'TagCloudMeasurement',
        'TagCloudKeyworkOrPhase', 'TagCloudAreaOrPostCodes', 'assign_template_id',
        'louvres_only_available', 'searchrslt', 'first_swatch_image',
        'second_swatch_image', 'third_swatch_image', 'thumbnail1_description',
        'thumbnail2_description', 'thumbnail3_description', 'textforpdf',
        'first_swatch_UploadPDF', 'second_swatch_UploadPDF', 'third_swatch_UploadPDF',
        'lifestyleimg_name', 'colleclifestyle_name', 'm_image_sm', 'show_main_img',
        'promotetohome', 'swatchhomedesc', 'favorite_img_name', 'schema_desc',
        'scroll_manual_link', 'scroll_image_alt', 'lifestleimg_scnd', 'scroll_filter_link',
        'lessleadtime'
    ];

    protected $attributes = [
        'composition' => '',
        'technical_info' => '',
        'swatch_image' => '',
        'bname' => '',
        'finish' => '',
        'max_drop_turned' => 0,
        'rshape' => '',
        'raise_option' => '',
        'linning' => '',
        'pattern_repeat' => '',
        'fabric_join' => '',
        'deleted' => 0,
        'product_keyword' => '',
        'order_no' => 0,
        'guide_id' => 0,
        'out_stock' => 0,
        'lessleadtime' => '',
        'first_swatch_image' => '',
        'second_swatch_image' => '',
        'third_swatch_image' => '',
        'first_swatch_UploadPDF' => '',
        'second_swatch_UploadPDF' => '',
        'third_swatch_UploadPDF' => '',
        'lifestyleimg_name' => '',
        'colleclifestyle_name' => '',
        'favorite_img_name' => '',
        'lifestleimg_scnd' => '',
        'start_date' => '0000-00-00',
    ];

    public function getType()
    {
        return $this->hasOne(ProductType::class, 'id', 'product_type_id');
    }

    public function getSupplier()
    {
        return $this->hasOne(Supplier::class, 'supplier_id', 'supplier_id');
    }

    public function guideHead()
    {
        return $this->hasOne(ProductGuide::class, 'id', 'guide_id');
    }

    public function selectedGuideText()
    {
        return $this->hasMany(ProductLinks::class, 'product_id', 'id');
    }

    public function band()
    {
        return $this->hasOne(Band::class, 'id', 'band_id');
    }

    public function getCategory()
    {
        return $this->hasOne(ProductCategory::class, 'id', 'parent_id');
    }

    public function tabs()
    {
        return $this->hasMany(ProductTab::class, 'product_id', 'id');
    }

    public function searchFilterMap()
    {
        return $this->hasMany(Filter::class, 'product_id', 'id');
    }
    public function getTemplate()
    {
        return $this->hasOne(ProductTemplate::class, 'id', 'template_id');
    } 
    public function getAssignedTemplate()
    {
        return $this->hasOne(ProductTemplate::class, 'id', 'assign_template_id');
    }


    public static function get_view_site_link($id, $flag)
    {
        if ($flag == 'type') {
            $type = ProductType::find($id);
            $site_url = $type->url;
        } elseif ($flag == 'category') {
            $category = ProductCategory::find($id);
            $type_url = $category->getType->url;
            $category_url = str_replace([' ', '\\', '"', '_'], '-', strtolower($category->name));
            $site_url = $type_url . "/" . $category_url;
        } elseif ($flag == 'sub_category') {
            $subCategory = ProductCategory::find($id);
            $type_url = $subCategory->getType->url;
            $category_url = str_replace([' ', '\\', '"', '_'], '-', strtolower($subCategory->getParentCategory->name));
            $sub_category_url = str_replace([' ', '\\', '"', '_'], '-', strtolower($subCategory->name));
            $site_url = $type_url . "/" .$category_url . "/" . $sub_category_url;
        } elseif ($flag == 'product') {
            $product = Product::find($id);
            $type_url = str_replace('blinds', 'blind', strtolower($product->getType->url));
            $pro_url = str_replace([' ', '\\', '"', '_'], '-', strtolower($product->name));

            $site_url = $pro_url . "-" . $type_url;
        }
        return $site_url;
    }
}
