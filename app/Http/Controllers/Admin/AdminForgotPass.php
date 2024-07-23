<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;    
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\ResetPasswordEmail;
use App\Models\Admin\Admin;
class AdminForgotPass extends Controller
{
    public function showForgotPassForm(){
        return view('admin/sendEmail');
    }

    public function processForgotPass(Request $request){
      $credentials =$request->validate([
        'email' => 'required|email|exists:admins,email'
      ],
    [
        'email.required' => 'Email field is required*',
        'email.email' => 'This is not an email address*',
        'email.exists' => 'Please use your registered email address*'
        ]);

       $token = Str::random(60);

       \DB::table('password_resets')->where('email', $request->email)->delete();
       // insert the email into database
       \DB::table('password_resets')->insert([
        'email' => $request->email,
        'token' => $token,
        'created_at' => now()
       ]);

       // send email here

       $admin =Admin::where('email', $request->email)->first();

       $formData =[
        'token' => $token,
        'admin' => $admin,
        'subject' => 'You have request to reset your password'
       ];

       Mail::to($request->email)->send(new ResetPasswordEmail($formData));

       return redirect()->route('adminForgotPass')->with('A_successEmail', 'Email has been sent to your account');
    }


    public function resetPassword($token){

       $tokenExists = \DB::table('password_resets')->where('token', $token)->first();

       if($tokenExists == null){
        return redirect()->route('adminForgotPass')->with('A_tokenError', 'Invalid request. Send email again');
       }
        return view('admin/resetPassword', [
            'token' => $token
        ]);
    }


    public function processResetPassword(Request $request){
        $token =$request->token;
        $tokenObj = \DB::table('password_resets')->where('token', $token)->first();

       if($tokenObj == null){
        return redirect()->route('adminForgotPass')->with('A_tokenError', 'Invalid request made');
       }

       $admin =Admin::where('email',$tokenObj->email)->first();

       $credentials =$request->validate([
        'password' => 'required|min:6',
        'confirm_password' => 'required|same:password'
      ],
      [
        'password.required' => 'Password field is required*',
        'confirm_password.required' => 'Confirm password field is required*',
        'password.min' => 'Password must be at least 6 chararcters*',
        'email.exists' => 'Please use your registered email address*'
      ]);

       $updateAdmin = Admin::where('id', $admin->id)->update([
            'password' => Hash::make($request->password)
        ]);

        \DB::table('password_resets')->where('email', $admin->email)->delete();
        return redirect()->route('adminLogin')->with('A_successResetPass', 'Password reset successful');
    }
}
