<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductFilter extends Model
{

    protected $table = 'v3_product_filters';
    public $timestamps = false;

    protected $fillable = [
        'type_id', 'name', 'image'
    ];

    protected $attributes = [
        'type_id' => 0,
        'name' => '',
        'image' => '',
    ];

    static function update_matrix_product_filter($product_id, $request)
    {
        if (isset($request->radioSelect) && (count($request->radioSelect) > 0)) {
            $radioSelect = $request->radioSelect;

            foreach ($radioSelect as $filterTypeId => $radio) {
                $selectedFilter = (isset($request->filter[$filterTypeId]) && (count($request->filter[$filterTypeId]) > 0)) ? $request->filter[$filterTypeId] : [];
                // dd($selectedFilter);

                if ($radio == 'yes') {
                    foreach ($selectedFilter as $filterId) {
                       
                        $checkMap = ProductFilterMap::where('filter_id', $filterId)->where('product_id', $product_id)->first();
                       
                        if (empty($checkMap)) {
                            // dd($product_id);
                            ProductFilterMap::create(['filter_id' => $filterId, 'product_id' => $product_id]);
                        }
                    }
                } elseif ($radio == 'no') {
                    $filterData = ProductFilter::where('type_id', $filterTypeId)->get();
                    $filterIds = [];

                    foreach ($filterData as $filterRow) {
                        $filterIds[] = $filterRow->id;
                    }

                    ProductFilterMap::whereIn('filter_id', $filterIds)->where('product_id', $product_id)->delete();
                    foreach ($selectedFilter as $filterId) {
                        $checkMap = ProductFilterMap::where('filter_id', $filterId)->where('product_id', $product_id)->first();
                        if (empty($checkMap)) {
                            ProductFilterMap::create(['filter_id' => $filterId, 'product_id' => $product_id]);
                        }
                    }
                } elseif ($radio == 'remove') {
                    //=== No any update
                }
            }
        }
    }
}
