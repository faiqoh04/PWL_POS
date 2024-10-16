<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;


use Illuminate\Support\Facades\Route;

// Mendefinisikan pola untuk parameter id
Route::pattern('id', '[0-9]+');

// Route untuk halaman login
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::get('/register', [AuthController::class, 'showRegistrationForm']);
Route::post('/signup', [AuthController::class, 'store']);


// Route yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/', [WelcomeController::class, 'index']);

    // Route untuk manajemen user
    Route::group(['prefix' => 'user', 'middleware' => 'authorize:ADM'], function () { 
        Route::get('/', [UserController::class, 'index']);
        Route::post('/list', [UserController::class, 'list']);
        Route::get('/create', [UserController::class, 'create']);
        Route::post('/', [UserController::class, 'store']);

        // AJAX routes for user management
        Route::get('/create_ajax', [UserController::class, 'create_ajax']);
        Route::post('/ajax', [UserController::class, 'store_ajax']);
        Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']);

        Route::get('/{id}', [UserController::class, 'show']);
        Route::get('/{id}/edit', [UserController::class, 'edit']);
        Route::put('/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
    });

    // Route untuk manajemen level
    // Route::middleware(['authorize:ADM'])->group(function () { // JS 7 PRAK 2
        Route::group(['prefix' => 'level', 'middleware' => 'authorize:ADM'], function () {
            Route::get('/', [LevelController::class, 'index']);
            Route::post('/list', [LevelController::class, 'list']);
            Route::get('/create', [LevelController::class, 'create']);
            Route::post('/', [LevelController::class, 'store']);

            // AJAX routes for level management
            Route::get('/create_ajax', [LevelController::class, 'create_ajax']);
            Route::post('/ajax', [LevelController::class, 'store_ajax']);
            Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);
            Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);
            Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);
            Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']);

            Route::get('/{id}', [LevelController::class, 'show']);
            Route::get('/level/{id}', [LevelController::class, 'show'])->name('level.show');
            Route::get('/{id}/edit', [LevelController::class, 'edit']);
            Route::put('/{id}', [LevelController::class, 'update']);
            Route::delete('/{id}', [LevelController::class, 'destroy']);
        // });
    });

    // Route untuk manajemen kategori
    Route::group(['prefix' => 'kategori', 'middleware' => 'authorize:ADM,MNG'], function () { //JS 7 PRAK 3
        Route::get('/', [KategoriController::class, 'index']);
        Route::post('/list', [KategoriController::class, 'list']);
        Route::get('/create', [KategoriController::class, 'create']);
        Route::post('/', [KategoriController::class, 'store']);

        // AJAX routes for kategori management
        Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);
        Route::post('/ajax', [KategoriController::class, 'store_ajax']);
        Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);

        Route::get('/{id}', [KategoriController::class, 'show']);
        Route::get('/{id}/edit', [KategoriController::class, 'edit']);
        Route::put('/{id}', [KategoriController::class, 'update']);
        Route::delete('/{id}', [KategoriController::class, 'destroy']);
    });

    // Route untuk manajemen barang
    Route::group(['prefix' => 'barang', 'middleware' => 'authorize:ADM,MNG'], function () { //JS 7 PRAK 3
        Route::get('/', [BarangController::class, 'index']);
        Route::post('/list', [BarangController::class, 'list']);
        Route::get('/create', [BarangController::class, 'create']);
        Route::post('/', [BarangController::class, 'store']);

        // AJAX routes for barang management
        Route::get('/create_ajax', [BarangController::class, 'create_ajax']);
        Route::post('/ajax', [BarangController::class, 'store_ajax']);
        Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);

        Route::get('/{id}', [BarangController::class, 'show']);
        Route::get('/{id}/edit', [BarangController::class, 'edit']);
        Route::put('/{id}', [BarangController::class, 'update']);
        Route::delete('/{id}', [BarangController::class, 'destroy']);
    });

    // Route untuk manajemen supplier
    Route::group(['prefix' => 'supplier', 'middleware' => 'authorize:ADM,MNG'], function () { //JS 7 PRAK 3
        Route::get('/', [SupplierController::class, 'index']);
        Route::post('/list', [SupplierController::class, 'list']);
        Route::get('/create', [SupplierController::class, 'create']);
        Route::post('/', [SupplierController::class, 'store']);

        // AJAX routes for supplier management
        Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);
        Route::post('/ajax', [SupplierController::class, 'store_ajax']);
        Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']);

        Route::get('/{id}', [SupplierController::class, 'show']);
        Route::get('/{id}/edit', [SupplierController::class, 'edit']);
        Route::put('/{id}', [SupplierController::class, 'update']);
        Route::delete('/{id}', [SupplierController::class, 'destroy']);
    });

    // Route untuk manajemen stok
    Route::group(['prefix'=> 'stok','middleware'=> 'authorize:ADM,MNG,STF'], function(){
        Route::get('/', [StokController::class, 'index']);          //menampilkan halaman awal Stok
        Route::post('/list', [StokController::class, 'list']);      //menampilkan data Stok dalam bentuk json untuk datatables
        Route::get('/create', [StokController::class, 'create']);   //menammpilkan halaman form tambah Stok
        Route::post('/', [StokController::class, 'store']);         //menyimpan data Stok baru
            
        Route::get('/create_ajax', [StokController::class, 'create_ajax']);  //menampilkan halaman form tambah Stok Ajax
        Route::post('/ajax', [StokController::class, 'store_ajax']);         //menyimpan data Stok baru Ajax
        Route::get('/{id}/edit_ajax', [StokController::class, 'edit_ajax']);  //menampilkan halaman form edit Stok Ajax
        Route::put('/{id}/update_ajax', [StokController::class, 'update_ajax']);  //Menyimpan halaman form edit Stok Ajax
        Route::get('/{id}/delete_ajax', [StokController::class, 'confirm_ajax']);  //tampilan form confirm delete Stok Ajax
        Route::delete('/{id}/delete_ajax', [StokController::class, 'delete_ajax']); //menghapus data Stok Ajax
        
        Route::get('/{id}', [StokController::class, 'show']);       //menampilkan detail Stok
        Route::get('/{id}/edit', [StokController::class, 'edit']);  //menampilkan halaman form detail Stok
        Route::put('/{id}', [StokController::class, 'update']);     //menyimpan perubahan data Stok
        Route::delete('/{id}', [StokController::class, 'destroy']); //menghapus data Stok 
    });
        
    // Route untuk manajemen penjualan 
    Route::group(['prefix'=> 'penjualan','middleware'=> 'authorize:ADM,MNG,STF'], function(){
        Route::get('/', [PenjualanController::class, 'index']);          //menampilkan halaman awal Penjualan
        Route::post('/list', [PenjualanController::class, 'list']);      //menampilkan data Penjualan dalam bentuk json untuk datatables
        Route::get('/create', [PenjualanController::class, 'create']);   //menammpilkan halaman form tambah Penjualan
        Route::post('/', [PenjualanController::class, 'store']);         //menyimpan data Penjualan baru
            
        Route::get('/create_ajax', [PenjualanController::class, 'create_ajax']);  //menampilkan halaman form tambah Penjualan Ajax
        Route::post('/ajax', [PenjualanController::class, 'store_ajax']);         //menyimpan data Penjualan baru Ajax
        Route::get('/{id}/edit_ajax', [PenjualanController::class, 'edit_ajax']);  //menampilkan halaman form edit Penjualan Ajax
        Route::put('/{id}/update_ajax', [PenjualanController::class, 'update_ajax']);  //Menyimpan halaman form edit Penjualan Ajax
        Route::get('/{id}/delete_ajax', [PenjualanController::class, 'confirm_ajax']);  //tampilan form confirm delete Penjualan Ajax
        Route::delete('/{id}/delete_ajax', [PenjualanController::class, 'delete_ajax']); //menghapus data Penjualan Ajax
        
        Route::get('/{id}', [PenjualanController::class, 'show']);       //menampilkan detail Penjualan
        Route::get('/{id}/edit', [PenjualanController::class, 'edit']);  //menampilkan halaman form detail Penjualan
        Route::put('/{id}', [PenjualanController::class, 'update']);     //menyimpan perubahan data Penjualan
        Route::delete('/{id}', [PenjualanController::class, 'destroy']); //menghapus data Penjualan                   
        });    
    });
