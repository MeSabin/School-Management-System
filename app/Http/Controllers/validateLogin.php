<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\App\Models\Teacher;
use Illuminate\Http\Request;

class validateLogin extends Controller
{
    public function Login(Request $request){
        $credentials =$request->validate([
            'email' =>'required|email',
            'password'=>'required'
        ],
        [
            'email.required' => 'Email is required*',
            'password.required' => 'Password is required*',
        ]
    );

        if(Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('dashboard');
            // return view('teachers/dashboard');

        }
        else{
            return view('teachers/login');
        }
        
    }

    public function teacherDashboard(){
            return view('teachers.dashboard');

    }
    
    public function Logout(){
        Auth::guard('web')->logout();
        return redirect()->route('loginPage');
    }
}
