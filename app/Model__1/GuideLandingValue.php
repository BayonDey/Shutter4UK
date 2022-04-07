<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GuideLandingValue extends Model
{
    protected $table = 'guide_landing_values';
    public $timestamps = false;

    protected $fillable = [
        'text_id', 'guide_id', 'value'
    ];

    
    public function guideLandingValue(){
        return $this->hasOne(GuideText::class, 'id', 'text_id');
    }
}
