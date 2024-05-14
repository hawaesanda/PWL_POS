<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        return BarangModel::all();
    }
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'barang_kode' => 'required',
            'barang_nama' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required'
        ]);
        $barang = BarangModel::create($request->all());
        return response()->json($barang, 201);
    }
    public function show(string $barang_id)
    {
        return BarangModel::find($barang_id);
    }
    public function update(Request $request, BarangModel $barang)
    {
        $barang->update($request->all());
        return BarangModel::find($barang);
    }
    public function destroy(BarangModel $barang)
    {
        $barang->delete();
        return response()->json([
            'succsess' => true,
            'message' => 'Data barang terhapus',
        ]);
    }
}
