<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Model\Section;
use App\Model\UserPermission;
use App\User;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Session;

class UserPermissionController extends Controller
{

    public function menuList()
    {
        $menuList = Section::orderBy('id', 'DESC')->get();
        $la_menu = [];
        $la_subMenu = [];
        foreach ($menuList as $key => $menu) {
            if ($menu->parent_id == 0) {
                $la_menu[$menu->id] = $menu;
            } else {
                $la_subMenu[$menu->parent_id][] = $menu;
            }
        }
        // dd($la_subMenu);

        // dd(Auth::guard('admin')->user());
        // dd($la_subMenu[3]);
        return view('admin.user_permission.menu_list', ['menuList' => $la_menu, 'subMenus' => $la_subMenu]);
    }

    public function createMenu()
    {
        $parentMenus = Section::where('parent_id', 0)->get();

        return view('admin.user_permission.menu_form', ['parentMenus' => $parentMenus]);
    }

    public function storeMenu(Request $request)
    {
        $inputs = $request->input();

        $validate = $request->validate([
            'sections' => 'required|unique:section_users',
            'section_key' => 'required|unique:section_users',
            'url' => 'required|unique:section_users',
            'icon_class' => 'required',
        ]);

        if ($request->id == null) {
            $create = Section::create($inputs);
            if ($create) {
                Session::flash('success', 'Menu create successfully');
            }
        }
        return redirect()->route('menu_list');
    }


    public function updateAllMenus(Request $request)
    {
        $inputs = $request->input();

        $updateCount = 0;
        if (isset($request->icon_class)) {
            foreach ($request->icon_class as $keyId => $icon) {
                $update = Section::where('id', $keyId)->update(['icon_class' => $icon, 'sections' => $request->sections[$keyId]]);
                if ($update) {
                    $updateCount++;
                }
            }
        }

        if ($updateCount > 0) {
            Session::flash('success', $updateCount . ' row updated successfully!');
        } else {
            Session::flash('error', 'No data effected!');
        }
        return redirect()->route('menu_list');
    }


    public function userPermission($userId)
    {
        if (Auth::guard('admin')->user()->type == 1) {
            $users = User::whereIn('type', [2])->where('is_deleted', 0)->get();

            $menuList = Section::orderBy('id')->get();
            $la_menu = [];
            $la_subMenu = [];
            foreach ($menuList as $key => $menu) {
                if ($menu->parent_id == 0) {
                    $la_menu[$menu->id] = $menu;
                } else {
                    $la_subMenu[$menu->parent_id][] = $menu;
                }
            }

            $userPermission = UserPermission::where('user_id', $userId)->get();
            $la_userPermission = [];
            if (count($userPermission) > 0) {
                foreach ($userPermission as $uPer) {
                    $la_userPermission[$uPer->section_id] = $uPer;
                }
            }


            return view('admin.user_permission.permission', [
                'userId' => $userId,
                'users' => $users,
                'la_menu' => $la_menu,
                'la_subMenu' => $la_subMenu,
                'la_userPermission' => $la_userPermission,
            ]);
        } else {
            Session::flash('error', 'Access deny! This section only for Super Admin.');
            return redirect()->route('admin_users');
        }
    }

    public function updateUserPermission(Request $request)
    {
        if (Auth::guard('admin')->user()->type == 1) {

            $inputs = $request->input();
            // dd($inputs);
            $check1 = UserPermission::where('user_id', $request->user_id)->count();
            if ($check1 > 0) {
                UserPermission::where('user_id', $request->user_id)->update(['action_add' =>  0, 'action_edit' =>  0, 'action_delete' => 0]);
            }
            if (isset($request->permission_parent) && (count($request->permission_parent) > 0)) {
                foreach ($request->permission_parent as $section_id => $permission) {
                    $check = UserPermission::where('user_id', $request->user_id)->where('section_id', $section_id)->count();
                    if ($check == 0) {
                        UserPermission::create([
                            'section_id' => $section_id,
                            'user_id' => $request->user_id,
                            'action_add' => 1,
                            'action_edit' => 1,
                            'action_delete' => 1,
                        ]);
                    } else {
                        UserPermission::where('user_id', $request->user_id)->where('section_id', $section_id)->update([
                            'action_add' => 1,
                            'action_edit' => 1,
                            'action_delete' => 1,
                        ]);
                    }
                }
            }
            if (isset($request->permission) && (count($request->permission) > 0)) {
                foreach ($request->permission as $section_id => $permission) {
                    $check = UserPermission::where('user_id', $request->user_id)->where('section_id', $section_id)->count();
                    if ($check == 0) {
                        UserPermission::create([
                            'section_id' => $section_id,
                            'user_id' => $request->user_id,
                            'action_add' => (isset($permission['action_add'])) ? 1 : 0,
                            'action_edit' => (isset($permission['action_edit'])) ? 1 : 0,
                            'action_delete' => (isset($permission['action_delete'])) ? 1 : 0,
                        ]);
                    } else {
                        UserPermission::where('user_id', $request->user_id)->where('section_id', $section_id)->update([
                            'action_add' => (isset($permission['action_add'])) ? 1 : 0,
                            'action_edit' => (isset($permission['action_edit'])) ? 1 : 0,
                            'action_delete' => (isset($permission['action_delete'])) ? 1 : 0,
                        ]);
                    }
                }
                Session::flash('success', 'Updated successfully!');
            }
            return redirect()->route('user_permission', $request->user_id);
        } else {
            Session::flash('error', 'Access deny! This section only for Super Admin.');
            return redirect()->route('admin_users');
        }
    }
}
