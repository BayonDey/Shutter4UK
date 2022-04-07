<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Metatag extends Model
{
    protected $table = 'metatags';
    public $timestamps = false;

    protected $fillable = [
        'url', 'title', 'description', 'is_product', 'keywords',
        'footer', 'footer_link', 'footer_link1', 'footer_link2', 'footer_link3', 'footer_link4', 'static_desc_search'
    ];
    protected $attributes = [
        'is_product' => 0,
        'keywords' => '',
        'footer' => '',
        'footer_link' => '',
        'footer_link1' => '',
        'footer_link2' => '',
        'footer_link3' => '',
        'footer_link4' => '',
        'static_desc_search' => '',
    ];
}
