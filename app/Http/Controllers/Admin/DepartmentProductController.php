<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Department;
use App\Model\DepartmentCategory;
use App\Model\DepartmentProduct;
use App\Model\DepartmentProductMap;
use App\Model\Product;
use App\Model\ProductImgMap;
use App\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DepartmentProductController extends Controller
{
    public function product_list()
    {
        DB::statement("SET SQL_MODE=''");
        $dataList = DB::table('department_product as p')
            ->leftjoin('department_category as c', 'c.id', '=', 'p.product_cat_id')
            ->leftjoin('department_product_map as dpm', 'dpm.product_id', '=', 'p.id')
            ->leftjoin('departments as d', 'd.id', '=', 'dpm.department_id')
            ->select('p.*',  'c.category_name', DB::raw('group_concat(d.name) as dep_names'))
            ->where('p.status', '1')->groupBy('p.id')->get();
        // dd($dataList);
        return view('admin.department.product_list', [
            'dataList' => $dataList,
            'activeTR' => (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0
        ]);
    }


    public function product_create()
    {
        $depCatList = DepartmentCategory::orderBy('category_name')->get();
        $depList = Department::orderBy('name')->get();
        return view('admin.department.product_form', [
            'depCatList' => $depCatList, 'depList' => $depList,
            'selectedDepIds' => [],
            'imgMap' => [],
        ]);
    }

    public function product_edit($id)
    {
        $dataRow = DepartmentProduct::find($id);
        $depCatList = DepartmentCategory::orderBy('category_name')->get();
        $depList = Department::orderBy('name')->get();
        $selectedDep = DepartmentProductMap::where('product_id', $id)->where('status', '1')->get();
        $imgMap = ProductImgMap::where('product_id', $id)->where('status', '1')->get();

        $selectedDepIds = [];
        if (count($selectedDep) > 0) {
            foreach ($selectedDep as $row) {
                $selectedDepIds[] = $row->department_id;
            }
        }
        // dd($selectedDepIds);
        return view('admin.department.product_form', [
            'dataRow' => $dataRow,
            'depCatList' => $depCatList,
            'selectedDepIds' => $selectedDepIds,
            'depList' => $depList,
            'imgMap' => $imgMap,
        ]);
    }

    public function product_store(Request $request)
    {
        $inputs = $request->input();
        // dd($inputs);
        $id = $request->id;

        $validate = $request->validate(
            [
                'product_title' => 'required',
                'product_cat_id' => 'required',
            ]
        );

        $fields['product_cat_id'] = $request->product_cat_id;
        $fields['product_title'] = $request->product_title;
        $fields['product_st_desc'] =  ($request->product_st_desc == null) ? '' : $request->product_st_desc;
        $fields['product_desc'] =  ($request->product_desc == null) ? '' : $request->product_desc;
        $fields['meta_title'] =  ($request->meta_title == null) ? '' : $request->meta_title;
        $fields['meta_description'] =  ($request->meta_description == null) ? '' : $request->meta_description;
        if ($request->hasFile('product_main_img')) {
            $fields['product_main_img'] = Utility::saveImage($request->file('product_main_img'), 'department_product', 'product_main_img');
        }
        $department_ids = ($request->department_ids == null) ? [] : $request->department_ids;
        $pImgs = $selectedMapImgs = [];
        if ($request->hasFile('pImg')) {
            $pImgs = $request->file('pImg');
        }
        if ($request->hasFile('selectedMapImg')) {
            $selectedMapImgs = $request->file('selectedMapImg');
        }
        // dd($pImgs);
        if ($request->id == null) {
            $create = DepartmentProduct::create($fields);
            if ($create) {
                $id = $create->id;
                if (count($department_ids) > 0) {
                    foreach ($department_ids as $depId) {
                        DepartmentProductMap::create(['department_id' => $depId, 'product_id' => $id, 'status' => 1]);
                    }
                }

                if (count($pImgs) > 0) {
                    foreach ($pImgs as $key => $img) {
                        $tempFilds['product_id'] = $id;

                        if (isset($img)) {
                            $tempFilds['image_name'] = Utility::saveImage($img, 'department_product', 'image_name');
                        }
                        ProductImgMap::create($tempFilds);
                    }
                }
                Session::flash('success', 'Product added successfully');
            }
        } else {
            $id = $request->id;
            $pro = DepartmentProduct::find($id);
            $old_img_name = $pro->product_main_img;

            $update = DepartmentProduct::where('id', $id)->update($fields);

            DepartmentProductMap::where('product_id', $id)->update(['status' => '0']);
            if (count($department_ids) > 0) {
                foreach ($department_ids as $depId) {
                    $check = DepartmentProductMap::where('department_id', $depId)->where('product_id', $id)->first();
                    if (empty($check)) {
                        DepartmentProductMap::create(['department_id' => $depId, 'product_id' => $id, 'status' => '1']);
                    } else {
                        DepartmentProductMap::where('department_id', $depId)->where('product_id', $id)->update(['status' => '1']);
                    }
                }
            }
            if (count($pImgs) > 0) {
                foreach ($pImgs as $key => $img) {
                    $tempFilds['product_id'] = $id;

                    if (isset($img)) {
                        $tempFilds['image_name'] = Utility::saveImage($img, 'department_product', 'image_name');
                    }
                    ProductImgMap::create($tempFilds);
                }
            }

            if (count($selectedMapImgs) > 0) {
                foreach ($selectedMapImgs as $key => $img) {
                    if (isset($img)) {
                        $tempFilds['image_name'] = Utility::saveImage($img, 'department_product', 'image_name');
                    }
                    ProductImgMap::where('product_id', $id)->where('id', $key)->update($tempFilds);
                }
            }

            if ($update) {
                if (($old_img_name != '') && ($request->hasFile('product_main_img'))) {
                    Utility::unlinkFile($old_img_name, 'department_product');
                }
                Session::flash('success', 'Product update successfully');
            }
        }
        return redirect()->route('product_list', ['tr' => $id]);
    }

    public function dep_product_img_del($id)
    {
        $row = ProductImgMap::find($id);
        $product_id = $row->product_id;
        $old_img_name = $row->image_name;
        $delete = ProductImgMap::where('id', $id)->delete();
        if ($delete) {
            Utility::unlinkFile($old_img_name, 'department_product');
            Session::flash('success', 'Image delete successfully');
        } else {
            Session::flash('success', 'Somthing wrong');
        }
        return redirect()->route('product_edit', ['id' => $product_id]);
    }

    public function promote_front_product($id)
    {
        $row = DepartmentProduct::find($id);
        $promote_front = ($row->promote_front == 'Y') ? 'N' : 'Y';
        $update = DepartmentProduct::where('id', $id)->update(['promote_front' => $promote_front]);
        if ($update) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
