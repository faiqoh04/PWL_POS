<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // // tambah data use dengan eloquent model
        //  $data = [
        //      'username' => 'customer-1',
        //      'nama' => 'Pelanggan',
        //      'password' => hash::make ('12345'),
        //      'level_id' => 4
        //  ];

        //  Usermodel::insert($data);

        //     'nama' => 'Pelanggan Pertama',
        // ];
        // UserModel::where('username', 'customer-1')->update($data); // update data user

        // // Ambil semua data pengguna
        // $user = UserModel::all();

        // // Tampilkan view 'user' dengan data pengguna
        // return view('user', ['data' => $user]);

        // // PRAKTIKUM 1 JS 4
        // $data = [
        //     'level_id' => 2,
        //     // 'username' => 'manager_dua',
        //     // 'nama' => 'Manager 2',
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345')
        // ];
        // UserModel::create($data);

        // $user = UserModel::all();
        // return view('user', ['data' => $user]);

        // PRAKTIKUM 2.1 JS 4
        // $user = UserModel::find(1);
        // $user = UserModel::where('level_id', 1)->first();
        // $user = UserModel::firstWhere('level_id', 1);
        // $user = UserModel::findOr(20, ['username', 'nama'], function (){
        //     abort(404);
        // });

        // PRAKTIKUM 2.2 JS 4
        // $user = UserModel::findOrFail(1);
        $user = UserModel::where('username', 'manager9')-> firstOrFail();
        return view('user', ['data' => $user]);

    }
}
