<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'v2_pages';
    public $timestamps = false;
    
    protected $fillable = [
        'title', 'menu_title', 'url', 'image',
        'text', 'template', 'is_disabled', 'order_no', 'menu_id', 'AltTag_HeaderImg',
    ];
}
