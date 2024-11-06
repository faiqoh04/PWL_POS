<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        // Validasi input: 'username', 'nama', 'password', dan 'level_id' wajib diisi
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required|min:5|confirmed', // password minimal 5 karakter dan konfirmasi
            'level_id' => 'required'
        ]);

        // Jika validasi gagal, kirim respons error 422
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Membuat user baru dengan data yang valid
        $user = UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password), // Enkripsi password
            'level_id' => $request->level_id,
        ]);

        // Jika user berhasil dibuat, kirim respons sukses 201
        if ($user) {
            return response()->json([
                'success' => true,
                'user' => $user,
            ], 201);
        }

        // Jika gagal menyimpan, kirim respons error 409
        return response()->json([
            'success' => false,
        ], 409);
    }
}
