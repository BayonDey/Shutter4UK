<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlogCatMap extends Model
{
    protected $table = 'blog_category_map_tbl';
    public $timestamps = false;

    protected $fillable = [
        'blog_id', 'category_id'
    ];
}
