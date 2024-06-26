<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiModel;
use App\Models\UserModel;
use App\Models\BarangModel;
use Yajra\DataTables\Facades\DataTables;

class TransaksiController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Transaksi',
            'list' => ['Home', 'Transaksi']
        ];

        $page = (object) [
            'title' => 'Daftar transaksi yang terdaftar dalam sistem'
        ];

        $activeMenu = 'transaksi';

        $user = UserModel::all();

        $pembeli = TransaksiModel::select('pembeli')->distinct()->get();

        return view('transaksi.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'pembeli' => $pembeli, 'activeMenu' => $activeMenu]);

    }
    public function show(string $id)
    {
        $transaksi = TransaksiModel::with('user')->find($id);
        $breadcrumb = (object) [
            'title' => 'Detail Transaksi',
            'list' => ['Home', 'Transaksi', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Transaksi'
        ];

        $activeMenu = 'transaksi';

        return view('transaksi.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'transaksi' => $transaksi, 'activeMenu' => $activeMenu]);
    }

    public function create(){
        $breadcrumb = (object) [
            'title' => 'Tambah Transaksi',
            'list' => ['Home', 'Transaksi', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah transaksi baru'
        ];

        $user = UserModel::all();
        $activeMenu = 'stok';

        return view('transaksi.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'pembeli' => 'required|string|max:50',
            'penjualan_kode' => 'required|string|max:20',
            'penjualan_tanggal' => 'required|date',
        ]);

        TransaksiModel::create([
            'user_id' => $request->user_id,
            'pembeli' => $request->pembeli,
            'penjualan_kode' => $request->penjualan_kode,
            'penjualan_tanggal' => $request->penjualan_tanggal,
        ]);

        return redirect('/transaksi')->with('success', 'Data transaksi berhasil disimpan');
    }

    public function edit(string $id)
    {
        $transaksi = TransaksiModel::find($id);
        $user = UserModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Transaksi',
            'list' => ['Home', 'Transaksi', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Transaksi'
        ];

        $activeMenu = 'transaksi';

        return view('transaksi.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'transaksi' => $transaksi, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'pembeli' => 'required|string|max:50',
            'penjualan_kode' => 'required|string|max:20',
            'penjualan_tanggal' => 'required|date'
        ]);

        TransaksiModel::find($id)->update([
            'user_id' => $request->user_id,
            'pembeli' => $request->pembeli,
            'penjualan_kode' => $request->penjualan_kode,
            'penjualan_tanggal' => $request->penjualan_tanggal,
        ]);

        return redirect('/transaksi')->with('success', 'Data stok berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check = TransaksiModel::find($id);
        if(!$check) {
            return redirect('/transaksi')->with('error', 'Data transaksi tidak ditemukan');
        }

        try {
            TransaksiModel::destroy($id);
            return redirect('/transaksi')->with('success', 'Data transaksi berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/transaksi')->with('error', 'Data transaksi gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

    public function list(Request $request)
    {
        $transaksis = TransaksiModel::with('user')
            ->select('penjualan_id', 'user_id', 'pembeli', 'penjualan_kode', 'penjualan_tanggal');

        if($request->nama_pembeli){
            $transaksis->where('pembeli', $request->nama_pembeli);
        }

        return DataTables::of($transaksis)
        ->addIndexColumn()
        ->addColumn('aksi', function ($transaksi) {
            $btn = '<a href="'.url('/transaksi/' . $transaksi->penjualan_id).'" class="btn btn-info btn-sm">Detail</a> ';
            $btn .= '<a href="' . url('/transaksi/'. $transaksi->penjualan_id. '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
            $btn .= '<form class="d-inline-block" method="POST" action="'. url('/transaksi/'.$transaksi->penjualan_id).'">'.
            csrf_field() . method_field('DELETE') .
            '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
            return $btn;
        })
        ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
        ->make(true);
    }

}