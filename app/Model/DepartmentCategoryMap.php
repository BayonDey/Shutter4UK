<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DepartmentCategoryMap extends Model
{
    protected $table = 'department_category_map';
    public $timestamps = false;

    protected $fillable = [
        'department_id', 'category_id', 'status'
    ];
}
