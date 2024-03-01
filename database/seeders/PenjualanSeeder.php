<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //define 10 item stok 
        $data = [];

        //define datetime stok
        $datetime = Carbon::now();

        //generate random stok setiap barang
        $userID = DB::table('m_user')->pluck('user_id')->toArray();

        for ($i = 0; $i < 10; $i++){
            $data[] = [
                'user_id' => $userID[array_rand($userID)],
                'pembeli' => 'Pembeli ke-'. ($i+1),
                'penjualan_kode' => 'PJ-'.str_pad($i + 1, 3, '0', STR_PAD_LEFT),
                'penjualan_tanggal' => $datetime
            ];
        }
        DB::table('t_penjualan')->insert($data);       
    }
}
