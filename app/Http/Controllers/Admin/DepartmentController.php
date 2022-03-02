<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Appointment;
use App\Model\ClientDetails;
use App\Model\Contactus;
use App\Model\Department;
use App\Model\DepartmentCategory;
use App\Model\DepartmentCategoryMap;
use App\Model\Postcode;
use App\Model\Quote;
use App\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DepartmentController extends Controller
{
    public function department_list()
    {
        $departments = Department::get();
        return view('admin.department.department_list', [
            'departments' => $departments,
            'activeTR' => (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0
        ]);
    }

    public function department_create()
    {
        $postcodes = Postcode::orderBy('postcode')->get();
        $depCatList = DepartmentCategory::orderBy('category_name')->get();
        return view('admin.department.department_form', ['postcodes' => $postcodes, 'depCatList' => $depCatList]);
    }

    public function department_edit($id)
    {
        $department = Department::find($id);
        $depCatList = DepartmentCategory::orderBy('category_name')->get();
        $postcodes = Postcode::orderBy('postcode')->get();
        $selectedCat = DepartmentCategoryMap::where('department_id', $id)->where('status', '1')->get();

        $selectedCatIds = [];
        if (count($selectedCat) > 0) {
            foreach ($selectedCat as $row) {
                $selectedCatIds[] = $row->category_id;
            }
        }
        // dd($selectedCatIds);
        return view('admin.department.department_form', [
            'department' => $department,
            'postcodes' => $postcodes,
            'depCatList' => $depCatList,
            'selectedCatIds' => $selectedCatIds,
        ]);
    }

    public function department_store(Request $request)
    {
        $inputs = $request->input();
        // dd($inputs);
        $id = $request->id;

        $validate = $request->validate(
            [
                'name' => 'required',
                'url' => 'required',
            ]
        );

        $fields['name'] = $request->name;
        $fields['url'] = $request->url;
        $fields['postcode_name'] =  ($request->postcode_name == null) ? '' : $request->postcode_name;
        $fields['assign_temp'] =  ($request->assign_temp == null) ? '' : $request->assign_temp;
        $fields['colour_code'] =  ($request->colour_code == null) ? '' : $request->colour_code;
        $fields['logo_caption'] = (isset($request->logo_caption)) ? 'T' : 'F';
        $fields['description'] = ($request->description == null) ? '' : $request->description;
        $fields['meta_title'] =  ($request->meta_title == null) ? '' : $request->meta_title;
        $fields['meta_description'] =  ($request->meta_description == null) ? '' : $request->meta_description;
        $fields['header_caption'] =  ($request->header_caption == null) ? '' : $request->header_caption;
        $fields['header_caption_color'] =  ($request->header_caption_color == null) ? '' : $request->header_caption_color;
        $fields['contact_no'] =  ($request->contact_no == null) ? '' : $request->contact_no;
        $fields['contact_no_color'] =  ($request->contact_no_color == null) ? '' : $request->contact_no_color;
        $fields['contact_email'] =  ($request->contact_email == null) ? '' : $request->contact_email;
        $fields['contact_email_color'] =  ($request->contact_email_color == null) ? '' : $request->contact_email_color;
        $fields['opening_time'] =  ($request->opening_time == null) ? '' : $request->opening_time;
        $fields['opening_time_color'] =  ($request->opening_time_color == null) ? '' : $request->opening_time_color;
        $fields['marquee_text'] =  ($request->marquee_text == null) ? '' : $request->marquee_text;
        $fields['marquee_text_speed'] =  ($request->marquee_text_speed == null) ? '' : $request->marquee_text_speed;
        $fields['marquee_text_color'] =  ($request->marquee_text_color     == null) ? '' : $request->marquee_text_color;
        $fields['header_bg_color'] =  ($request->header_bg_color == null) ? '' : $request->header_bg_color;
        $fields['menu_bg_color'] =  ($request->menu_bg_color == null) ? '' : $request->menu_bg_color;
        $fields['footer_bg_color'] =  ($request->footer_bg_color == null) ? '' : $request->footer_bg_color;

        if ($request->hasFile('logo_image')) {
            $fields['logo_image'] = Utility::saveImage($request->file('logo_image'), 'departments', 'logo_image');
        }
        $cat_map = ($request->cat_map == null) ? [] : $request->cat_map;
        // dd($fields);
        if ($request->id == null) {
            $create = Department::create($fields);
            if ($create) {
                $id = $create->id;
                if (count($cat_map) > 0) {
                    foreach ($cat_map as $catId) {
                        DepartmentCategoryMap::create(['department_id' => $id, 'category_id' => $catId, 'status' => 1]);
                    }
                }
                Session::flash('success', 'Department added successfully');
            }
        } else {
            $id = $request->id;
            $dataRow = Department::find($id);

            $update = Department::where('id', $id)->update($fields);

            DepartmentCategoryMap::where('department_id', $id)->update(['status' => '0']);
            if (count($cat_map) > 0) {
                foreach ($cat_map as $catId) {
                    $check = DepartmentCategoryMap::where('department_id', $id)->where('category_id', $catId)->first();
                    if (empty($check)) {
                        DepartmentCategoryMap::create(['department_id' => $id, 'category_id' => $catId, 'status' => '1']);
                    } else {
                        DepartmentCategoryMap::where('department_id', $id)->where('category_id', $catId)->update(['status' => '1']);
                    }
                }
            }
            if ($update) {

                if (($dataRow->logo_image != '') && ($request->hasFile('logo_image'))) {
                    Utility::unlinkFile($dataRow->logo_image, 'departments');
                }
                Session::flash('success', 'Department update successfully');
            }
        }
        return redirect()->route('department_list', ['tr' => $id]);
    }

    public function department_contact_list($depId)
    {
        $depData = Department::find($depId);
        $dataList = Contactus::where('department_id', $depId)->get();

        return view('admin.department.department_contact_list', [
            'depData' => $depData,
            'dataList' => $dataList,
        ]);
    }

    public function department_appointments_list($depId)
    {
        $depData = Department::find($depId);
        $dataList = Appointment::where('department_id', $depId)->get();

        return view('admin.department.department_appointments_list', [
            'depData' => $depData,
            'dataList' => $dataList,
        ]);
    }

    public function department_quote_list($depId)
    {
        $depData = Department::find($depId);
        $dataList = Quote::where('department_id', $depId)->get();

        return view('admin.department.department_quote_list', [
            'depData' => $depData,
            'dataList' => $dataList,
        ]);
    }

    public function department_products_list($depId)
    {
        $depData = Department::find($depId);
        $dataList = DB::table('department_product as p')
            ->leftjoin('department_category as c', 'c.id', '=', 'p.product_cat_id')
            ->leftjoin('department_product_map as dpm', 'dpm.product_id', '=', 'p.id')
            ->leftjoin('departments as d', 'd.id', '=', 'dpm.department_id')
            ->select('p.*',  'c.category_name', DB::raw('group_concat(d.name) as dep_names'))
            ->where('p.status', '1')->where('dpm.department_id', $depId)->groupBy('p.id')->get();

        return view('admin.department.department_product_list', [
            'depData' => $depData,
            'dataList' => $dataList,
        ]);
    }

    public function department_category_list($depId)
    {
        $depData = Department::find($depId);
        $dataList = DB::table('department_category_map as dcm')
            ->leftjoin('department_category as c', 'c.id', '=', 'dcm.category_id')
            ->select('c.id', 'c.category_name', 'c.promote_front')
            ->where('dcm.department_id', $depId)->groupBy('c.id')->get();

        return view('admin.department.department_category_list', [
            'depData' => $depData,
            'dataList' => $dataList,
        ]);
    }

    public function client_details($depId)
    {
        $department = Department::find($depId);
        $clientData = ClientDetails::where('department_id', $depId)->first();
        return view('admin.department.client_details', [
            'department' => $department,
            'dataRow' => $clientData,
        ]);
    }

    public function client_details_save(Request $request)
    {
        $inputs = $request->input();

        $validate = $request->validate(
            [
                'c_title' => 'required',
                'c_firstname' => 'required',
                'c_lastname' => 'required',
                'c_company' => 'required',
                'c_address1' => 'required',
                'bs_title' => 'required',
                'bs_firstname' => 'required',
                'bs_lastname' => 'required',
                'bs_company' => 'required',
                'bs_address1' => 'required',
                'c_contact_no' => 'required',
                'c_email' => 'required',
                'bs_contact_no' => 'required',
                'bs_email' => 'required',
            ]
        );
        $fields['update_date'] =  date('Y-m-d H:i:s');
        $fields['department_id'] = $request->department_id;
        $fields['c_title'] =  ($request->c_title == null) ? '' : $request->c_title;
        $fields['c_firstname'] =  ($request->c_firstname == null) ? '' : $request->c_firstname;
        $fields['c_lastname'] =  ($request->c_lastname == null) ? '' : $request->c_lastname;
        $fields['c_company'] =  ($request->c_company == null) ? '' : $request->c_company;
        $fields['c_address1'] =  ($request->c_address1 == null) ? '' : $request->c_address1;
        $fields['c_address2'] =  ($request->c_address2 == null) ? '' : $request->c_address2;
        $fields['c_city'] =  ($request->c_city == null) ? '' : $request->c_city;
        $fields['c_county'] =  ($request->c_county == null) ? '' : $request->c_county;
        $fields['c_postcode'] =  ($request->c_postcode == null) ? '' : $request->c_postcode;
        $fields['c_country'] =  ($request->c_country == null) ? '' : $request->c_country;
        $fields['c_contact_no'] =  ($request->c_contact_no == null) ? '' : $request->c_contact_no;
        $fields['c_email'] =  ($request->c_email == null) ? '' : $request->c_email;
        $fields['bs_title'] =  ($request->bs_title == null) ? '' : $request->bs_title;
        $fields['bs_firstname'] =  ($request->bs_firstname == null) ? '' : $request->bs_firstname;
        $fields['bs_lastname'] =  ($request->bs_lastname == null) ? '' : $request->bs_lastname;
        $fields['bs_company'] =  ($request->bs_company == null) ? '' : $request->bs_company;
        $fields['bs_address1'] =  ($request->bs_address1 == null) ? '' : $request->bs_address1;
        $fields['bs_address2'] =  ($request->bs_address2 == null) ? '' : $request->bs_address2;
        $fields['bs_city'] =  ($request->bs_city == null) ? '' : $request->bs_city;
        $fields['bs_county'] =  ($request->bs_county == null) ? '' : $request->bs_county;
        $fields['bs_postcode'] =  ($request->bs_postcode == null) ? '' : $request->bs_postcode;
        $fields['bs_country'] =  ($request->bs_country == null) ? '' : $request->bs_country;
        $fields['bs_contact_no'] =  ($request->bs_contact_no == null) ? '' : $request->bs_contact_no;
        $fields['bs_email'] =  ($request->bs_email == null) ? '' : $request->bs_email;
        // dd($fields);
        if ($request->id == null) {
            $clientData = ClientDetails::orderBy('id', 'DESC')->first();
            if (empty($clientData)) {
                $fields['acc_no'] =  100000;
            } else {
                $fields['acc_no'] =  $clientData->acc_no + 1;
            }
            $fields['registration_date'] =  date('Y-m-d H:i:s');
            $create = ClientDetails::create($fields);
            if ($create) {
                $id = $create->id;
                Session::flash('success', 'Client added successfully');
            }
        } else {
            $id = $request->id;
            $update = ClientDetails::where('id', $id)->update($fields);

            if ($update) {
                Session::flash('success', 'Client update successfully');
            }
        }
        return redirect()->route('client_details', $request->department_id);
    }
}
