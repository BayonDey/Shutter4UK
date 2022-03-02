<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'v2_orders';
    public $timestamps = false;

    protected $fillable = [
        'date', 'is_sample_order', 'invoice_number', 'b_title', 'b_firstname', 
        'b_lastname', 'b_company', 'b_address1', 'b_address2', 'b_city', 'b_county', 
        'b_postcode', 'b_country', 'b_telephone', 's_firstname', 's_title', 's_lastname', 
        's_company', 's_address1', 's_address2', 's_city', 's_county', 's_postcode', 
        's_country', 's_telephone', 'status', 'type', 'user_id', 'sale_discount', 
        'promotion_discount', 'delivery_type', 'delivery_price', 'delivery_id', 
        'VAT_percentage', 'total_price', 'hash', 'protx_basket', 'history_pre_order', 
        'history_post_order', 'ua', 'extra_discount', 'delete'
    ];
}
