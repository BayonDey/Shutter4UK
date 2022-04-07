<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductGuide extends Model
{
    protected $table = 'v2_product_guides'; // guides text
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function guideLandingValueMap(){
        return $this->hasMany(GuideLandingValue::class, 'guide_id', 'id');
    }
 
    
}
