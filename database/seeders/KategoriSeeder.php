<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
        [
            'kategori_id' => '1', 
            'kategori_kode' => 'CAT01', 
            'kategori_nama' => 'Food'
        ],
        [
            'kategori_id' => '2', 
            'kategori_kode' => 'CAT02', 
            'kategori_nama' => 'Beverage'
        ],
        [
            'kategori_id' => '3', 
            'kategori_kode' => 'CAT03', 
            'kategori_nama' => 'Beauty'
        ],
        [
            'kategori_id' => '4', 
            'kategori_kode' => 'CAT04', 
            'kategori_nama' => 'Baby'
        ],
        [
            'kategori_id' => '5', 
            'kategori_kode' => 'CAT05', 
            'kategori_nama' => 'Homecare'
        ],
        ];
        DB::table('m_kategori')->insert($data);
    }
}
