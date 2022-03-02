<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\ProductTemplate;

class MapProductTemplateField extends Model
{

    protected $table = 'v2_map_product_template_field';
    public $timestamps = false;

    protected $fillable = [
        'template_id', 'field_id'
    ];

    
    public function fieldName()
    {
        return $this->hasOne(ProductFields::class, 'id', 'field_id');
    }
}
