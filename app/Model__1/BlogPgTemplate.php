<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlogPgTemplate extends Model
{
    protected $table = 'pg_templates';
    public $timestamps = false;

    protected $fillable = [
        'template_id', 'template_title', 'template_description', 'template_image',
         'temp_footer_desc'
    ];

    protected $attributes = [
        'template_title' => '',
        'template_description' => '',
        'template_image' => '',
        'temp_footer_desc' => '',
    ];

}
