<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DepartmentCategory extends Model
{
    protected $table = 'department_category';
    public $timestamps = false;

    protected $fillable = [
         'category_name', 'category_url', 'product_description',
        'promote_front', 'meta_title', 'meta_description', 'created_date',
        'schema_desc'
    ];
    protected $attributes = [
        'category_name' => '',
        'category_url' => '',
        'category_description' => '',
        'promote_front' => 'Y',
        'meta_title' => '',
        'meta_description' => '',
        'schema_desc' => '',
    ];

}
