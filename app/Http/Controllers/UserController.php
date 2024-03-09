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
        // $user = UserModel::findOr(20, ['username', 'nama'], function (){
        //     abort(404);
        // });
//3. In step 1 using the find method ($user = UserModel::find(1);) it will retrieve a specific primary key record in the case of the code retrieving the m_user data with primary key value 1.
//5. In step 4 using the first method ($user = UserModel::where('level_id', 1)->first();) it will retrieve records based on level_id in the case that the code retrieves m_user data with level_id value 1.
//7. In step 6 using the firstWhere method ($user = UserModel::firstWhere('level_id', 1);) Similar to before, the code will retrieve records based on certain criteria, in this case the code retrieves m_user data with level_id worth 1.
//9. As a result a record with primary key 1 is found, the $user variable will contain that record and the 'user' page will be displayed with that data. However, if there is no record with primary key 1, a 404 error page will be displayed.
//11. The result is 'page not found 404' because there is no record with primary key 20.

        //J4 Practicum 2.2
        // $user = UserModel::findOrFail(1);
        // $user = UserModel::where('username', 'manager9')->firstOrFail();
//2. In step 1 the FindOrFail method searches for records based on a specific primary key, if the record is not found it will throw a ModelNotFoundException exception. In this case, the record is found, resulting in user data based on the primary key searched.
//4. There are no records with the data 'manager9' the result is page not found

        //J4 Practicum 2.3
        // $user = UserModel::where('level_id', 2)->count();
        // dd($user);
//2. When running the code web page will be appear '2 // app\Http\Controllers\UserController.php:50'. This code will count the number of users who have a level_id equal to 2, print the value for debugging, and then render the 'user' view with the user count data.

        //J4 Practicum 2.4
        // $user = UserModel::firstOrCreate(
        //     [
        //         'username' => 'manager22',
        //         'nama' => 'Manager Dua Dua',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );
        $user = UserModel::firstOrNew(
            [
                'username' =>'manager33',
                'nama' => 'Manager Tiga Tiga',
                // 'password' => Hash::make('12345'),
                'level_id' => 2
            ],
        );
        $user->password = Hash::make('12345');
        $user->save();
//2. In step 1, the code is used to create new user data in the database using the firstOrCreate method. 
//5. In this case, create new data in database that is username 'manager22', name 'Manager Dua Dua', level_id '2'.
//7. The firstOrNew method retrieves the data you want to search if the data you are looking for is in the database then the results you are looking for will be displayed.
//9. In step 8, the database does not display the new data results because the inputted data has not been saved.
//11. In step 10, the database displays the new data results because the inputted data has been saved by the save() method.
        return view('user', ['data' => $user]);
    }
}
