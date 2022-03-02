<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductFilterMap extends Model
{
    protected $table = 'v3_product_filter_map';
    public $timestamps = false;

    protected $fillable = [
        'filter_id', 'product_id'
    ];

    
    public function productFilter(){
        return $this->hasOne(ProductFilter::class, 'id', 'filter_id');
    }
}
