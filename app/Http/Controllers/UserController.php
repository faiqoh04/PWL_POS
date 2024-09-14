<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // tambah data use dengan eloquent model
        $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'Pelanggan',
        //     'password' => hash::make ('12345'),
        //     'level_id' => 4
        // ];

        // Usermodel::insert($data);

            'nama' => 'Pelanggan Pertama',
        ];
        UserModel::where('username', 'customer-1')->update($data); // update data user

        // Ambil semua data pengguna
        $user = UserModel::all();

        // Tampilkan view 'user' dengan data pengguna
        return view('user', ['data' => $user]);
    }
}
