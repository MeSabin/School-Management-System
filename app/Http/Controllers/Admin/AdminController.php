<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Teacher\Teacher;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers =Teacher::paginate(7);
        return view('admin/viewTeachers',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('admin/signup');
        return view('admin/registerTeacher');   
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
            'password' => 'required|alpha_num|min:6',
            'image' => 'required|mimes:jpg,png,jpeg,gif|max:7000 '
        ],
        [
            'fullName.required' => 'Full name is required*',
            'phone.required' => 'Phone number is required*',
            'phone.digits' => 'Phone number must be of 10 digits*',
            'email.required' => 'Email is required*',
            'email.email' => 'Email format is invalid*',
            'email.unique' => 'Email already exists*',
            'password.required' => 'Password is required*',
            'password.min' => 'Password must be at least 6 chararcters*',
            'image.required' => 'Please select an image*',
            'image.max' => 'Image size should be less than 7 MB*'
            
        ]);

        $image =$request->image;
        $extension =$image->extension();
        $teacherImage =time(). '.' . $extension;
        $image->move(public_path(). '/uploads/', $teacherImage);

        Teacher::create([
            'name' => $request->fullName,
            'phone' => $request->phone,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'image' => $teacherImage
        ]);

        return redirect()->route('teachers.index')->with('registerTeacher', 'Teacher registration successful');
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
    public function edit(Teacher $teacher)
    {
        $teacher =Teacher::find($teacher->id);
        return view('admin/updateTeacher', compact('teacher'));


    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {       
        $request->validate([
            'fullName'=>'required',
            'phone'=> 'required|digits:10',
            'email' => 'required|email',
            'image' => 'nullable|mimes:jpg,png,jpeg,gif|max:7000 '
        ],
        [
            'fullName.required' => 'Full name is required*',
            'phone.required' => 'Phone number is required*',
            'phone.digits' => 'Phone number must be of 10 digits*',
            'email.required' => 'Email is required*',
            'email.email' => 'Email format is invalid*',
            'image.max' => 'Image size should be less than 7 MB*'
            
        ]);

            $teacher = Teacher::find($id);

            if ($request->hasFile('image')) {
                $old_path = public_path('uploads/') . $teacher->image;
                if (file_exists($old_path)) {
                    @unlink($old_path);
                }

                $image = $request->image;
                $teacherImage = time() . '.' . $image->extension();
                $image->move(public_path('uploads/'), $teacherImage);
                $teacher->image = $teacherImage;
            }
            else{
                $teacherImage =$teacher->image;
            }

                $teacher->name = $request->fullName;
                $teacher->phone = $request->phone;
                $teacher->email = $request->email;
                $teacher->role = $request->role;
                $teacher->image= $teacherImage;
                $teacher->save();

                return redirect()->route('teachers.index')->with('updateTeacher', 'Teacher details has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $teacher = Teacher::find($id);
        $teacher->delete();
        $imagePath = public_path('/uploads/' . $teacher->image);
        if (file_exists($imagePath)) {
            @unlink($imagePath);
        }
        return redirect()->route('teachers.index')->with('deleteTeacher', 'Teacher deleted successfully.');
    } 

}
