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

            return redirect()->route('adminDash');
        }
        else{
            return redirect()->route('adminLogin');
        }
    }

    public function adminDashboard(){
        header('Location: admin.dashboard');
        return view('admin.dashboard');

    }
    public function Logout()
    {
        Auth::guard('admin')->logout(); 
        return redirect()->route('adminLogin');
    }
    
}
