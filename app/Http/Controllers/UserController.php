<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\QueryException;
use App\Models\LevelModel;

class UserController extends Controller
{
    // public function index()
    // {
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
        // $user = UserModel::all();
        // return view('user', ['data' => $user]);
    // }

    // public function tambah() {
    //     return view ('user_tambah');
    // }

    // public function tambah_simpan(Request $request) {
    //     UserModel::create ([
    //         'username' => $request->username,
    //         'nama' => $request->nama,
    //         'password' => Hash::make($request->password),
    //         'level_id' => $request->level_id
    //     ]);
    //     return redirect('/user');
    // }

    // public function ubah ($id) {
    //     $user = UserModel::find($id);
    //     return view ('user_ubah', ['data' => $user]);
    // }

    // public function ubah_simpan($id, Request $request) {
    //     $user = UserModel::find($id);

    //     $user->username = $request->username;
    //     $user->nama = $request->nama;
    //     $user->password = Hash::make($request->password);
    //     $user->level_id = $request->level_id;

    //     $user->save();

    //     return redirect('/user');
    // }

    // public function hapus($id) {
    //     $user = UserModel::find($id);
    //     $user->delete();

    //     return redirect('/user');
    // }

    // JS 4 PRAKTIKUM 2.7
    // public function index() {
    //     $user = UserModel::with('level')->get();
    //     dd($user);
    // }
//     public function index() {
//         $user = UserModel::with('level') -> get();
//         return view ('user', ['data' => $user]);
//     }

// JS 5 PRAKTIKUM 3 DAN 4
    // public function index()
    // {
    //     $breadcrumb = (object)[
    //         'title' => 'Daftar user',
    //         'list' => ['Home', 'user'],
    //     ];

    //     $page = (object)[
    //         'title' => 'Daftar user yang terdaftar dalam sistem'
    //     ];

    //     $activeMenu = 'user'; //set menu yang aktif
        
    //     return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
        
    // }

    // Ambil data user dalam bentuk JSON untuk DataTables
    // public function list(Request $request)
    // {
    // $users = UserModel::select('user_id', 'username', 'nama', 'level_id')
    //     ->with('level');
    
    // return DataTables::of($users)
    //     // Menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
    //     ->addIndexColumn()
    //     ->addColumn('aksi', function ($user) { // Menambahkan kolom aksi
    //         $btn = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btn-info btn-sm">Detail</a> ';
    //         $btn .= '<a href="' . url('/user/' . $user->user_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
    //         $btn .= '<form class="d-inline-block" method="POST" action="' . url('/user/' . $user->user_id) . '">'
    //             . csrf_field() . method_field('DELETE') .
    //             '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm
    //             (\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
    //         return $btn;
    //     })
    //     ->rawColumns(['aksi']) // Memberitahu bahwa kolom aksi adalah HTML
    //     ->make(true);
    // }

    // Menampilkan halaman form tambah user
    public function create()    
    {
        $breadcrumb = (object) [
            'title' => 'Tambah User',
            'list' => ['Home', 'User', 'Tambah']
        ];
        
        $page = (object) [
            'title' => 'Tambah user baru'
        ];
        
        $level = LevelModel::all(); // Ambil data level untuk ditampilkan di form
        
        $activeMenu = 'user'; // Set menu yang sedang aktif

        return view('user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    // Menyimpan data user baru
    public function store(Request $request)
    {
        $request->validate([
            // username harus diisi, berupa string, minimal 3 karakter, dan bernilai unik di tabel user kolom username
            'username' => 'required|string|min:3|unique:m_user,username',
            'nama' => 'required|string|max:100', // nama harus diisi, berupa string, dan maksimal 100 karakter
            'password' => 'required|min:5', // password harus diisi dan minimal 5 karakter  
            'level_id' => 'required|integer' // level_id harus diisi dan berupa angka
        ]);

        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password), // password dienkripsi sebelum disimpan
            'level_id' => $request->level_id
        ]);

        return redirect('/user')->with('success', 'Data user berhasil disimpan');
    }

    // Menampilkan detail user
    public function show(string $id)
    {
        $user = UserModel::with('level')->find($id); // Mengambil data user beserta relasi level
        $breadcrumb = (object) [
            'title' => 'Detail User',
            'list' => ['Home', 'User', 'Detail']
        ];
        $page = (object) [
            'title' => 'Detail User'
        ];
        $activeMenu = 'user'; // Set menu yang sedang aktif
        
        return view('user.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'user' => $user,
            'activeMenu' => $activeMenu
        ]);
    }

    // menampilkan halaman form eddit user
    public function edit(string $id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::all();
        $breadcrumb = (object) [
            'title' => 'Edit User',
            'list' => ['Home', 'User', 'Edit']
        ];
        $page = (object) [
            'title' => 'Edit user'
        ];
        $activeMenu = 'user'; // set menu yang sedang aktif

        return view('user.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 
        'level' => $level, 'activeMenu' => $activeMenu]);
    }

    // Menyimpan perubahan data user
    public function update(Request $request, string $id)
    {
        $request->validate([
            // Username harus diisi, berupa string, minimal 3 karakter,
            // dan bernilai unik di tabel user kecuali untuk user yang sedang diedit
            'username' => 'required|string|min:3|unique:m_user,username,' . $id . ',user_id',
            'nama' => 'required|string|max:100', // Nama harus diisi, berupa string, dan maksimal 100 karakter 
            'password' => 'nullable|min:5', // Password bisa diisi (minimal 5 karakter) dan bisa tidak diisi
            'level_id' => 'required|integer' // Level ID harus diisi dan berupa angka
        ]);

        $user = UserModel::find($id);
        $user->update(['username' => $request->username, 'nama' => $request->nama, 
        'password' => $request->password ? bcrypt($request->password) : $user->password, 'level_id' => $request->level_id]);

        return redirect('/user')->with('success', 'Data user berhasil diubah');
    }

    public function destroy(string $id)
    {
        // Cek apakah data user dengan ID yang dimaksud ada atau tidak
        $check = UserModel::find($id);
        if (!$check) {
            return redirect('/user')->with('error', 'Data user tidak ditemukan');
        }

        try {
            // Hapus data user
            UserModel::destroy($id);
            return redirect('/user')->with('success', 'Data user berhasil dihapus');
        } catch (QueryException $e) {
            // Jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/user')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang 
            terkait dengan data ini');
        }
    }

    //update index
    // Menampilkan halaman awal user
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar User',
            'list' => ['Home', 'User']
        ];

        $page = (object) [
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];

        $activeMenu = 'user'; // set menu yang sedang aktif
        $level = LevelModel::all(); // ambil data level untuk filter level

        return view('user.index', [
            'breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    // update list
    // ambil data user dalam bentuk json untuk datables
    public function list(Request $request)
    {
        $users = UserModel::select('user_id', 'username', 'nama', 'level_id')->with('level');
        
        // Filter data user berdasarkan level_id
        if ($request->level_id) {
            $users->where('level_id', $request->level_id);
        }

        return DataTables::of($users)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($user) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btn-info btn-sm">Detail</a>';
                $btn .= ' <a href="' . url('/user/' . $user->user_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a>';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/user/' . $user->user_id) . '">'
                        . csrf_field() . method_field('DELETE').
                        '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm (\'Apakah Anda 
                        yakin menghapus data ini?\')">Hapus</button>';
                $btn .= '</form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah HTML
            ->make(true);
    }

}
