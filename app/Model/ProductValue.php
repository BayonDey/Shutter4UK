<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductValue extends Model
{
    protected $table = 'v2_product_values';
    public $timestamps = false;

    protected $fillable = [
        'product_id', 'field_id', 'value'
    ];

}
