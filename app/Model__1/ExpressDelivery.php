<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ExpressDelivery extends Model
{
    protected $table = 'express_delivery';
    public $timestamps = false;

    protected $fillable = [
        'supplier_id', 'delivery_cost', 'total_cost_vat', 'delivery_cost_discount',
        'total_cost_discount', 'express_delivery_text', 'enable_or_disable'
    ];

    protected $attributes = [
        'supplier_id' => 0,
        'delivery_cost' => 0,
        'total_cost_vat' => 0,
        'delivery_cost_discount' => 0,
        'total_cost_discount' => 0,
        'express_delivery_text' => '',
        'enable_or_disable' => 0,
    ];
}
