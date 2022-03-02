<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $table = 'blog_page_templates';
    public $timestamps = false;

    protected $fillable = [
        'title', 'url', 'description', 'stats_deleted', 'img_name', 'bytext', 'date_time',
         'meta_robots', 'promote_to_front'
    ];

    protected $attributes = [
        'img_name' => '',
    ];

}
