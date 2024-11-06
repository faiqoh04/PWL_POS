<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LevelModel;

class LevelController extends Controller
{
    public function index()
    {
        // Menampilkan semua data level
        return LevelModel::all();
    }

    public function store(Request $request)
    {
        // Menyimpan level baru
        $level = LevelModel::create($request->all());
        return response()->json($level, 201);
    }

    public function show(LevelModel $level)
    {
        // Menampilkan level berdasarkan ID
        return $level;
    }

    public function update(Request $request, LevelModel $level)
    {
        // Mengupdate level berdasarkan ID
        $level->update($request->all());
        return $level;
    }

    public function destroy(LevelModel $level)
    {
        // Menghapus level berdasarkan ID
        $level->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data terhapus'
        ]);
    }
}
