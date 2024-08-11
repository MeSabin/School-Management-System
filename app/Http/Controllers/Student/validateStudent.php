<?php

namespace App\Http\Controllers\Student;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class validateStudent extends Controller
{
    public function Login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email is required*',
            'email.email' => 'Email should be valid email address*',
            'password.required' => 'Password is required*',
        ]);

        if (Auth::guard('student')->attempt($credentials)) {
            $allData = $request->all();

            if (isset($allData['remember']) && !empty($allData['remember'])) {
                setcookie('email', $allData['email'], time() +(86400*30), "/");
                setcookie('password', $allData['password'], time() +(86400*30), "/");
            }
            return redirect()->route('studentDashboard')->with('S_loginSuccess', "You are successfully logged in");
        } else {
            return redirect()->route('studentLogin')->with('S_loginError', 'Invalid credentials provided!');
        }
    }

    public function studentDashboard() {
        return view('students.dashboard');
    }

    public function Logout(Request $request) {
        Auth::guard('student')->logout();
        session()->flush();
        return redirect()->route('studentLogin')->with('S_logoutMsg', 'You have been logged out');
    }
}
