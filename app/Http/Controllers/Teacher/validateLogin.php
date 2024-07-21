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
            return redirect()->route('teacherDash');

        }
        else{
            session()->flash('loginError', "Invalid credentials provided!");
            return redirect()->route('teacherLogin');
        }
    }

    public function teacherDashboard(){
        
            return view('teachers.dashboard');
    }
    
    public function Logout(){
        Auth::guard('web')->logout();
        return redirect()->route('teacherLogin');
    }
}
