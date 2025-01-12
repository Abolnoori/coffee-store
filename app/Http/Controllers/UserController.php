<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

    // Get All Users  

    public function index()
    {
        $users = User::all()
        ->select('id','username' , 'email');
        return response()->json($users);
    }

    // Create New User

    public function store(Request $request)
    {   

        // ذخیره دیتا   
        $data = $request->all();
        // مقادیر اعتبار سنجی
        $rules = [
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ];

        
            // validator
           $validator = Validator::make( $data ,$rules) ;

            if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }else{
            // ساخت توکن 
            $token = Str::random(32);
            // ذخیره کاربر
            $user =  new User ; 
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->remember_token = $token;
            $user->save();
        
            return response()->json(['Create By User'=> $user] );
        }

           
       
    }


    // Get User By Id 

    public function show( $id)
    {   
        $user = User::where('id', $id)
        ->select('id','username' , 'email')
        ->get();
        return response()->json($user);
    }


    // Get User By Id 

    public function update(Request $request, User $user)
    {

        // ذخیره دیتا   
        $data = $request->all();
        // مقادیر اعتبار سنجی
        $rules = [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'. $user->id,
            'password' => 'nullable|string|min:8',
        ];


            // validator
           $validator = Validator::make( $data ,$rules) ;

            if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }else{

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password ? $request->password : $user->password,
        ]);
        return response()->json($user);
    }}


    // Delete User By Id 
    public function destroy( $id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['delete' => 'Deleted is successfully']);
    }
}
