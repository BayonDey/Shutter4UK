<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Postcode extends Model
{
    protected $table = 'postcodes';
    public $timestamps = false;
    
    protected $fillable = [
        'postcode', 'postcode_name',
    ];
}
