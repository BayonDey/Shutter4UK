<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'v2_option';
    public $timestamps = false;

    protected $fillable = [
        'group_id', 'option_name', 'image_url', 
        'option_edi_field', 'price_mod', 'price_mod_factor', 
        'sub_group_id', 'disableid', 'Valance_EDI_Field', 
        'AltTagForIMG', 'deleted', 'validatetooptonxml', 'configdefault'
    ];

    
    protected $attributes = [
        'disableid' => 0,  
        'Valance_EDI_Field' => '', 
    ];

    public function getGroup()
    {
        return $this->hasOne(Group::class, 'group_id', 'group_id');
    }

}
