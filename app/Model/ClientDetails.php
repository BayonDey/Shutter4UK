<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ClientDetails extends Model
{
    protected $table = 'client_details';
    public $timestamps = false;

    protected $fillable = [
        'acc_no', 'department_id', 'registration_date', 'update_date', 'c_title', 'c_firstname',
        'c_lastname', 'c_company', 'c_address1', 'c_address2', 'c_city', 'c_county',
        'c_postcode', 'c_country', 'c_contact_no', 'c_email', 'bs_title', 'bs_firstname',
        'bs_lastname', 'bs_company', 'bs_address1', 'bs_address2', 'bs_city', 'bs_county',
        'bs_postcode', 'bs_country', 'bs_contact_no', 'bs_email'
    ];
}
