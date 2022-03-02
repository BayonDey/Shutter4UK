<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AppointTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AppointTimeController extends Controller
{
    public function appointment_time()
    {
        $appointTime = AppointTime::get();
        return view('admin.appoint_time.appoint_time_list', [
            'appointTime' => $appointTime,
            'activeTR' => (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0

        ]);
    }

    public function appointment_time_create()
    {
        return view('admin.appoint_time.appoint_time_form', []);
    }

    public function appointment_time_edit($id)
    {
        $appointTime = AppointTime::find($id);
        return view('admin.appoint_time.appoint_time_form', ['appointTime' => $appointTime]);
    }

    public function appointment_time_store(Request $request)
    {
        $inputs = $request->input();
        $id = $request->id;

        $validate = $request->validate(
            [
                'name' => 'required',
            ]
        );

        $fields['name'] = $request->name;

        if ($request->id == null) {
            $fields['show_front'] = 'Y';
            $create = AppointTime::create($fields);
            if ($create) {
                $id = $create->id;
                Session::flash('success', 'Appointment time added successfully');
            }
        } else {
            $id = $request->id;

            $update = AppointTime::where('id', $id)->update($fields);
            if ($update) {
                Session::flash('success', 'Appointment time update successfully');
            }
        }
        return redirect()->route('appointment_time', ['tr' => $id]);
    }


    public function appoint_time_show_front($id)
    {
        $appointTime = AppointTime::find($id);
        $show_front = ($appointTime->show_front == 'Y') ? 'N' : 'Y';
        $update = AppointTime::where('id', $id)->update(['show_front' => $show_front]);
        if ($update) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
