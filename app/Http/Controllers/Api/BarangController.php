<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarangModel;

class BarangController extends Controller
{
    public function index()
    {
        // Menampilkan semua barang
        return BarangModel::all();
    }

    public function store(Request $request)
    {
        // Menyimpan barang baru
        $barang = BarangModel::create($request->all());
        return response()->json($barang, 201);
    }

    public function show(BarangModel $barang)
    {
        // Menampilkan barang berdasarkan ID
        return BarangModel::find($barang->barang_id);
    }

    public function update(Request $request, BarangModel $barang)
    {
        // Mengupdate barang berdasarkan ID
        $barang->update($request->all());
        return BarangModel::find($barang->barang_id);
    }

    public function destroy(BarangModel $barang)
    {
        // Menghapus barang berdasarkan ID
        $barang->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}
