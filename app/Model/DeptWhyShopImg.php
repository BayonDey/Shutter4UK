<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DeptWhyShopImg extends Model
{
    protected $table = 'departments_why_shop_img';
    public $timestamps = false;

    protected $fillable = [
        'dept_id', 'caption', 'image', 'alt_tag', 'link', 'description'
    ];
}
