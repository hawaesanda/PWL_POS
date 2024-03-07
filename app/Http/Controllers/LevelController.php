<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index()
    {
        // DB::insert('insert into m_level(level_kode, level_nama, created_at) values(?,?,?)', ['CUS', 'Pelanggan', now()]);
        // return 'insert data baru berhasil';
//m_level table added 1 new data, namely level_code = CUS, level_name = Customer, created_at = now/day the data was inputted.

        // $row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
        // return 'Update data berhasil. Jumlah data yang diupdate: '. $row. 'baris';
//m_level table is updated on the new row inserted in step 3, namely level_name = Customer, level_code = CUS

        // $row = DB::delete('delete from m_level where level_kode = ?', ['CUS']);
        // return 'Delete data berhasil. JUmlah data yang dihapus: '. $row. ' baris';


        $data = DB::select('select * from m_level');
        return view('level', ['data' => $data]);
    } 
}


