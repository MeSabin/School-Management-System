<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\App\Models\Admin\Admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Admin\Students;
use App\Models\Admin\CS_Subject;
use App\Models\Teacher\Teacher;

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
            // Remember me functionality
            $allData = $request->all();
            
            if(isset($allData['remember']) && !empty($allData['remember'])){
                setcookie('email', $allData['email'], time()+(86400*30));
                setcookie('password', $allData['password'], time()+(86400*30));
            }
            return redirect()->route('adminDash')->with('A_loginSuccess', "You are successfully logged in"); 
        }
        else{
            return redirect()->route('adminLogin')->with('A_loginError', 'Invalid credentials provided!');
        }
    }


    public function adminDashboard(){
        $students = Students::all();
        $studentsCount = $students->count();

        $teachers = Teacher::all();
        $teachersCount = $teachers->count();
        
        $subjects = CS_Subject::all();
        $subjectsCount = $subjects->count();

        return view('admin.dashboard', [
            'total_students' => $studentsCount,
            'total_teachers' => $teachersCount,
            'total_subjects' => $subjectsCount,
        ]);

    }


    public function Logout()
    {
        Auth::guard('admin')->logout(); 
        session()->flush();
        return redirect()->route('adminLogin')->with('A_logoutMsg', 'You have been logged out');
    }
    
}
