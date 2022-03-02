<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Promotions extends Model
{
    protected $table = 'v2_promotions';
    public $timestamps = false;

    protected $fillable = [
         'name', 'type', 'x', 'start_date', 'end_date', 'code'
    ];

}
