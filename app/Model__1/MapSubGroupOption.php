<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MapSubGroupOption extends Model
{
    protected $table = 'v2_map_sub_group_option';
    public $timestamps = false;

    protected $fillable = [
        'option_id', 'sub_group_id', 'position'
    ];

    function subGroupName(){
        return $this->hasOne(Group::class, 'group_id', 'sub_group_id');
    }
}
