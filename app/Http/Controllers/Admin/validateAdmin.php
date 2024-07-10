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
            return redirect()->route('loginAdmin');
        }
        
        // $admin = Admin::where('email',$request->input('email'))->first();
        // if($admin && Hash::check($request->input('password'), $admin->password)){
        //     return redirect()->route('adminDash');
        // }
        // else{
        //    return redirect()->route('loginAdmin');
        // }
    }

    public function adminDashboard(){

            return view('admin.dashboard');

    }
    public function Logout()
    {
        // Logout current user
        Auth::guard('admin')->logout(); // Ensure admin guard is also cleared
        return redirect()->route('loginAdmin');
    }
    
}
