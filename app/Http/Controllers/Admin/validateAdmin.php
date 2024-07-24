<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\App\Models\Admin\Admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class validateAdmin extends Controller
{
    public function loginAdmin(Request $request){
        // dd($request->all());
        // $remember = $request->has('remember');
        $credentials =$request->validate([
            'email' =>'required|email',
            'password'=>'required'
        ],
        [
            'email.required' => 'Email is required*',
            'password.required' => 'Password is required*',
        ]
    );

        if(Auth::guard('admin')->attempt($credentials)) {
            // Remember me functionality
            $allData = $request->all();
            
            if(isset($allData['remember']) && !empty($allData['remember'])){
                setcookie('email', $allData['email'], time()+1200);
                setcookie('password', $allData['password'], time()+1200);
            }
            return redirect()->route('adminDash')->with('A_loginSuccess', "You are successfully logged in"); 
        }
        else{
            return redirect()->route('adminLogin')->with('A_loginError', 'Invalid credentials provided!');
        }
    }


    public function adminDashboard(){
        return view('admin.dashboard');

    }


    public function Logout()
    {
        Auth::guard('admin')->logout(); 
        return redirect()->route('adminLogin')->with('A_logoutMsg', 'You have been logged out');
    }
    
}
