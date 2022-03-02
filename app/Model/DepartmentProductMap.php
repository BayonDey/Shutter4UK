<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DepartmentProductMap extends Model
{
    protected $table = 'department_product_map';
    public $timestamps = false;

    protected $fillable = [
        'department_id', 'product_id', 'status'
    ];
}
