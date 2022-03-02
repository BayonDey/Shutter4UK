<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\ManageContent;
use App\Model\UserPermission;
use App\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ManageContentController extends Controller
{
    public function manageContentSettings()
    {
        if (UserPermission::checkPermission('manage_content_text') > 0) {
            $manageContent = ManageContent::orderBy('content_type')->get();
            return view('admin.manage_content.manage_content_list', [
                'manageContent' => $manageContent,
                'activeTR' => (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    public function manageContentEdit($id)
    {
        if (UserPermission::checkPermission('manage_content_text', 'edit') > 0) {
            $manageContent = ManageContent::find($id);
            return view('admin.manage_content.manage_content_form', [
                'manageContent' => $manageContent,
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('manage_content_settings');
        }
    }

    public function manageContentSave(Request $request)
    {
        $inputs = $request->input();
        $id = $request->id;

        $validate = $request->validate(
            [
                'content_title' => 'required',
            ]
        );

        $fields['content_title'] = $request->content_title;
        $fields['content_sub_title'] = ($request->content_sub_title == null) ? '' : $request->content_sub_title;
        $fields['content_desc'] = ($request->content_desc == null) ? '' : $request->content_desc;
        $fields['content_img_alt'] = ($request->content_img_alt == null) ? '' : $request->content_img_alt;
        $fields['content_url'] = ($request->content_url == null) ? '#' : $request->content_url;

        if ($request->hasFile('content_img')) {
            $fields['content_img'] = Utility::saveImage($request->file('content_img'), 'manage_content', 'content_img');
        }

        if ($request->id == null) {
            $create = ManageContent::create($fields);
            if ($create) {
                $id = $create->id;
                Session::flash('success', 'Content added successfully');
            }
        } else {
            $id = $request->id;
            $cat = ManageContent::find($id);
            $old_content_img = $cat->content_img;
            $update = ManageContent::where('id', $id)->update($fields);
            if ($update) {
                if (($old_content_img != '') && ($request->hasFile('content_img'))) {
                    Utility::unlinkFile($old_content_img, 'manage_content');
                }
                Session::flash('success', 'Content update successfully');
            }
        }
        return redirect()->route('manage_content_settings', ['tr' => $id]);
    }
}
