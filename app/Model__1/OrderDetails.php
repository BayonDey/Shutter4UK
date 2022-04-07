<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = 'v2_order_details';
    public $timestamps = false;

    protected $fillable = [
        'order_id', 'product_id', 'product_name', 'supplied_name', 'product_type_name',
        'supplier_id', 'quantity', 'lead_time_days', 'trade_price', 'sale_discount',
        'retail_price', 'final_price', 'express_delivery', 'PreChristmasDelivery',
        'HolidayLeadText', 'HolidayLeadDate', 'loubreshidden', 'full_swatch_url',
        'express_delivery_discount', 'status'
    ];
}
