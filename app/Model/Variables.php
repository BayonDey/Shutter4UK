<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Variables extends Model
{
    protected $table = 'variables';
    public $timestamps = false;

    protected $fillable = [
        'name', 'value'
    ];

    public static function getVariables($names = [])
    {
        $thumb_sale_img = Variables::whereIn('name', $names)->get();
        $return = [];
        if (count($thumb_sale_img) > 0) {
            foreach ($thumb_sale_img as $row) {
                $return[$row->name] = $row;
            }
        }
        return $return;
    }
}
