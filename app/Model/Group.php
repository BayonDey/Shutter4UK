<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'v2_group';
    public $timestamps = false;

    protected $fillable = [
        'group_title', 'group_admin_name', 'pre_price', 'group_type',
        'popup_url', 'group_edi_field', 'pop_image', 'description', 'enableordisable',
        'deleted', 'UploadedPDF_File', 'textforpdf', 'choice_xml', 'optionname_xml', 'group_isatlas'
    ];

    protected $attributes = [
        'group_title' => '',
        'group_admin_name' => '',
        'pre_price' => '0',
        'group_type' => 'Options',
        'popup_url' => '',
        'group_edi_field' => '',
        'pop_image' => '',
        'description' => '',
        'enableordisable' => 0,
        'deleted' => 0,
        'UploadedPDF_File' => '',
        'textforpdf' => '',
        'choice_xml' => '',
        'optionname_xml' => '',
        'group_isatlas' => 0,
    ];

    public function groupOptios()
    {
        return $this->hasMany(Option::class, 'group_id', 'group_id');
    }
}
