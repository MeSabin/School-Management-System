<?php

namespace App\Http\Controllers\API;
use App\Models\Admin\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class validateAdmin extends Controller
{
    // public function Signup(Request $request){
    //     $validate =Validator::make(
    //         $request->all(),
    //         [
    //             'name' => 'required',
    //             'phone' => 'required',
    //             'email' => 'required|email|unique:admins',
    //             'role' => 'required',
    //             'password' => 'required'
    //         ]
    //         );
    //         if($validate->fails()){
    //             return response()->json([
    //                 'status' => false,
    //                 'message' =>'signup error',
    //                 'error' => $validate->errors()->all()
    //             ], 401);
    //         }
    //         $user =Admin::create([
    //             'name' =>$request->name,
    //             'phone' =>$request->phone,
    //             'email' =>$request->email,
    //             'role' =>$request->role,
    //             'password' =>Hash::make($request->password),
    //         ]);

    //         return response()->json([
    //             'status' =>true,
    //             'message' =>'signup successful',
    //             'user' => $user,
    //         ], 200);
    // }

    // public function Login(Request $request){
    //     $validate = Validator::make(
    //         $request->all(),
    //         [
    //             'email' => 'required|email',
    //             'password' => 'required',
    //         ]
    //         );

    //         if($validate->fails()){
    //             return response()->json([
    //                 'status' => false,
    //                 'message'=> 'Validation error',
    //                 'error' => 'Login attempt unsuccessful'
    //             ], 401);
    //         }
    //         if(Auth::guard('admin')->attempt(['email'=> $request->email, 'password'=> $request->password])){
    //             $user =Auth::guard('admin')->user();
    //             return response()->json([
    //                 'status' => true,
    //                 'message' => "Login successful",
    //                 'token' => $user->createToken('API TOKEN')->plainTextToken,
    //                 'token_type' => 'bearer'
    //             ], 200);
    //         }
    //         else{
    //             return response()->json([
    //                 'status' => false,
    //                 'message'=> 'Login error',
    //                 'error' => 'You are not a valid user to login'
    //             ], 401);
    //         }

           
    // }

    // public function Logout(Request $request){
    //     $user = $request->user();
    //     $user->tokens()->delete();

    //     return response()->json([
    //         'status' => true,
    //         'user' => $user,
    //         'message' => 'Logout successful'
    //     ], 200);
    // }
}
