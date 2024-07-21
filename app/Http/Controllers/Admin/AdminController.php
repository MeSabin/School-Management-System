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
        $teachers =Teacher::all();
        // return redirect()->route('teachers.index');
        // return $teachers;
        // foreach($teachers as $teacher){
        //     echo $teacher->id;
        //     echo $teacher->name;
        // }
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
            'password.required' => 'Password is required*',
            'password.min' => 'Password must be at least 6 chararcters*',
            'image.required' => 'Please select an image*'
            
        ]);
       echo "hello";
    
        // $teacher =new Teacher;

        // $teacher->name =$request->fullName;
        // $teacher->phone =$request->phone;
        // $teacher->email =$request->email;
        // $teacher->role =$request->role;
        // $teacher->password =$request->password;

        // $teacher->save();

        $image =$request->file('image');
        // $image =$request->image;
        $extension =$image->extension();
        $teacherImage =time(). '.' . $extension;
        $image->move(public_path(). '/uploads/', $teacherImage);

        Teacher::create([
            'name' => $request->fullName,
            'phone' => $request->phone,
            'email' => $request->email,
            'role ' => $request->role,
            'password' => Hash::make($request->password),
            'image' => $teacherImage
        ]);

        return redirect()->route('teachers.index');
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
        // return view('admin/updateTeacher');
        $teacher =Teacher::find($teacher->id);
        return view('admin/updateTeacher', compact('teacher'));


    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
 
        $userImage =Teacher::select('id','image')->where(['id'=>$id])->get();
            if($request->image != ''){
                $path =public_path('uploads/');

                if($userImage[0]->image != '' && $userImage[0]->image !=null){
                    $old_file =$path. $userImage[0]->image;
                    if(file_exists($old_file)){
                        unlink($old_file);
                    }
                }
                $image =$request->image;
                $extension =$image->getClientOriginalExtension();
                $teacherImage =time(). '.' . $extension;
                $image->move(public_path('uploads/'), $teacherImage);
            }
            else{  
                $teacherImage =$userImage[0]->image;
            }

            $teacher =Teacher::where(['id'=>$id])->update([
                'name' =>$request->name,
                'phone' =>$request->phone,
                'email' =>$request->email,
                'role' =>$request->role,
                'image' => $teacherImage,
            ]);

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
        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully.');
    } 

}
