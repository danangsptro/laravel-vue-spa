<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $respon = [
                'status' => 'error',
                'msg'   => 'Validasi gagal',
                'message' => $validator->errors(),
                'content' => null,
            ];
            return response()->json($respon, 400);
        } else {
            $credentials = request(['email', 'password']);
            if(!Auth::attempt($credentials)) {
                $respon = [
                    'status' => 'error',
                    'msg'   => 'Email atau password salah',
                    'message' => null,
                    'content' => null,
                ];
                return response()->json($respon, 401);
            }
            $user = User::where('email', $request->email)->first();
            if (! \Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Error in Login');
            }

            $tokenResult = $user->createToken('token-auth')->plainTextToken;

            $respon = [
                'status' => 'success',
                'msg'   => 'Login berhasil',
                'message' => null,
                'content' => [
                    'status' => 200,
                    'access_token' => $tokenResult,
                    'token_type' => 'Bearer',
                ],
            ];
            return response()->json($respon, 200);
        }
    }
}
