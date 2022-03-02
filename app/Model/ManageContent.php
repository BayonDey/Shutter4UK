<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ManageContent extends Model
{
    protected $table = 'manage_content';
    public $timestamps = false;

    protected $fillable = [
        'content_type', 'content_key', 'content_title', 'content_sub_title',
        'content_desc', 'content_img', 'content_img_alt', 'content_url'
    ];

    protected $attributes = [
        'content_type' => '',
        'content_key' => '',
        'content_title' => '',
        'content_sub_title' => '',
        'content_desc' => '',
        'content_img' => '',
        'content_img_alt' => '',
        'content_url' => '',
    ];

    public static function get_content_data($content_key = [])
    {
        $contentDetails = ManageContent::whereIn('content_key', $content_key)->get();
        $return = [];
        if(count($contentDetails) > 0){
            foreach($contentDetails as $row){
                $return[$row->content_key] = $row;
            }
        } 
        return $return;
    }
 
}
