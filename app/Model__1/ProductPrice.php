<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    protected $table = 'v2_product_price';
    public $timestamps = false;

    protected $fillable = [
         'band_id', 'width_min', 'width_max', 'height_min',
        'height_max', 'price', 'csv_hash', 'csv_name', 'option_id'
    ];
}
