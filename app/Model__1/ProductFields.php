<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductFields extends Model
{
    protected $table = 'v2_product_fields';
    public $timestamps = false;

    protected $fillable = [
        'field_name', 'FieldImage', 'FieldDescription'
    ];

    protected $attributes = [
        'field_name' => '',
        'FieldImage' => '',
        'FieldDescription' => '',
    ];

}
