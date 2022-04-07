<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\GuideText;

class ProductLinks extends Model
{
    protected $table = 'v2_product_links';
    public $timestamps = false;

    protected $fillable = [
        'product_id', 'text_id', 'guide_id', 'flag'
    ];

    public function guideText()
    {
        return $this->hasOne(GuideText::class, 'id', 'text_id');
    }
}
