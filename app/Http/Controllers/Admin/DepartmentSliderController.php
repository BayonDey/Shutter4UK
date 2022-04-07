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



    public function pg_slider_list()
    {
        if (isset($_GET['position']) && ($_GET['position'] == 'middle')) {
            $pageName = 'mid_pg_slider_list';
            $dataList = DepartmentSlider::where('slider_position', 'middle')->get();
        } else {
            $pageName = 'pg_slider_list';
            $dataList = DepartmentSlider::where('slider_position', 'top')->get();
        }
        return view(
            "admin.slider.$pageName",
            [
                'dataList' => $dataList,
                'activeTR' => (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0

            ]
        );
    }

    public function pg_slider_create()
    {
        if (isset($_GET['position']) && ($_GET['position'] == 'middle')) {
            $pageName = 'mid_pg_slider_form';
        } else {
            $pageName = 'pg_slider_form';
        }
        $depList = Department::get();
        return view("admin.slider.$pageName", ['depList' => $depList]);
    }

    public function pg_slider_edit($id)
    {
        if (isset($_GET['position']) && ($_GET['position'] == 'middle')) {
            $pageName = 'mid_pg_slider_form';
        } else {
            $pageName = 'pg_slider_form';
        }
        $dataRow = DepartmentSlider::find($id);
        $depList = Department::get();
        return view(
            "admin.slider.$pageName",
            ['dataRow' => $dataRow, 'depList' => $depList]
        );
    }

    public function pg_slider_store(Request $request)
    {
        $inputs = $request->input();

        $id = $request->id;
        if ($request->slider_type == 'img') {
            $validate = $request->validate(
                [
                    'department_id' => 'required',
                ]
            );
        } else {
            $validate = $request->validate(
                [
                    'slider_title' => 'required',
                    'slider_sub_title' => 'required',
                    'department_id' => 'required',
                ]
            );
        }

        if ($request->hasFile('slider_img')) {
            $inputs['slider_img'] = Utility::saveImage($request->file('slider_img'), 'page_slider', 'slider_img');
        }

        if ($id == null) {
            $create = DepartmentSlider::create($inputs);
            if ($create) {
                Session::flash('success', 'Slider added successfully');
            }
        } else {
            $rowData = DepartmentSlider::find($id);
            unset($inputs['_token']);
            $old_slider_img = $rowData->slider_img;

            $update = DepartmentSlider::where('id', $id)->update($inputs);
            if ($update) {
                if (($old_slider_img != '') && ($request->hasFile('slider_img'))) {
                    Utility::unlinkFile($old_slider_img, 'page_slider');
                }
                Session::flash('success', 'Slider update successfully');
            }
        }
        return redirect()->route('pg_slider_list', ['tr' => $id]);
    }


    public function middle_pg_slider_store(Request $request)
    {
        $inputs = $request->input();

        $id = $request->id;
        if ($request->slider_type == 'img') {
        } else {
            $validate = $request->validate(
                [
                    'slider_title' => 'required',
                    'slider_sub_title' => 'required',
                ]
            );
        }

        if ($request->hasFile('slider_img')) {
            $inputs['slider_img'] = Utility::saveImage($request->file('slider_img'), 'page_slider', 'slider_img');
        }
        $inputs['slider_position'] = 'middle';
        if ($id == null) {
            $create = DepartmentSlider::create($inputs);
            if ($create) {
                Session::flash('success', 'Slider added successfully');
            }
        } else {
            $rowData = DepartmentSlider::find($id);
            unset($inputs['_token']);
            $old_slider_img = $rowData->slider_img;

            $update = DepartmentSlider::where('id', $id)->update($inputs);
            if ($update) {
                if (($old_slider_img != '') && ($request->hasFile('slider_img'))) {
                    Utility::unlinkFile($old_slider_img, 'page_slider');
                }
                Session::flash('success', 'Slider update successfully');
            }
        }
        return redirect()->route('pg_slider_list', ['tr' => $id, 'position' => 'middle']);
    }

    public function pg_slider_delete($id)
    {
        $rowData = DepartmentSlider::find($id);
        $old_slider_img = $rowData->slider_img;
        $delete = DepartmentSlider::find($id)->delete();
        if ($delete) {
            if ($old_slider_img != '') {
                Utility::unlinkFile($old_slider_img, 'page_slider');
            }
        }
        if (isset($_GET['position']) && ($_GET['position'] == 'middle')) {
            return redirect()->route('pg_slider_list', ['position' => 'middle']);
        } else {
            return redirect()->route('pg_slider_list');
        }
    }

    public function pg_slider_change_status($id)
    {
        $rowData = DepartmentSlider::find($id);
        $new_status = ($rowData->status == '1') ? '0' : '1';
        $update = DepartmentSlider::where('id', $id)->update(['status' => $new_status]);
        if ($update) {
            Session::flash('success', 'Status update successfully');
        }
        if (isset($_GET['position']) && ($_GET['position'] == 'middle')) {
            return redirect()->route('pg_slider_list', ['tr' => $id, 'position' => 'middle']);
        } else {
            return redirect()->route('pg_slider_list', ['tr' => $id]);
        }
    }

    

    public function slider_show_in_main_home($id)
    {
        $row = DepartmentSlider::find($id);
        $show_in_main_home = ($row->show_in_main_home == 'Y') ? 'N' : 'Y';
        $update = DepartmentSlider::where('id', $id)->update(['show_in_main_home' => $show_in_main_home]);
        if ($update) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
