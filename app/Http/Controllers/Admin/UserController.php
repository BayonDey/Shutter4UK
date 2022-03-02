<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Utility;
use App\Model\UserPermission;

class UserController extends Controller
{
    public function getAdminUsers()
    {
        if (UserPermission::checkPermission('admin_users') > 0) {
            $users = User::whereIn('type', [1, 2])->where('is_deleted', 0)->get();

            $activeTR = (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0;

            return view('admin.user.user_list_admin', ['users' => $users, 'activeTR' => $activeTR]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }


    public function getFrontendUsers()
    {
        if (UserPermission::checkPermission('frontend_users') > 0) {
            $users = User::where('type', 3)->where('is_deleted', 0)->get();
            return view('admin.user.user_list_frontend', ['users' => $users]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    public function getPopupUsers()
    {
        if (UserPermission::checkPermission('popup_users') > 0) {
            $users = [];
            return view('admin.user.user_list_popup', ['users' => $users]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    public function getUserDetails($id)
    {
        $userData = User::where('id', $id)->where('is_deleted', 0)->first();

        return view('admin.user.user_details', ['userData' => $userData]);
    }

    public function editUser($id)
    {
        if (UserPermission::checkPermission('frontend_users', 'edit') > 0) {
            $userData = User::where('type', 3)->where('id', $id)->where('is_deleted', 0)->first();
            if (empty($userData)) {
                Session::flash('error', 'User not found');
                return redirect()->route('frontend_users');
            }
            return view('admin.user.user_edit', ['userData' => $userData]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('frontend_users');
        }
    }

    public function updateUser($id, Request $request)
    {
        $validate = $request->validate([
            'b_title' => 'required',
            'b_firstname' => 'required',
            'b_lastname' => 'required',
            'b_company' => 'required',
            'b_address1' => 'required',
            'b_city' => 'required',
            'b_county' => 'required',
            'b_postcode' => 'required',
            'b_country' => 'required',
            'b_telephone' => 'required',
            's_title' => 'required',
            's_firstname' => 'required',
            's_lastname' => 'required',
            's_company' => 'required',
            's_address1' => 'required',
            's_city' => 'required',
            's_county' => 'required',
            's_postcode' => 'required',
            's_country' => 'required',
            's_telephone' => 'required',
        ]);

        if ($validate) {
            $input = $request->all();
            // dd($input);
            $userData = User::find($id);
            $userData->is_subscribed = (isset($request->is_subscribed) ? 1 : 0);
            $userData->how_hear = $request->how_hear;
            if ($request->password != '') {
                $userData->password_encode = $request->password;
                $userData->password = Hash::make($request->password);
            }


            $userData->b_title = $request->b_title;
            $userData->b_firstname = $request->b_firstname;
            $userData->b_lastname = $request->b_lastname;
            $userData->b_company = $request->b_company;
            $userData->b_address1 = $request->b_address1;
            $userData->b_address2 = $request->b_address2;
            $userData->b_city = $request->b_city;
            $userData->b_county = $request->b_county;
            $userData->b_postcode = $request->b_postcode;
            $userData->b_country = $request->b_country;
            $userData->b_telephone = $request->b_telephone;
            $userData->s_title = $request->s_title;
            $userData->s_firstname = $request->s_firstname;
            $userData->s_lastname = $request->s_lastname;
            $userData->s_company = $request->s_company;
            $userData->s_address1 = $request->s_address1;
            $userData->s_address2 = $request->s_address2;
            $userData->s_city = $request->s_city;
            $userData->s_county = $request->s_county;
            $userData->s_postcode = $request->s_postcode;
            $userData->s_country = $request->s_country;
            $userData->s_telephone = $request->s_telephone;
            $return = $userData->save();
            // dd($return);

            // Session::flash('flash_message', 'Task successfully added!');

            return redirect()->route('user_details', $id);
        }
        return view('admin.user.user_edit');
    }


    public function changeUserStatus($id)
    {
        if (UserPermission::checkPermission('frontend_users', 'delete') > 0) {
            $user = User::find($id);
            $user->user_status = ($user->user_status == 't') ? 'f' : 't';
            $user->save();

            return redirect()->route('user_details', $id);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('frontend_users');
        }
    }

    public function createAdminUser()
    {
        if (UserPermission::checkPermission('admin_users', 'add') > 0) {
            return view('admin.user.admin_user_form', ['user' => (object) []]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('admin_users');
        }
    }


    public function editAdminUser($id)
    {
        $user = User::whereIn('type', [1, 2])->where('id', $id)->where('is_deleted', 0)->first();
        if (empty($user)) {
            Session::flash('error', 'User not found');
            return redirect()->route('admin_users');
        }
 

        if (UserPermission::checkPermission('admin_users', 'edit') > 0 && (($user->type != 1) || (Auth::guard('admin')->user()->type == 1))) {
            return view('admin.user.admin_user_form', ['user' => $user]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('admin_users');
        }
    }

    public function storeAdminUser(Request $request)
    {
        $inputs = $request->input();

        $fields = [];
        $fields['email'] = $request->email;
        $fields['b_firstname'] = $request->b_firstname;
        $fields['initials'] = ($request->initials == null) ? '' : $request->initials;
        $fields['access_group'] = ($request->access_group == null) ? 'Master' : $request->access_group;
        $fields['access_group'] = 'Master';
        if ($request->password != '') {
            $password = Hash::make($request->password);
            $fields['password'] = $password;
        }
        if ($request->hasFile('image')) {
            $fields['image'] = Utility::saveImage($request->file('image'), 'users', 'image');
        }
        if ($request->id == null) {
            $fields['registration_date'] = date('Y-m-d');
            $fields['type'] = 2;
            // dd($fields);
            $validate = $request->validate(
                [
                    'b_firstname' => 'required',
                    'email' => 'required|email',
                    'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                    'password_confirmation' => 'min:6'
                ],
                [
                    'b_firstname.required' => 'The name field is required.',
                ]
            );
            $create = User::create($fields);
            if ($create) {
                $id = $create->id;
                Session::flash('success', 'User added successfully');
            }
        } else {
            $id = $request->id;
            $user = User::find($id);
            $old_image = $user->image;
            $validate = $request->validate([
                'b_firstname' => 'required',
                'email' => 'required|email',
            ]);
            if (($request->password != '') || ($request->password_confirmation != '')) {
                $validate = $request->validate(
                    [
                        'email' => 'required|email',
                        'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                        'password_confirmation' => 'min:6'
                    ],
                    [
                        'b_firstname.required' => 'The name field is required.',
                    ]
                );
            }
            $update = User::where('id', $id)->update($fields);
            if ($update) {
                if (($old_image != '') && ($request->hasFile('image'))) {
                    Utility::unlinkFile($old_image, 'users');
                }
                Session::flash('success', 'User update successfully');
            }
        }
        return redirect()->route('admin_users', ['tr' => $id]);
    }

    public function viewAdminUser($id)
    {
        $user = User::find($id);
        return view('admin.user.admin_user_view', ['user' => $user]);
    }

    public function deleteAdminUser($id)
    {
        $user = User::find($id);
        if ($user->type != 1 && (Auth::guard('admin')->user()->id != $user->id)) {
            if (UserPermission::checkPermission('admin_users', 'delete') > 0) {
                $delete = User::where('id', $id)->update(['is_deleted' => 1]);
                if ($delete) {
                    Session::flash('success', 'User deleted successfully');
                }
            }
        } else {
            Session::flash('error', 'Access deny! ');
        }
        return redirect()->route('admin_users');
    }
}
