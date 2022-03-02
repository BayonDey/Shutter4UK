<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    protected $table = 'v2_filters';
    public $timestamps = false;

    protected $fillable = [
        'product_id', 'width', 'height', 'lt_gt', 'group_id', 'option_id', 'slatwidth_option_id'
    ];

    
    public function getOption()
    {
        return $this->hasOne(Option::class, 'option_id', 'option_id');
    }
    public function getGroup()
    {
        return $this->hasOne(Group::class, 'group_id', 'group_id');
    }
}
