<?php
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function() {
//     return view('welcome');
// });

// Route::get('/level', [LevelController::class, 'index']);
// Route::get('/kategori', [KategoriController::class, 'index']);
// Route::get('/user', [UserController::class, 'index']);
// Route::get('/user/tambah', [UserController::class, 'tambah']);
// Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
// Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
// Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);

// Route::get('/', [WelcomeController::class, 'index']);

// JS 5 PRAK 3
Route::get('/', [WelcomeController::class, 'index']);
   
Route::group(['prefix' => 'user'], function () {  
    Route::get('/', [UserController::class, 'index']); // Menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']); // Menampilkan data user dalam bentuk JSON untuk datatables
    Route::get('/create', [UserController::class, 'create']); // Menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']); // Menyimpan data user baru 
    // JS 6 PRAK 1
    Route::get('/create_ajax', [UserController::class,'create_ajax']);   // menampilkan halaman form tambah user ajax
    Route::post('/ajax', [UserController::class,'store_ajax']);   // menyimpan data user baru ajax

    Route::get('/{id}', [UserController::class, 'show']); // Menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']);  // Menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']); // Menyimpan perubahan data user
    
    // JS 6 PRAK 2
    Route::get('/{id}/edit_ajax', [UserController::class,'edit_ajax']);       // menampilkan halaman form edit user ajax
    Route::put('/{id}/update_ajax', [UserController::class,'update_ajax']);  // menyimpan perubahan data user ajax
    
    // JS 6 PRAK 3
    Route::get('/{id}/delete_ajax', [UserController::class,'confirm_ajax']);       // untuk tampilkan form confirm delete user ajax
    Route::delete('/{id}/delete_ajax', [UserController::class,'delete_ajax']);       // Untuk hapus data user ajax

    Route::delete('/{id}', [UserController::class, 'destroy']); // Menghapus data user
});

// JS 5 TUGAS
Route::group(['prefix' => 'kategori'], function(){
    Route::get('/', [KategoriController::class, 'index']);
    Route::post('/list', [KategoriController::class, 'list']);
    Route::get('/create', [KategoriController::class, 'create']);
    Route::post('/', [KategoriController::class, 'store']);

    // JS 6 TUGAS
    Route::get('/create_ajax', [KategoriController::class, 'create_ajax']); //form tambah ajax
    Route::post('/ajax', [KategoriController::class, 'store_ajax']);        //simpan data baru ajax

    Route::get('/{id}', [KategoriController::class, 'show']);
    Route::get('/{id}/edit', [KategoriController::class, 'edit']);
    Route::put('/{id}', [KategoriController::class, 'update']);

    // JS 6 TUGAS
    Route::get('/{id}/edit_ajax', [KategoriController::class,'edit_ajax']); //tampilkan form edit dengan ajax
    Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']); //simpan perubahan user ajax
    Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']); //confirm delete ajax
    Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);

    Route::delete('/{id}', [KategoriController::class, 'destroy']);
});

Route::group(['prefix' => 'barang'], function(){
    Route::get('/', [BarangController::class, 'index']);
    Route::post('/list', [BarangController::class, 'list']);
    Route::get('/create', [BarangController::class, 'create']);
    Route::post('/', [BarangController::class, 'store']);

    // JS 6 TUGAS
    Route::get('/create_ajax', [BarangController::class, 'create_ajax']); //form tambah ajax
    Route::post('/ajax', [BarangController::class, 'store_ajax']);      //simpan user data ajax baru

    Route::get('/{id}', [BarangController::class, 'show']);
    Route::get('/{id}/edit', [BarangController::class, 'edit']);
    Route::put('/{id}', [BarangController::class, 'update']);

    // JS 6 TUGAS
    Route::get('/{id}/edit_ajax', [BarangController::class,'edit_ajax']); //tampilkan form edit dengan ajax
    Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']); //simpan perubahan user ajax
    Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']); //confirm delete ajax
    Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); //hapus ajax
    
    Route::delete('/{id}', [BarangController::class, 'destroy']);
});

Route::group(['prefix' => 'level'], function(){
    Route::get('/', [LevelController::class, 'index']);
    Route::post('/list', [LevelController::class, 'list']);
    Route::get('/create', [LevelController::class, 'create']);

    // JS 6 TUGAS
    Route::get('/create_ajax', [LevelController::class, 'create_ajax']); //form tambah user ajax
    Route::post('/ajax', [LevelController::class, 'store_ajax']);   // menyimpan data ajax baru

    Route::post('/', [LevelController::class, 'store']);
    Route::get('/{id}', [LevelController::class, 'show']);
    Route::get('/{id}/edit', [LevelController::class, 'edit']);
    Route::put('/{id}', [LevelController::class, 'update']);

    // JS 6 TUGAS
    Route::get('/{id}/edit_ajax', [LevelController::class,'edit_ajax']); //tampilkan form edit dengan ajax
    Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']); //simpan perubahan user ajax
    Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']); //confirm delete ajax
    Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']); //hapus ajax

    Route::delete('/{id}', [LevelController::class, 'destroy']);
});

Route::group(['prefix' => 'supplier'], function(){
    Route::get('/', [SupplierController::class, 'index']);
    Route::post('/list', [SupplierController::class, 'list']);
    Route::get('/create', [SupplierController::class, 'create']);

    // JS 6 TUGAS
    Route::get('/create_ajax', [SupplierController::class, 'create_ajax']); //form tambah ajax
    Route::post('/ajax', [SupplierController::class, 'store_ajax']);    // simpan data baru ajax

    Route::post('/', [SupplierController::class, 'store']);
    Route::get('/{id}', [SupplierController::class, 'show']);
    Route::get('/{id}/edit', [SupplierController::class, 'edit']);
    Route::put('/{id}', [SupplierController::class, 'update']);

    // JS 6 TUGAS
    Route::get('/{id}/edit_ajax', [SupplierController::class,'edit_ajax']); //tampilkan form edit dengan ajax
    Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']); //simpan perubahan user ajax
    Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']); //confirm delete ajax
    Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']); //hapus ajax
    
    Route::delete('/{id}', [SupplierController::class, 'destroy']);
});

