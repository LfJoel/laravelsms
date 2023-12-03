<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Mail;
use Str;

class AuthController extends Controller
{
    public function login()
    {
        
        if (!empty(Auth::check())) {

            if (Auth::user()->user_type == 1) {
                return redirect('admin/dashboard');
            } else if (Auth::user()->user_type == 2) {
                return redirect('teacher/dashboard');
            } else if (Auth::user()->user_type == 3) {
                return redirect('student/dashboard');
            } else if (Auth::user()->user_type == 4) {
                return redirect('parent/dashboard');
            }
        }
        return view('auth.login');
    }

    public function Authlogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {

            if (Auth::user()->user_type == 1) {
                return redirect('admin/dashboard');
            } else if (Auth::user()->user_type == 2) {
                return redirect('teacher/dashboard');
            } else if (Auth::user()->user_type == 3) {
                return redirect('student/dashboard');
            } else if (Auth::user()->user_type == 4) {
                return redirect('parent/dashboard');
            }
        } else {
            return redirect()->back()->with('error', 'Please enter correct email and password');
        }
        
    }
    public function forgotpassword()
    {
        return view('auth.forgot');
    }
    public function postforgotpassword(Request $request)
    {

        $user = User::getEmailsingle($request -> email);
        if(!empty($user)){
            $user -> remember_token = Str::random(30);
            $user ->save();
           
            Mail::to($user -> email )->send(new ForgotPasswordMail($user));
          
            return redirect()->back()->with('error','Please check your email and reset your password');

        }
        else{
            return redirect()->back()->with('error','Email not found in the system');
        }
        // dd($checkEmailsingle);
        // return view('auth.forgot');
    }

    public function reset($token){
        $user = User::getTokensingle($token);
        if(!empty($user)){
            $data['user'] = $user;
            return view('auth.reset',$data);
        }
        else{
            abort(404);
        }
        // dd($token);
    }
    public function postreset($token, Request $request){
    
        if($request -> password == $request ->cpassword){
            $user = User::getTokensingle($token);
            $user ->password = Hash::make($request->password);
            $user -> remember_token = Str::random(30);
            $user->save();

            return redirect(Url(''))->with('error','password successfully reset.');
        }
else{
    return redirect()->back()->with('error','password and confirm password does not match');
}
    }
    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }
}
