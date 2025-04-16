<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use openApi\Annotations as OA;




class UserController extends Controller
{

/**
 * @OA\Get(
 *     path="/api/v1/users",
 *     summary="گرفتن تمامی کاربران",
 *     tags={"Users"},
 *     @OA\Response(
 *         response=200,
 *         description="List of Users"
 *     )
 * )
 */


    // Get All Users  

    public function index()
    {
        $users = User::all()
        ->select('id','username' , 'email');
        return response()->json($users);
    }



/**
 * @OA\Post(
 *     path="/api/v1/users",
 *     summary="ساخت کاربر جدید",
 *     tags={"Users"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"username","email","password"},
 *             @OA\Property(property="username", type="string", example="john_doe"),
 *             @OA\Property(property="email", type="string", format="email", example="john@example.com"),
 *             @OA\Property(property="password", type="string", format="password", example="12345678")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="User created successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="Create By User", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="username", type="string", example="john_doe"),
 *                 @OA\Property(property="email", type="string", example="john@example.com"),
 *                 @OA\Property(property="remember_token", type="string", example="a1b2c3d4e5f6g7h8i9j0k1l2m3n4o5p6"),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation errors",
 *         @OA\JsonContent(
 *             @OA\Property(property="errors", type="object",
 *                 @OA\Property(property="username", type="array", @OA\Items(type="string")),
 *                 @OA\Property(property="email", type="array", @OA\Items(type="string")),
 *                 @OA\Property(property="password", type="array", @OA\Items(type="string"))
 *             )
 *         )
 *     )
 * )
 */


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



/**
 * @OA\Get(
 *     path="/api/v1/users/{id}",
 *     summary="گرفتن یوزر با آیدی",
 *     tags={"Users"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the user",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="User data",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="username", type="string", example="john_doe"),
 *                 @OA\Property(property="email", type="string", example="john@example.com")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="User not found"
 *     )
 * )
 */




    // Get User By Id 

    public function show( $id)
    {   
        $user = User::where('id', $id)
        ->select('id','username' , 'email')
        ->get();
        return response()->json($user);
    }







    /**
 * @OA\Put(
 *     path="/api/v1/users/{id}",
 *     summary="آپدیت دیتای یوزر",
 *     tags={"Users"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the user to update",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"username", "email"},
 *             @OA\Property(property="username", type="string", example="new_username"),
 *             @OA\Property(property="email", type="string", format="email", example="new_email@example.com"),
 *             @OA\Property(property="password", type="string", format="password", nullable=true, example="newpassword123")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="User updated successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="username", type="string", example="new_username"),
 *             @OA\Property(property="email", type="string", example="new_email@example.com")
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation errors",
 *         @OA\JsonContent(
 *             @OA\Property(property="errors", type="object",
 *                 @OA\Property(property="username", type="array", @OA\Items(type="string")),
 *                 @OA\Property(property="email", type="array", @OA\Items(type="string")),
 *                 @OA\Property(property="password", type="array", @OA\Items(type="string"))
 *             )
 *         )
 *     )
 * )
 */



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




/**
 * @OA\Delete(
 *     path="/api/v1/users/{id}",
 *     summary="حذف اکانت یوزر با آیدی  ",
 *     tags={"Users"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the user to delete",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="User deleted successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="delete", type="string", example="Deleted is successfully")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="User not found"
 *     )
 * )
 */



    // Delete User By Id 
    public function destroy( $id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['delete' => 'Deleted is successfully']);
    }
}
