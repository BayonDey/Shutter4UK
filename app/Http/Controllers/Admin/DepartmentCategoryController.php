<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\DepartmentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DepartmentCategoryController extends Controller
{
    public function category_list()
    {
        $dataList = DepartmentCategory::orderBy('id', 'DESC')->get();
        return view('admin.department.category_list', [
            'dataList' => $dataList,
            'activeTR' => (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0
        ]);
    }

    public function category_create()
    {
        return view('admin.department.category_form', []);
    }

    public function category_edit($id)
    {
        $dataRow = DepartmentCategory::find($id);
        return view('admin.department.category_form', [
            'dataRow' => $dataRow
        ]);
    }

    public function category_store(Request $request)
    {
        $inputs = $request->input();
        // dd($inputs);
        $id = $request->id;

        $validate = $request->validate(
            [
                'category_name' => 'required',
                'category_url' => 'required',
            ]
        );

        $fields['category_name'] = $request->category_name;
        $fields['category_url'] = $request->category_url;
        $fields['category_description'] = ($request->category_description == null) ? '' : $request->category_description;
        $fields['promote_front'] = $request->promote_front;
        $fields['meta_title'] = ($request->meta_title == null) ? '' : $request->meta_title;
        $fields['meta_description'] = ($request->meta_description == null) ? '' : $request->meta_description;

        if ($request->id == null) {
            $fields['created_date'] = date('Y-m-d H:i:s');
            $create = DepartmentCategory::create($fields);
            if ($create) {
                $id = $create->id;
                Session::flash('success', 'Category added successfully');
            }
        } else {
            $id = $request->id;

            $update = DepartmentCategory::where('id', $id)->update($fields);
            if ($update) {
                Session::flash('success', 'Category update successfully');
            }
        }
        return redirect()->route('category_list', ['tr' => $id]);
    }



    public function promote_front_category($id)
    {
        $row = DepartmentCategory::find($id);
        $promote_front = ($row->promote_front == 'Y') ? 'N' : 'Y';
        $update = DepartmentCategory::where('id', $id)->update(['promote_front' => $promote_front]);
        if ($update) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
