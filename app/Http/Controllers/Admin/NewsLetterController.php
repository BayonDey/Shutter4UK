<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\NewsLetter;
use App\Model\UserPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewsLetterController extends Controller
{
    public function newsLetterList()
    {
        if (UserPermission::checkPermission('news_letter_template') > 0) {
            $newsLetter = NewsLetter::where('status_deleted', 0)->get();
            return view('admin.news_letter.news_letter_list', [
                'newsLetter' => $newsLetter,
                'activeTR' => (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    public function newsLetterCreate()
    {
        if (UserPermission::checkPermission('news_letter_template', 'add') > 0) {

            return view('admin.news_letter.news_letter_form', []);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('news_letter_list');
        }
    }

    public function newsLetterEdit($id)
    {
        if (UserPermission::checkPermission('news_letter_template', 'edit') > 0) {
            $newsLetter = NewsLetter::where('template_id', $id)->first();
            return view('admin.news_letter.news_letter_form', [
                'newsLetter' => $newsLetter,
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('news_letter_list');
        }
    }


    public function newsLetter_store(Request $request)
    {
        $inputs = $request->input();
        $id = $request->id;

        $validate = $request->validate(
            [
                'title' => 'required',
            ]
        );

        $fields['title'] = $request->title;
        $fields['description'] = ($request->description == null) ? '' : $request->description;

        if ($request->id == null) {
            $create = NewsLetter::create($fields);
            if ($create) {
                $id = $create->id;
                Session::flash('success', 'News letter added successfully');
            }
        } else {
            $id = $request->id;
            $update = NewsLetter::where('template_id', $id)->update($fields);
            if ($update) {

                Session::flash('success', 'News letter update successfully');
            }
        }
        return redirect()->route('news_letter_list', ['tr' => $id]);
    }

    public function newsLetterDelete($id)
    {
        if (UserPermission::checkPermission('news_letter_template', 'delete') > 0) {
            $delete = NewsLetter::where('template_id', $id)->update(['status_deleted' => 1]);
            if ($delete) {
                Session::flash('success', 'Deleted successfully');
            }
            return redirect()->route('news_letter_list');
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('news_letter_list');
        }
    }
}
