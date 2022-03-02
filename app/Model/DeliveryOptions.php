<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DeliveryOptions extends Model
{
    protected $table = 'v2_delivery_options';
    public $timestamps = false;

    protected $fillable = [
        'name', 'display_name', 'price', 'free_over_amount'
    ];
}
