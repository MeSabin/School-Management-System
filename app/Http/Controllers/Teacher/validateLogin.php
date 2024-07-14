<?php

namespace App\Http\Controllers\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\App\Models\Teacher\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            return redirect()->route('teacherDash');

        }
        else{
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
