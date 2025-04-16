<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

/**
 * @OA\Post(
 *     path="/api/v1/login",
 *     summary="ورود به حساب کاربری با ایمیل یا نام کاربری",
 *     tags={"Auth"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"login", "password"},
 *             @OA\Property(property="login", type="string", example="testuser یا test@example.com"),
 *             @OA\Property(property="password", type="string", format="password", example="12345678")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="ورود موفق",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="string", example="ورود به حساب با موفقیت انجام شد."),
 *             @OA\Property(property="Token", type="string", example="X8s9dk3l91kdfhTgH9aKaPd0zL")
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="خطای اعتبارسنجی",
 *         @OA\JsonContent(
 *             @OA\Property(property="errors", type="object")
 *         )
 *     ),
 *     @OA\Response(
 *         response=442,
 *         description="کاربر پیدا نشد یا رمز اشتباه است",
 *         @OA\JsonContent(
 *             @OA\Property(property="status", type="string", example="Eror"),
 *             @OA\Property(property="message", type="string", example="کاربر مورد نظر یافت نشد.")
 *         )
 *     )
 * )
 */




    public function login(Request $request)
    {
        

        $data = $request->all();
        // مقادیر اعتبار سنجی
        $rules = [
            'login' => 'required|string',
            'password' => 'required|string|min:8',
        ];

        
        // validator
        $validator = Validator::make( $data ,$rules);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }else{ 
            $login = $request->input('login');
            $password = $request->input('password');
            $user = User::where('email', $login)->orWhere('username', $login)->first();
                if (!$user) {
                    return response()->json([
                        'status' => 'Eror',
                        'message' => 'کاربر مورد نظر یافت نشد.',
                    ],442);
                }
                // بررسی رمز عبور
                if (Hash::check($password , $user->password)) {
                    return response()->json([
                        'success'=> 'ورود به حساب با موفقیت انجام شد.',
                        'Token' =>  $user->remember_token 
                    ],200);
                } else {
                    return response()->json([
                        'status' => 'Eror',
                        'message' => 'رمز عبور نادرست است.',
                    ],442);
                }
                    
        };
        
        
        
    }












    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     //
    // }

}