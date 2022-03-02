<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'v2_feedback';
    public $timestamps = false;

    protected $fillable = [
        'date', 'name', 'comment', 'promote_to_front'
    ];
}
