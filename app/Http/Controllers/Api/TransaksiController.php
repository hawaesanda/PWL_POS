<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarangModel;
use App\Models\TransaksiDetailModel;
use App\Models\TransaksiModel;

class TransaksiController extends Controller
{
    public function index()
    {
        return TransaksiDetailModel::with(['penjualan', 'barang'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'pembeli' => 'required|string|max:100',
            'penjualan_kode' => 'required|string|max:8|unique:t_penjualan,penjualan_kode',
            'barang_id' => 'required|integer',
            'jumlah' => 'required|integer'
        ]);

        $transaksi = TransaksiModel::create([
            'user_id' => $request->user_id,
            'pembeli' => $request->pembeli,
            'penjualan_kode' => $request->penjualan_kode,
            'barang_id' => $request->barang_id,
            'penjualan_tanggal' => now()
        ]);

        // dd($transaksi);
        $barang = BarangModel::find($request->barang_id);

        $transaksiDetail = TransaksiDetailModel::create([
            'penjualan_id' => $transaksi->penjualan_id,
            'barang_id' => $request->barang_id,
            'harga' => $barang->harga_jual,
            'jumlah' => $request->jumlah
        ]);

        return response()->json($transaksiDetail, 201);
    }

    public function show(TransaksiModel $transaksi)
    {
        $transaksi = TransaksiModel::find($transaksi->penjualan_id);
        $transaksiDetail = TransaksiDetailModel::with('barang')->where('penjualan_id', '=', $transaksi->penjualan_id)->get();
        return response()->json([
            'Transaksi' => $transaksi,
            'Detail Transaksi' => $transaksiDetail,
        ]);
    }

    public function update(Request $request, TransaksiDetailModel $transaksiDetail)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'pembeli' => 'required|string|max:100',
            'penjualan_kode' => 'required|string|max:8|unique:t_penjualan,penjualan_kode'.$transaksiDetail->penjualan_id.',penjualan_id'
        ]);

        TransaksiModel::find($transaksiDetail->penjualan_id)->update([
            'user_id' => $request->user_id,
            'pembeli' => $request->pembeli,
        ]);

        BarangModel::find($request->barang_id);

        for($i=0; $i < $request->count; $i++)
        {
            TransaksiDetailModel::find($request->id[$i])->update([
                'barang_id' => $request->barang_id[$i],
                'jumlah' => $request->jumlah[$i]
            ]);
        }

        $penjualan = TransaksiModel::find($transaksiDetail->penjualan_id);

        $penjualanDetail = TransaksiDetailModel::with('barang')->where('penjualan_id', '=', $transaksiDetail->penjualan_id)->get();

        return response()->json([
            'Transaksi' => $penjualan,
            'Detail Transaksi' => $penjualanDetail,
        ]);
    }

    public function destroy(TransaksiDetailModel $transaksi)
    {
        $check = TransaksiModel::find($transaksi->penjualan_id);
        if(!$check) {  
            return redirect('/transaksi')->with('error', 'Data transaksi tidak ditemukan');
        }

        try {
            TransaksiDetailModel::where('penjualan_id', $check->penjualan_id)->delete(); 
            TransaksiModel::destroy($transaksi->penjualan_id); 

            return response()->json([
                'success' => true,
                'message' => 'Data terhapus',
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak terhapus karena foreign key',
            ]);
        }
    }
}