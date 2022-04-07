<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'section_users';
    public $timestamps = false;

    protected $fillable = [
        'sections', 'section_key', 'url', 'parent_id', 'icon_class', 'order_no'
    ];
}
