<?php

use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\LevelController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\PenjualanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|---------------------------------------------------------------------------
| API Routes
|---------------------------------------------------------------------------
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Register route
Route::post('/register', RegisterController::class)->name('register');
Route::post('/register1', RegisterController::class)->name('register1');

// Login route
Route::post('/login', LoginController::class)->name('login');

// User info route (authenticated)
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Logout route (authenticated)
Route::post('/logout', LogoutController::class)->name('logout');

// Grouping routes for 'levels'
Route::group(['prefix' => 'levels'], function() {
    Route::get('/', [LevelController::class, 'index']);
    Route::post('/', [LevelController::class, 'store']);
    Route::get('/{level}', [LevelController::class, 'show']);
    Route::put('/{level}', [LevelController::class, 'update']);
    Route::delete('/{level}', [LevelController::class, 'destroy']);
});

// Grouping routes for 'users'
Route::group(['prefix' => 'users'], function() {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{user}', [UserController::class, 'show']);
    Route::put('/{user}', [UserController::class, 'update']);
    Route::delete('/{user}', [UserController::class, 'destroy']);
});

// Grouping routes for 'kategori'
Route::group(['prefix' => 'kategori'], function() {
    Route::get('/', [KategoriController::class, 'index']);
    Route::post('/', [KategoriController::class, 'store']);
    Route::get('/{kategori}', [KategoriController::class, 'show']);
    Route::put('/{kategori}', [KategoriController::class, 'update']);
    Route::delete('/{kategori}', [KategoriController::class, 'destroy']);
});

// Grouping routes for 'barang'
Route::group(['prefix' => 'barang'], function() {
    Route::get('/', [BarangController::class, 'index']);
    Route::post('/', [BarangController::class, 'store']);
    Route::get('/{barang}', [BarangController::class, 'show']);
    Route::put('/{barang}', [BarangController::class, 'update']);
    Route::delete('/{barang}', [BarangController::class, 'destroy']);
});

// penjualan
Route::post('penjualan', [PenjualanController::class, 'store']);
Route::get('penjualan/{penjualan}', [PenjualanController::class, 'show']);
