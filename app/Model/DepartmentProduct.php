<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DepartmentProduct extends Model
{
    protected $table = 'department_product';
    public $timestamps = false;

    protected $fillable = [
        'product_cat_id', 'product_title', 'product_st_desc', 'product_desc', 'product_main_img',
        'last_update', 'status', 'promote_front', 'show_in_main_home'
    ];
    protected $attributes = [
        'product_cat_id' => 0,
        'product_title' => '',
        'product_st_desc' => '',
        'product_desc' => '',
        'product_main_img' => '',
        'last_update' => '',
        'status' => '1',
        'show_in_main_home' => 'N'
    ];
}
