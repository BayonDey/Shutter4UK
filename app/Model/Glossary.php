<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Glossary extends Model
{
    protected $table = 'glossary_tbl';
    public $timestamps = false;

    protected $fillable = [
        'title', 'description'
    ];

}
