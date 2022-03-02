<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductPriceTemp extends Model
{
    protected $table = 'v2_product_price_temp';
    public $timestamps = false;

    protected $fillable = [
        'id', 'temp_name', 'date_upload', 'band', 'width_min', 'width_max',
        'height_min', 'height_max', 'price', 'csv_hash', 'csv_name'
    ];
}
