<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DepartmentSlider extends Model
{
    protected $table = 'dep_slider';
    public $timestamps = false;

    protected $fillable = [
        'department_id', 'slider_title', 'slider_sub_title', 'slider_img', 'slider_btn',
        'slider_url', 'text_color', 'text_bg_color', 'start_date', 'end_date',
        'slider_type', 'slider_position', 'img_position', 'status', 'show_in_main_home'
    ];

    public function getDepartment()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }
}
