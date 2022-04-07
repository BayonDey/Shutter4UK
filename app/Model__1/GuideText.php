<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

// use App\ProductLinks;

class GuideText extends Model
{
    protected $table = 'v2_guide_text';
    public $timestamps = false;

    protected $fillable = [
        'text', 'link', 'PDF_Upload'
    ];

    protected $attributes = [
        'text' => '',
        'link' => '',
        'PDF_Upload' => '',
    ];


    static function product_list_filter_with_band($supplier_id, $product_type_id, $band_id)
    {

        if (($supplier_id == 0) && ($product_type_id == 0)) {
            if ($band_id == 0) {
                $productList =  Product::select('id', 'name')->where('deleted', 0)->orderBy('name')->get();
            } else {
                $productList =  Product::select('id', 'name')->whereIn('band_id', $band_id)->where('deleted', 0)->orderBy('name')->get();
            }
        } elseif (($supplier_id == 0) && ($product_type_id > 0)) {
            if ($band_id == 0) {
                $productList =  Product::select('id', 'name')->where('product_type_id', $product_type_id)->where('deleted', 0)->orderBy('name')->get();
            } else {
                $productList =  Product::select('id', 'name')->where('product_type_id', $product_type_id)->whereIn('band_id', $band_id)->where('deleted', 0)->orderBy('name')->get();
            }
        } elseif (($supplier_id > 0) && ($product_type_id == 0)) {
            if ($band_id == 0) {
                $productList =  Product::select('id', 'name')->where('supplier_id', $supplier_id)->where('deleted', 0)->orderBy('name')->get();
            } else {
                $productList =  Product::select('id', 'name')->where('supplier_id', $supplier_id)->whereIn('band_id', $band_id)->where('deleted', 0)->orderBy('name')->get();
            }
        } elseif (($supplier_id > 0) && ($product_type_id > 0)) {
            if ($band_id == 0) {
                $productList =  Product::select('id', 'name')->where('supplier_id', $supplier_id)->where('product_type_id', $product_type_id)->where('deleted', 0)->orderBy('name')->get();
            } else {
                $productList =  Product::select('id', 'name')->where('supplier_id', $supplier_id)->where('product_type_id', $product_type_id)->whereIn('band_id', $band_id)->where('deleted', 0)->orderBy('name')->get();
            }
        }

        return $productList;
    }


    static function product_list_filter($supplier_id, $product_type_id)
    {

        if (($supplier_id == 0) && ($product_type_id == 0)) {
            $productList =  Product::select('id', 'name')->where('deleted', 0)->orderBy('name')->get();
        } elseif (($supplier_id == 0) && ($product_type_id > 0)) {
            $productList =  Product::select('id', 'name')->where('product_type_id', $product_type_id)->where('deleted', 0)->orderBy('name')->get();
        } elseif (($supplier_id > 0) && ($product_type_id == 0)) {
            $productList =  Product::select('id', 'name')->where('supplier_id', $supplier_id)->where('deleted', 0)->orderBy('name')->get();
        } elseif (($supplier_id > 0) && ($product_type_id > 0)) {
            $productList =  Product::select('id', 'name')->where('supplier_id', $supplier_id)->where('product_type_id', $product_type_id)->where('deleted', 0)->orderBy('name')->get();
        }

        return $productList;
    }


    static function band_list_filter($supplier_id, $product_type_id)
    {
        if (($supplier_id == 0) && ($product_type_id == 0)) {
            $bandList =  Band::select('id', 'name')->where('deleted', 0)->orderBy('name')->get();
        } elseif (($supplier_id == 0) && ($product_type_id > 0)) {
            $bandList =  Band::select('id', 'name')->where('product_type_id', $product_type_id)->where('deleted', 0)->orderBy('name')->get();
        } elseif (($supplier_id > 0) && ($product_type_id == 0)) {
            $bandList =  Band::select('id', 'name')->where('supplier_id', $supplier_id)->where('deleted', 0)->orderBy('name')->get();
        } elseif (($supplier_id > 0) && ($product_type_id > 0)) {
            $bandList =  Band::select('id', 'name')->where('supplier_id', $supplier_id)->where('product_type_id', $product_type_id)->where('deleted', 0)->orderBy('name')->get();
        }
        return $bandList;
    }


    static function update_matrix_guide($product_id, $guide_id)
    {
        $delProGuideLink = ProductLinks::where('product_id', $product_id)->delete();

        $guideTextList = GuideLandingValue::where('guide_id', $guide_id)->get();
        if (count($guideTextList) > 0) {
            foreach ($guideTextList as $row) {
                ProductLinks::create(['product_id' => $product_id, 'text_id' => $row->text_id, 'guide_id' => $guide_id, 'flag' => 1]);
            }
        }

        $updateProduct = Product::where('id', $product_id)->update(['guide_id' => $guide_id]);
        if ($updateProduct) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
