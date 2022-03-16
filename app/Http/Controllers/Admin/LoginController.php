<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
// use Illuminate\Contracts\Session\Session;
use  Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function login(Request  $request)
    {
        // dd('uk');
        return view('admin.login');
    }


    public function postLogin(Request  $request)
    {

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];

        // dd($credentials);

        if (Auth::guard('admin')->attempt($credentials)) {
            Session::flash('success', "Hello " . $request->get('email') . ", Welcome to Blinds4UK!");
            return redirect()->action('Admin\DashboardController@getAdminDashboard');
        } else {
            return back()->withInput($request->only('email', 'remember'))
                ->with(['error' => 'Oops! You have entered invalid username or password']);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function forgot_password()
    {
        return view('admin.forgot_password');
    }

    public function forgot_password_submit(Request $request)
    {
        $inputs = $request->input();

        $details = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];

        $rand = rand(10000, 999999);
        $checkUser = User::where('email', $request->email)->whereIn('type', [1, 2])->first();
        if (!empty($checkUser)) {
            User::where('email', $request->email)->update(['password_encode' => $rand]);
            Session::flash('success', "Please check your mail");
        } else {
            Session::flash('error', "Email not found");
        }
        return redirect()->route('forgot_password');
        dd($checkUser);
        // Mail::to('ayondeykalikata@gmail.com')->send()->subject('Mail from ItSolutionStuff.com');
        // Mail::to('ayondeykalikata@gmail.com')
        // ->cc($moreUsers)
        // ->bcc($evenMoreUsers)
        // ->send((object) $details);

        $data = array('name' => "Virat Gandhi");
        // Mail::send('mail', $data, function ($message) {
        //     $message->to('ayondeykalikata@gmail.com', 'Tutorials Point')->subject('Laravel HTML Testing Mail');
        //     $message->from('xyz@gmail.com', 'Virat Gandhi');
        // });
        $to = 'ayondeykalikata@gmail.com';
        $subject = 'Laravel HTML';
        // Mail::send('emails.email', $data, function($message) use ($to, $subject) {
        //     $message->to($to)->subject($subject);
        // });

        Mail::send('mail_template.forgot_password', compact('data'), function ($message) use ($data) {
            $message->from('ayon.dey@brainiuminfotech.com');
            $message->to('ayondeykalikata@gmail.com');
            $message->subject('$subject');
        });
        dd("Email is Sent.");
    }

    public function reset_password($key)
    {
        $checkUser = User::where('password_encode', $key)->first();
        if (!empty($checkUser)) {
            return view('admin.reset_password', ['user' => $checkUser]);
        } else {
            Session::flash('error', "Data not found");
            return redirect()->route('forgot_password');
        }
    }

    public function reset_password_submit(Request $request)
    {
        $inputs = $request->input();
        $id = $request->id;
        $password_encode = $request->password_encode;
        $password = $request->password;
        $password_con = $request->password_con;
        $checkUser = User::where('id', $id)->where('password_encode', $password_encode)->whereIn('type', [1, 2])->first();
        if (!empty($checkUser)) {
            if (($password == $password_con) && ($password != '')) {
                $passwordEn = Hash::make($password);
                User::where('id', $id)->update(['password' => $passwordEn, 'password_encode' => '']);
              
                Session::flash('success', "Password update successfully. Please login!");
                return redirect()->route('login');
            } else {
                Session::flash('error', "Please enter valid password!");
                return redirect()->route('reset_password', $password_encode);
            }
        } else {
            Session::flash('error', "Key has been expired. Try again!");
            return redirect()->route('forgot_password');
        }
    }
}
