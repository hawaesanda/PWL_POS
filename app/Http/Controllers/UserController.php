<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        //Jobsheet 3
        //tambah data user dengan Eloquent Model
        // $data = [
        //     'nama' => 'Pelanggan Pertama',
        // ];
        // UserModel::where('username', 'customer-1')->update($data); //update data user
        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 4
        // ];
        // UserModel::insert($data); //tambahkan data ke tabel m_user
        
        //Jobsheet4 practicum1
        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345')
        // ];
        // UserModel::create($data);
        
        //J4 practicum 2.1
        // $user = UserModel::find(1);
        // $user = UserModel::where('level_id', 1)->first();
        // $user = UserModel::firstWhere('level_id', 1);
        $user = UserModel::findOr(20, ['username', 'nama'], function (){
            abort(404);
        });
        return view('user', ['data' => $user]);
    }
}
//3. In step 1 using the find method ($user = UserModel::find(1);) it will retrieve a specific primary key record in the case of the code retrieving the m_user data with primary key value 1.
//5. In step 4 using the first method ($user = UserModel::where('level_id', 1)->first();) it will retrieve records based on level_id in the case that the code retrieves m_user data with level_id value 1.
//7. In step 6 using the firstWhere method ($user = UserModel::firstWhere('level_id', 1);) Similar to before, the code will retrieve records based on certain criteria, in this case the code retrieves m_user data with level_id worth 1.
//9. As a result a record with primary key 1 is found, the $user variable will contain that record and the 'user' page will be displayed with that data. However, if there is no record with primary key 1, a 404 error page will be displayed.
//11. The result is 'page not found 404' because there is no record with primary key 20.