<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TemplateLandingValue extends Model
{
    
    protected $table = 'template_landing_values';

    protected $fillable = [
        'field_id', 'template_id', 'value'
    ];
    public $timestamps = false;
 
    
    public function fieldName()
    {
        return $this->hasOne(ProductFields::class, 'id', 'field_id');
    }
}
