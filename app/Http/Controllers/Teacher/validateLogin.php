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
        // $data = $request->all();
        // dd($request->email);
        // dd($data['email']);
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
            $allData = $request->all();
            
            if(isset($allData['remember']) && !empty($allData['remember'])){
                setcookie('email', $allData['email'], time()+1200);
                setcookie('password', $allData['password'], time()+1200);
            }
            return redirect()->route('teacherDash')->with('T_loginSuccess', "You are successfully logged in");

        }
        else{
            return redirect()->route('teacherLogin')->with('T_loginError', 'Invalid credentials provided!');
        }
    }

    public function teacherDashboard(){     
        return view('teachers.dashboard');
    }
    
    public function Logout(Request $request){
        Auth::guard('web')->logout();
        return redirect()->route('teacherLogin')->with('T_logoutMsg','You have been logged out');
        
    }
}