<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail; 
use Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    //form
    public function emailForm()
    {
        return view('admin.auth.password.email');
    }

    //email check verify and send link to mail
    public function submitForgetPasswordForm(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email|exists:admins',
            //'email' => 'required|email|exists:institutionalemails',
        ]);
        
        //return substr($request->email, -20);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
        ]);

        Mail::send('admin.auth.password.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have sent you a password reset link!');
    }

    //forgot password link
    public function showResetPasswordForm($token) 
    { 
        return view('admin.auth.password.forgetPasswordLink', compact('token'));
    }

    //update password
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where([
                              'email' => $request->email, 
                              'token' => $request->token
                            ])
                            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        Admin::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect('/admin/login')->with('message', 'Your password has been changed!');
    }

}
