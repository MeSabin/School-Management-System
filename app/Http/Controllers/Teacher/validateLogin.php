<?php

namespace App\Http\Controllers\Teacher;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class validateLogin extends Controller
{
    public function Login(Request $request){
        $credentials =$request->validate([
            'email' =>'required|email',
            'password'=>'required'
        ],
        [
            'email.required' => 'Email is required*',
            'email.email' => 'Email should be valid email address*',
            'password.required' => 'Password is required*',
        ]
    );

        if(Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('teacherDash')->with('T_loginSuccess', "You are successfully logged in");

        }
        else{
            // session()->flash('loginError', "Invalid credentials provided!");
            return redirect()->route('teacherLogin')->with('T_loginError', 'Invalid credentials provided!');
        }
    }

    public function teacherDashboard(){
        
            return view('teachers.dashboard');
    }
    
    public function Logout(){
        Auth::guard('web')->logout();
        return redirect()->route('teacherLogin')->with('T_logoutMsg','You have been logged out');
    }
}
