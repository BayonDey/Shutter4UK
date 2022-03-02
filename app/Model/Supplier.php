<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{

    protected $table = 'suppliers';
    protected $primaryKey = 'supplier_id';
    public $timestamps = false;

    protected $fillable = [
         'supplier_name', 'supplier_email', 'address_one', 'address_two',
        'town', 'county', 'postcode', 'country', 'phone', 'account_number', 'class_name',
        'edi_lead_days', 'customer_services_email_default', 'supplier_login_user',
        'supplier_login_password', 'is_delete'
    ];

    
    public function bands()
    {
        return $this->hasMany(Band::class, 'supplier_id', 'supplier_id');
    }
}
