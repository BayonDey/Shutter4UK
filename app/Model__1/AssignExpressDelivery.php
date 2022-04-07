<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AssignExpressDelivery extends Model
{
    protected $table = 'assign_express_delivery';
    public $timestamps = false;

    protected $fillable = [
        'product_type_id', 'parent_id', 'supplier_id'
    ];
}
