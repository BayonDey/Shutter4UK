<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Facades\Session;

class UserPermission extends Model
{
    protected $table = 'user_permissions';
    public $timestamps = false;

    protected $fillable = [
        'section_id', 'user_id', 'action_add', 'action_edit', 'action_delete'
    ];

    public static function checkPermission($section_key, $action_flag = '')
    {
        $user = Auth::guard('admin')->user();
        if ($user->type == 1) {
            return 1;
        }
        $return = 0;
        // $Section = Section::where('section_key', $section_key)->first();
        // if (!empty($Section)) {
        //     $data = UserPermission::where('section_id', $Section->id)->where('user_id', $user->id)->first();
        //     if (!empty($data)) {
        //         if ($action_flag == 'add') {
        //             $return = $data->action_add;
        //         } elseif ($action_flag == 'edit') {
        //             $return = $data->action_edit;
        //         } elseif ($action_flag == 'delete') {
        //             $return =  $data->action_delete;
        //         } else {
        //             $return = $data->action_add + $data->action_edit + $data->action_delete;
        //         }
        //     }
        // }
        // dd($return);
        return 1;
    }

    // public static function checkPermissionFalse()
    // {
    //     Session::flash('error', 'Access deny! Please contact with Super Admin.');
    //     return redirect()->route('dashboard');
    // }
}
