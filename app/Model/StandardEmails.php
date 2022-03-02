<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StandardEmails extends Model
{
    protected $table = 'standard_emails';
    public $timestamps = false;

    protected $fillable = [
        'template_name', 'email_content', 'fileupload'
    ];
}
