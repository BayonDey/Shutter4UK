<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\MapProductTemplateField;

class ProductTemplate extends Model
{
    protected $table = 'v2_product_templates';
    public $timestamps = false;

    protected $fillable = [
        'name', 'status_deleted'
    ];

    public function fildIds()
    {
        return $this->hasMany(MapProductTemplateField::class, 'template_id', 'id');
    }
    public function landingValuefildIds()
    {
        return $this->hasMany(TemplateLandingValue::class, 'template_id', 'id');
    }

}
