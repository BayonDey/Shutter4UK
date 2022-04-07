<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductHomepage extends Model
{
    protected $table = 'v2_product_homepage';  
    public $timestamps = false;

    protected $fillable = [
        'product_id', 'thumb_image', 'display_homepage', 'product_type', 'ALT_tag_desc',
         'ALT_tag', 'ColorText', 'orderset', 'TotalChar', 'big_img', 'alt_tag_desc_mobile',
          'mng_homepagethumb'
    ];
}
