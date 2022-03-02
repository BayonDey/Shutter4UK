<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class IpTrackingadmin extends Model
{
    protected $table = 'ip_trackingadmin';
    public $timestamps = false;

    protected $fillable = [
        'ip', 'url', 'date', 'action', 'UserName'
    ];


    public static function save_ip_trackingadmin()
    {
        $fields['ip'] = request()->ip();
        $fields['url'] = URL::current();
        $fields['date'] = date('Y-m-d H:i:s');
        $fields['action'] = request()->segment(2);
        $fields['UserName'] = Auth::guard('admin')->user()->email;

        IpTrackingadmin::create($fields);
    }
}
