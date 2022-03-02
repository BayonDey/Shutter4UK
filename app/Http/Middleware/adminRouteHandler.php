<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Session;

class adminRouteHandler
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,  $guard=null)
    {
      
     
        $urlArray = explode('/',$request->route()->uri);
       // dd($guard);
        if(isset($urlArray[0]) && $urlArray[0]=='admin')
        {
            if ($guard == "admin" && !Auth::guard($guard)->check())
            {
                // dd('okk');
                // dd($guard,Auth::guard('admin')->check(),session()->all());
                return redirect()->route('login');
            }
            else
            {
                if($guard == "admin" && Auth::guard($guard)->check())
                {
                    if(!isset($urlArray[1]) || (isset($urlArray[1]) && $urlArray[1]==''))
                    {
                        return redirect()->action('Admin/DashboardController@getAdminDashboard');
                    }
                }
            }
        }
        return $next($request);
    }
}
