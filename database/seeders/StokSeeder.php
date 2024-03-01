<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //define date time now
        $datetime = Carbon::now();

        $data = [
            [
                'barang_id' => '1',
                'user_id' => '1',
                'stok_tanggal' => $datetime,
                'stok_jumlah' => rand(0, 100) //random jumlah stok dari 0-100
            ],
            [
                'barang_id' => '2',
                'user_id' => '1',
                'stok_tanggal' => $datetime,
                'stok_jumlah' => rand(0, 100) //random jumlah stok dari 0-100
            ],
            [
                'barang_id' => '3',
                'user_id' => '1',
                'stok_tanggal' => $datetime,
                'stok_jumlah' => rand(0, 100) //random jumlah stok dari 0-100
            ],
            [
                'barang_id' => '4',
                'user_id' => '2',
                'stok_tanggal' => $datetime,
                'stok_jumlah' => rand(0, 100) //random jumlah stok dari 0-100
            ],
            [
                'barang_id' => '5',
                'user_id' => '2',
                'stok_tanggal' => $datetime,
                'stok_jumlah' => rand(0, 100) //random jumlah stok dari 0-100
            ],
            [
                'barang_id' => '6',
                'user_id' => '2',
                'stok_tanggal' => $datetime,
                'stok_jumlah' => rand(0, 100) //random jumlah stok dari 0-100
            ],
            [
                'barang_id' => '7',
                'user_id' => '3',
                'stok_tanggal' => $datetime,
                'stok_jumlah' => rand(0, 100) //random jumlah stok dari 0-100
            ],
            [
                'barang_id' => '8',
                'user_id' => '3',
                'stok_tanggal' => $datetime,
                'stok_jumlah' => rand(0, 100) //random jumlah stok dari 0-100
            ],
            [
                'barang_id' => '9',
                'user_id' => '3',
                'stok_tanggal' => $datetime,
                'stok_jumlah' => rand(0, 100) //random jumlah stok dari 0-100
            ],
            [
                'barang_id' => '10',
                'user_id' => '1',
                'stok_tanggal' => $datetime,
                'stok_jumlah' => rand(0, 100) //random jumlah stok dari 0-100
            ],
        ];
        DB::table('t_stok')->insert($data);
    }
}
