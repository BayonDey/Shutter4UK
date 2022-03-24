<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DeptWhyShopText extends Model
{
    protected $table = 'departments_why_shop_text';
    public $timestamps = false;

    protected $fillable = [
        'dept_id', 'shop_text', 'icon_color'
    ];
}
