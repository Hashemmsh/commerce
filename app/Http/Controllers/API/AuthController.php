<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' =>'required',
            'password' =>'required|min:8',
        ]);

        $user = User::where('email' , $request->email)->first();
        if ($user) {
            if (Hash::check($request->password , $user->password)) {
                $token = $user->createToken('appid')->plainTextToken;
                return response()->json([
                    'message' => 'Token Create Successfully',
                    'error' => 0,
                    'data' =>[
                        'token' => $token
                    ]

                ],201);
            }else{
                return response()->json([
                    'message' => 'Password Dose Not Match',
                    'error' => 1,
                    'data' => []
                ],404);
            }
        }else{
            return response()->json([
                'message' => 'User not Found',
                'error' => 1,
                'data' => []
            ],404);
        }

    }
}
