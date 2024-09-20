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
        // $user = UserModel::where('username', 'manager9')-> firstOrFail();

        // PRAKTIKUM 2.3 JS 4
        // $user = UserModel::where('level_id', 2)->count();
        // dd($user);

        // PRAKTIKUM 2.4 JS 4
        // $user = UserModel::firstOrCreate(
        // $user = UserModel::firstOrNew(
            // [
                // 'username'=> 'manager',
                // 'nama' => 'Manager',
                // 'username'=>'manager',
                // 'nama'=>'Manager',
                // 'username'=>'manager33',
                // 'nama'=>'Manager Tiga Tiga',
                // 'password'=> Hash::make('12345'),
                // 'level_id'=> 2
        //     ],
        // );
        // $user->save();
        // return view('user', ['data' => $user]);


        //PRAKTIKUM 2.5 JS 4
        // $user = UserModel::create([

            // 'username' => 'manager55',
            // 'nama' => 'Manager55',
            // 'password' => Hash::make('12345'),
            // 'level_id' => 2,
        //     'username' => 'manager11',
        //     'nama' => 'Manager11',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2,
        // ]);

        // $user->username = 'manager56';
        // $user->username = 'manager12';
        // $user->save();

        // $user->isDirty(); // true
        // $user->isDirty('username'); // true
        // $user->isDirty('nama'); // false
        // $user->isDirty(['nama', 'username']); // true

        // $user->isClean(); // false
        // $user->isClean('username'); // false
        // $user->isClean('nama'); // true
        // $user->isClean(['nama', 'username']); // false

        // $user->save();

        // $user->isDirty(); // false
        // $user->isClean(); // true
        // dd($user->isDirty());

        // $user->wasChanged(); // true
        // $user->wasChanged('username'); // true
        // $user->wasChanged(['username', 'level_id']); // true
        // $user->wasChanged('nama'); // false

        // dd($user->wasChanged(['nama', 'username'])); // true

        // JS 4 PRAKTIKUM 2.6
        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }

    public function tambah() {
        return view ('user_tambah');
    }

    public function tambah_simpan(Request $request) {
        UserModel::create ([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id
        ]);
        return redirect('/user');
    }

    public function ubah ($id) {
        $user = UserModel::find($id);
        return view ('user_ubah', ['data' => $user]);
    }

    public function ubah_simpan($id, Request $request) {
        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make($request->password);
        $user->level_id = $request->level_id;

        $user->save();

        return redirect('/user');
    }

    public function hapus($id) {
        $user = UserModel::find($id);
        $user->delete();

        return redirect('/user');
    }

    // public function index() {
    //     $user = UserModel::with('level')->get();
    //     dd($user);
    // }

    // public function index() {
    //     $user = UserModel::with('level') -> get();
    //     return view ('user', ['data' => $user]);
    // }

}
