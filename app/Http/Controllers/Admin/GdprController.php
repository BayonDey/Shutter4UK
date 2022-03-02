<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Model\UserPermission;

class GdprController extends Controller
{
    public function gdprUserList()
    {
        if (UserPermission::checkPermission('gdpr_user_list') > 0) {
            $users = User::select('id', 'b_firstname', 'b_lastname', 'email', 'gdpr_sent_email_status')
                ->where('type', 3)->where('is_deleted', 0)->orderBy('id', 'DESC')->paginate(500);
            // dd($users->links());
            return view('admin.admin_manage.gdpr_user_list', [
                'users' => $users,
                'activeTR' => (isset($_GET['tr']) && ($_GET['tr'] > 0)) ? $_GET['tr'] : 0,
                'page' => (isset($_GET['page']) && ($_GET['page'] > 0)) ? $_GET['page'] : 1,
            ]);
        } else {
            Session::flash('error', 'Access deny! Please contact with Super Admin.');
            return redirect()->route('dashboard');
        }
    }

    public function gdpr_user_status_update($id, $status)
    {
        $update = User::where('id', $id)->update(['gdpr_sent_email_status' => $status]);
        if ($update) {
            Session::flash('success', "GDPR status update successfully");
        }
        return redirect()->route('gdpr_user_list', ['tr' => $id, 'page' => $_GET['page']]);
    }
}
