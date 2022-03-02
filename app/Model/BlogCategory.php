<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    
    protected $table = 'blog_category_tbl';
    public $timestamps = false;

    protected $fillable = [
        'title', 'url', 'description', 'stats_deleted', 'img_name', 'date_time', 'cat_name'
    ];

}
