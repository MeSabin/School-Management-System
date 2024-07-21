<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Teacher\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Teacher::all();
        return response()->json([
            'status' => true,
            'message' => 'All teachers data',
            'data' =>$data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $validate =Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'phone' => 'required',
                    'email' => 'required|email|unique:admins',
                    'role' => 'required',
                    'password' => 'required',
                    'image' => 'required|mimes:jpg,png,jpeg,gif '
                ]
                );
                if($validate->fails()){
                    return response()->json([
                        'status' => false,
                        'message' =>'Teacher not added error',
                        'error' => $validate->errors()->all()
                    ], 401);
                }

                $image =$request->image;
                $extension =$image->getClientOriginalExtension();
                $teacherImage =time(). '.' . $extension;
                $image->move(public_path(). '/uploads', $teacherImage);

                $user =Teacher::create([
                    'name' =>$request->name,
                    'phone' =>$request->phone,
                    'email' =>$request->email,
                    'role' =>$request->role,
                    'password' =>Hash::make($request->password),
                    'image' => $teacherImage,
                ]);
    
                return response()->json([
                    'status' =>true,
                    'message' =>'Teacher registered successfully',
                    'user' => $user,
                ], 200);
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate =Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required|email|unique:admins',
                'role' => 'required',
                'password' => 'required',
                'image' => 'required|mimes:jpg,png,jpeg,gif '
            ]
            );
            if($validate->fails()){
                return response()->json([
                    'status' => false,
                    'message' =>'Teacher not added error',
                    'error' => $validate->errors()->all()
                ], 401);
            }

            $userImage =Teacher::select('id','image')->where(['id'=>$id])->get();
            if($request->image != ''){
                $path =public_path(). '/uploads';

                if($userImage[0]->image != '' && $userImage[0]->image !=null){
                    $old_file =$path. $userImage[0]->image;
                    if(file_exists($old_file)){
                        unlink($old_file);
                    }
                }
                $image =$request->image;
                $extension =$image->getClientOriginalExtension();
                $teacherImage =time(). '.' . $extension;
                $image->move(public_path(). '/uploads', $teacherImage);
            }
            else{  
                $teacherImage =$userImage[0]->image;
            }

            $user =Teacher::where(['id'=>$id])->update([
                'name' =>$request->name,
                'phone' =>$request->phone,
                'email' =>$request->email,
                'role' =>$request->role,
                'image' => $teacherImage,
            ]);

            return response()->json([
                'status' =>true,
                'message' =>'Teacher updated successfully',
                'user' => $user,
            ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $imagePath =Teacher::select('image')->where('id',$id)->get();
        $filePath =public_path(). '/uploads/'. $imagePath[0]['image'];
        unlink($filePath);

        $user =Teacher::where('id',$id)->delete();
        return response()->json([
            'status' =>true,
            'message' =>'Data deleted successfully',
            'user' => $user,
        ], 200);

    }
}
