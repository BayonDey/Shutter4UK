<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DepartmentSlider extends Model
{
    protected $table = 'dep_slider_images';
    public $timestamps = false;

    protected $fillable = [
        'department_id', 'image'
    ];

    public function getDepartment()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }
}
