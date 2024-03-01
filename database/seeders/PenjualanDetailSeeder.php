<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //define semua penjualan yang sudah ada
        $penjualans = DB::table('t_penjualan')->select('penjualan_id')->get();

        //generate detail penjualan
        foreach ($penjualans as $penjualan){
            //ambil 3 barang acak
            $barangs = DB::table('m_barang')->select('barang_id', 'harga_jual')->inRandomOrder()->limit(3)->get();

            //data detail penjualan
            $data = [];

            //generate informasi detail setiap barang
            foreach ($barangs as $barang){
                $data[] =[
                    'penjualan_id' => $penjualan->penjualan_id,
                    'barang_id' => $barang->barang_id,
                    'harga' => $barang->harga_jual,
                    'jumlah' => rand(1, 10)
                ];
            }
            DB::table('t_penjualan_detail')->insert($data);
        }
    }
}
