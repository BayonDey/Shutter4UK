<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Department;
use App\Model\DepartmentSlider;
use App\Utility;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class DepartmentSliderController extends Controller
{
    public function slider_list()
    {
        $dataList = DepartmentSlider::orderBy('department_id')->get();
        return view('admin.slider.slider_list', [
            'dataList' => $dataList,
            'activeTR' => (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0
        ]);
    }

    public function slider_create()
    {
        $depList = Department::get();
        return view('admin.slider.slider_form', [
            'depList' => $depList
        ]);
    }

    public function slider_edit($id)
    {
        $dataRow = DepartmentSlider::find($id);
        $depList = Department::get();
        return view('admin.slider.slider_form', [
            'dataRow' => $dataRow,
            'depList' => $depList,
        ]);
    }

    public function slider_store(Request $request)
    {
        $inputs = $request->input();
        $id = $request->id;

        $validate = $request->validate(
            [
                'department_id' => 'required',
            ]
        );
        if ($request->hasFile('image')) {
            $fields['image'] = Utility::saveImage($request->file('image'), 'dep_slider_images', 'image');
        }
        $fields['department_id'] = $request->department_id;
        if ($request->id == null) {
            $create = DepartmentSlider::create($fields);
            if ($create) {
                $id = $create->id;
                Session::flash('success', 'Slider added successfully');
            }
        } else {
            $id = $request->id;
            $dataRow = DepartmentSlider::find($id);
            $update = DepartmentSlider::where('id', $id)->update($fields);
            if ($update) {
                if (($dataRow->image != '') && ($request->hasFile('image'))) {
                    Utility::unlinkFile($dataRow->image, 'dep_slider_images');
                }
                Session::flash('success', 'Slider update successfully');
            }
        }
        return redirect()->route('slider_list', ['tr' => $id]);
    }



    public function slider_delete($id)
    {
        $dataRow = DepartmentSlider::find($id);
        $delete = DepartmentSlider::where('id', $id)->delete();
        if ($delete) {
            if ($dataRow->image != '') {
                Utility::unlinkFile($dataRow->image, 'dep_slider_images');
            }
            Session::flash('success', 'Delete successfully');
        } else {
            Session::flash('error', 'Something wrong');
        }
        return redirect()->route('slider_list');
    }
}
