<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Supplierftpdetail extends Model
{
    protected $table = 'supplierftpdetails';
     public $timestamps = false;

    protected $fillable = [
         'HostAddress', 'UserName', 'Password', 'Supplier_Id'
    ];
}
