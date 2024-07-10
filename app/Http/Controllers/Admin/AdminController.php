<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\App\Models\Teacher\Teacher;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/signup');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'fullName'=>'required',
            'phone'=> 'required|digits:10',
            'email' => 'required|email|unique:teachers,email',
            'role' => 'required',
            'password' => 'required|alpha_num|min:6'
        ],
        [
            'fullName.required' => 'Full name is required*',
            'phone.required' => 'Phone number is required*',
            'phone.digits' => 'Phone number must be of 10 digits*',
            'email.required' => 'Email is required*',
            'email.email' => 'Email format is invalid*',
            'password.required' => 'Password is required*',
            'password.min' => 'Password must be at least 6 chararcters*'
            
        ]);
    
        // $teacher =new Teacher;

        // $teacher->name =$request->fullName;
        // $teacher->phone =$request->phone;
        // $teacher->email =$request->email;
        // $teacher->role =$request->role;
        // $teacher->password =$request->password;

        // $teacher->save();

        Teacher::create([
            'name' => $request->fullName,
            'phone' => $request->phone,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
