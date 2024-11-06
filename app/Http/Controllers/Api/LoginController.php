<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        // Validasi input 'username' dan 'password' wajib diisi
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        // Jika validasi gagal, kirim respons error 422
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Ambil data 'username' dan 'password' dari request
        $credentials = $request->only('username', 'password');

        // Cek kredensial, jika salah, kirim pesan error 401
        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Username atau Password Anda Salah'
            ], 401);
        }

        // Jika berhasil, kirim respons dengan data user dan token
        return response()->json([
            'success' => true,
            'user' => auth()->guard('api')->user(),
            'token' => $token
        ], 200);
    }
}
