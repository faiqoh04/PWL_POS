<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class LogoutController extends Controller
{
    public function __invoke(Request $request)
    {
        // Menghapus token JWT yang aktif
        $removeToken = JWTAuth::invalidate(JWTAuth::getToken());
        
        // Jika token berhasil dihapus, kirim respons sukses
        if ($removeToken) {
            return response()->json([
                'success' => true,
                'message' => 'Logout Berhasil',
            ]);
        }
    }
}
