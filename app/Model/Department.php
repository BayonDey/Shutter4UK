<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    public $timestamps = false;

    protected $fillable = [
        'name', 'url', 'description', 'postcode_name', 'postcode_value',
        'meta_title', 'meta_description', 'assign_temp', 'logo_caption', 'colour_code',
        'logo_image', 'header_caption', 'header_caption_color', 'contact_no', 'contact_no_color',
        'contact_email', 'contact_email_color', 'opening_time', 'opening_time_color',
        'marquee_text', 'marquee_text_speed', 'marquee_text_color', 'header_bg_color', 'menu_bg_color', 'footer_bg_color',
        'header_caption_2', 'header_caption_2_color', 'header_caption_3', 'header_caption_3_color', 'header_3_desc'
    ];
    protected $attributes = [
        'name' => '',
        'url' => '',
        'description' => '',
        'postcode_name' => '',
        'postcode_value' => '',
        'meta_title' => '',
        'meta_description' => '',
        'assign_temp' => '',
        'logo_caption' => 0,
        'colour_code' => '',
        'logo_image' => '',
        'header_caption' => '',
        'header_caption_color' => '',
        'contact_no' => '',
        'contact_no_color' => '',
        'contact_email' => '',
        'contact_email_color' => '',
        'opening_time' => '',
        'opening_time_color' => '',
        'marquee_text' => '',
        'marquee_text_speed' => '',
        'marquee_text_color' => '',
        'header_bg_color' => '',
        'menu_bg_color' => '',
        'footer_bg_color' => '',
        'header_caption_2' => '',
        'header_caption_2_color' => '',
        'header_caption_3' => '',
        'header_caption_3_color' => '',
        'header_3_desc' => '',
    ];
}
