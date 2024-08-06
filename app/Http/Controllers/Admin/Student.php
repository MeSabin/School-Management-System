<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Students;
use App\Models\Admin\Group;
use Illuminate\Support\Facades\Hash;

class Student extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Students::paginate(3);
        return view('admin.viewStudents', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = Group::pluck('name');
        return view('admin.registerStudent', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullName' => 'required',
            'phone' => 'required|min:10',
            'roll' => 'required|numeric',
            'email' => 'required|email|unique:students,email',
            'dob' => 'required',
            'password' =>'required|min:6'
        ],[
            'fullName.required' => 'Student name is required*',
            'phone.required' => 'Phone number is required*',
            'phone.min' => 'Phone number should be of 10 digits*',
            'roll.required' => 'Roll number is required*',
            'roll.numeric' => 'Roll number must be numeric*',
            'email.required' => 'Email filed is required*',
            'email.email' => 'Email format is invalid*',
            'email.unique' => 'Email already exists*',
            'password.required' => 'Password field is required*',
            'password.min' => 'Password should be at least 6 characters*',
        ]);
        Students::create([
            'name' => $request->fullName,
            'roll' => $request->roll,
            'semester' => $request->semester,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'group' =>$request->group_name,
            'email' => $request->email,
            'password' => Hash::make($request->email),
        ]);
        return redirect()->route('students.index')->with('addStudent', 'Student added successfully');
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
        $groups= Group::pluck('name');
        $student =Students::find($id);

        return view('admin.updateStudent', [
            'group' => $groups,
            'student' => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student =Students::find($id);
        $request->validate([
            'fullName' => 'required',
            'phone' => 'required|min:10',
            'email' => 'required|email',
            'dob' => 'required',
        ],[
            'fullName.required' => 'Student name is required*',
            'phone.required' => 'Phone number is required*',
            'phone.min' => 'Phone number should be of 10 digits*',
            'email.required' => 'Email filed is required*',
            'email.email' => 'Email format is invalid*',
            'email.unique' => 'Email already exists in database*',
        ]);
        $student = Students::find($id);
        $student->name = $request->fullName;
        $student->roll = $request->roll;
        $student->semester = $request->semester;
        $student->phone = $request->phone;
        $student->dob = $request->dob;
        $student ->group = $request->group_name;
        $student->email = $request->email;
        $student->save();

        return redirect()->route('students.index')->with('updateStudent', 'Student details updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Students::find($id)->delete();
        return redirect()->route('students.index')->with('delStudent', 'Student Deleted Successfully');
    }

}
