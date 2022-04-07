<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Discounts extends Model
{
    protected $table = 'discounts';
    public $timestamps = false;

    protected $fillable = [
        'x', 'start', 'end', 'start_date', 'end_date', 'swatch_id', 'promotiontext',
        'promotionimgone', 'promotionimgtwo', 'promotionimgthree', 'promoOptionImg',
        'promoOption', 'fixeddiscount', 'choosediscount'
    ];

    protected $attributes = [
        'x' => 0,
        'start' => 0,
        'end' => 0,
        'start_date' => '',
        'end_date' => '',
        'swatch_id' => 0,
        'promotiontext' => '',
        'promotionimgone' => '',
        'promotionimgtwo' => '',
        'promotionimgthree' => '',
        'promoOptionImg' => 1,
        'promoOption' => 1,
        'fixeddiscount' => 0,
        'choosediscount' => 'PO'
    ];
}
