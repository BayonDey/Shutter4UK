<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductImgMap extends Model
{
    protected $table = 'product_img_map';
    public $timestamps = false;

    protected $fillable = [
        'product_id', 'image_name', 'update_time', 'status'
    ];
}
