<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => '1',
                'barang_kode' => '001',
                'barang_nama' => 'Chicken Nugget',
                'harga_beli' => '29000',
                'harga_jual' => '30000'
            ],
            [
                'kategori_id' => '1',
                'barang_kode' => '002',
                'barang_nama' => 'Khong Guan',
                'harga_beli' => '89000',
                'harga_jual' => '90000'
            ],
            [
                'kategori_id' => '2',
                'barang_kode' => '003',
                'barang_nama' => 'Susu UHT Besar',
                'harga_beli' => '15000',
                'harga_jual' => '17000'
            ],
            [
                'kategori_id' => '2',
                'barang_kode' => '004',
                'barang_nama' => 'Juice Jumbo',
                'harga_beli' => '25000',
                'harga_jual' => '26000'
            ],
            [
                'kategori_id' => '3',
                'barang_kode' => '005',
                'barang_nama' => 'Compact Powder',
                'harga_beli' => '50000',
                'harga_jual' => '52000'
            ],
            [
                'kategori_id' => '3',
                'barang_kode' => '006',
                'barang_nama' => 'Blush On',
                'harga_beli' => '20000',
                'harga_jual' => '22000'
            ],
            [
                'kategori_id' => '4',
                'barang_kode' => '007',
                'barang_nama' => 'Minyak Telon',
                'harga_beli' => '28000',
                'harga_jual' => '30000'
            ],
            [
                'kategori_id' => '4',
                'barang_kode' => '008',
                'barang_nama' => 'Hair Lotion',
                'harga_beli' => '40000',
                'harga_jual' => '42000'
            ],
            [
                'kategori_id' => '5',
                'barang_kode' => '009',
                'barang_nama' => 'Deterjen',
                'harga_beli' => '9900',
                'harga_jual' => '11000'
            ],
            [
                'kategori_id' => '5',
                'barang_kode' => '010',
                'barang_nama' => 'Softener',
                'harga_beli' => '18000',
                'harga_jual' => '20000'
            ],
        ];
        DB::table('m_barang')->insert($data);
    }
}
