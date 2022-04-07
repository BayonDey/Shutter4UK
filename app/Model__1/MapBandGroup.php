<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MapBandGroup extends Model
{

    protected $table = 'v2_map_band_group';
    public $timestamps = false;

    protected $fillable = [
        'band_id', 'group_id','position'
    ];

    function groupName(){
        return $this->hasOne(Group::class, 'group_id', 'group_id');
    }
}
