<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NewsLetter extends Model
{
    protected $table = 'news_letter_templates';
    public $timestamps = false;

    protected $fillable = [
        'title', 'description', 'status_deleted'
    ];

    protected $attributes = [
        'title' => '',
        'description' => '',
        'status_deleted' => 0,
    ];
}
