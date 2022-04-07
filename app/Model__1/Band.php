<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    protected $table = 'v2_band';
    public $timestamps = false;

    protected $fillable = [
        'name', 'product_type_id', 'supplier_id', 'slat_id', 'has_recess', 'has_raise', 'has_tilt', 'deleted', 'xml_format'
    ];

    public function productTypeName()
    {
        return $this->hasOne(ProductType::class, 'id', 'product_type_id');
    }

    public function bandGroups()
    {
        return $this->hasMany(MapBandGroup::class, 'band_id', 'id');
    }
}
