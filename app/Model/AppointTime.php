<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AppointTime extends Model
{
    protected $table = 'appoint_time_lst';
    public $timestamps = false;

    protected $fillable = [
        'name', 'show_front'
    ];
}
