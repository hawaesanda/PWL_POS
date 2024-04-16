<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\DataTables\UserDataTable;
use Illuminate\Http\RedirectResponse;
use Yajra\DataTables\Facades\DataTables;


class UserController extends Controller
{
    //Menampilkan halaman awal user
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar User',
            'list' => ['Home', 'User']
        ];

        $page = (object) [
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];

        $actiiveMenu = 'user'; //set menu yang sedang aktif

        $level = LevelModel::all(); //ambil data level untuk filter level

        return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $actiiveMenu]);
    }

    public function list(Request $request)
    {
        $users = UserModel::select('user_id', 'username', 'nama', 'level_id') -> with('level');

        //filter data user berdasarkan level_id
        if ($request->level_id) {
            $users->where('level_id', $request->level_id);
        }

        return DataTables::of($users)
        ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
        ->addColumn('action', function ($user) { //add action column
            $btn = '<a href="'.url('/user/' . $user->user_id).'" class="btn btn-info btn-sm">Detail</a> ';
            $btn .= '<a href="' . url('/user/' . $user->user_id . '/edit' ) . '" class="btn btn-warning btn-sm">Edit</a> ';
            $btn .= '<form class="d-inline-block" method="POST" action="'. url('/user/'.$user->user_id).'">'
            .csrf_field() . method_field('DELETE') .
            '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure to delete this data?\');">Delete</button></form>';
            return $btn;
        })
        ->rawColumns(['action']) // tells that the action is html
        ->make(true);
    }
    
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah User',
            'list' => ['Home', 'User', 'Tambah']
        ];

        $page =(object) [
            'title' => 'Tambah user baru'
        ];

        $level = LevelModel::all(); //ambil data level untuk ditampilkan di form
        $activeMenu ='user'; //set menu yang sedang aktif

        return view('user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            //username harus diisi, berupa string, minimal 3 karakter, dan bernilai unik di tabel m_user kolom username
            'username' => 'required|string|min:3|unique:m_user,username',
            'nama' => 'required|string|max:100',
            'password' => 'required|min:5',
            'level_id' => 'required|integer'
        ]);

        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password), //password dienkripsi sebelumdisimpan
            'level_id' => $request->level_id
        ]);

        return redirect('/user')->with('success', 'Data user berhasil disimpan');
    }

    public function show(string $id)
    {
        $user = UserModel::with('level')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail User',
            'list' => ['Home', 'User', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail User'
        ];

        $activeMenu = 'user';

        return view('user.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function edit(string $id)
    {
    $user = UserModel::find($id);
    $level = LevelModel::all();
    $breadcrumb = (object)[
        'title' => 'Edit User',
        'list' => ['Home', 'User', 'Edit']
    ];

    $activeMenu = 'user'; //set menu yang sedang aktif
    $page = (object)['title' => 'Edit User']; // Inisialisasi $page dengan judul yang sesuai

    return view('user.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'username'  => 'required|string|min:3|unique:m_user,username,'.$id.',user_id',
            'nama'      => 'required|string|max:500',
            'password'  => 'nullable|min:5',
            'level_id'  => 'required|integer'
        ]);

        UserModel::find($id)->update([
            'username'  => $request->username,
            'nama'      => $request->nama,
            'password'  => $request->password ? bcrypt($request->password) : UserModel::find($id)->password,
            'level_id'  => $request->level_id
        ]);

        return redirect('/user')->with('success', 'Data user berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check = UserModel::find($id);
        if (!$check){
            return redirect('/user')->with('eror', 'Data user tidak ditemukan');
        }

        try{
            UserModel::destroy($id);
            return redirect('/user')->with('success', 'Data user berhasil dihapus');
        }catch(\Illuminate\Database\QueryException $e){
            //Jika terjadi eror ketika menghapus data, redirect kembali ke halaman dnegan membawa pesan eror
            return redirect('/user')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

    // public function index()
    // {
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
        // $user = UserModel::firstOrNew(
        //     [
        //         'username' =>'manager33',
        //         'nama' => 'Manager Tiga Tiga',
        //         'password' => Hash::make('12345');
        //         'level_id' => 2
        //     ],
        // );
        // $user->save();
        // return view('user', ['data' => $user]);
//2. In step 1, the code is used to create new user data in the database using the firstOrCreate method. 
//5. In this case, create new data in database that is username 'manager22', name 'Manager Dua Dua', level_id '2'.
//7. The firstOrNew method retrieves the data you want to search if the data you are looking for is in the database then the results you are looking for will be displayed.
//9. In step 8, the database does not display the new data results because the inputted data has not been saved.
//11. In step 10, the database displays the new data results because the inputted data has been saved by the save() method.
    
    //J4 Practicum 2.5
    // $user = UserModel::create([
    //     'username' => 'manager11',
    //     'nama' => 'Manager11',
    //     'password' => Hash::make('12345'),
    //     'level_id' => 2,
    // ]);

    // $user->username = 'manager12';

    // $user->isDirty(); //true
    // $user->isDirty('username'); //true
    // $user->isDirty('nama'); //false
    // $user->isDirty(['nama', 'username']); //true

    // $user->isClean(); //false
    // $user->isClean('username'); //false
    // $user->isClean('nama'); //true
    // $user->isClean(['nama', 'username']); //false

    // $user->save();

    // $user->isDirty(); //false
    // $user->isClean(); //true
    // dd($user->isDirty());

    // $user->wasChanged(); //true
    // $user->wasChanged('username');//true
    // $user->wasChanged(['username', 'level_id']);//true
    // $user->wasChanged('nama'); //false
    // dd($user->wasChanged(['nama', 'username']));//true
//2. In step 1, the result of $user->isDirty() returning false indicates that no changes were detected in the $user model after the save() method call.
//4. In step 2, the result is true because the $user->wasChanged() method is useful for checking whether any changes have been made to the model after a save operation has been performed, and can be used to perform validation or other operations based on those changes.
    //J4 Practicum 2.7
    // $user = UserModel::with('level')->get();
    // // dd($user);
    // return view('user', ['data' => $user]);

    // //J4 Practicum 2.6
    // $user = UserModel::all();
    // return view('user', ['data'=>$user]);
    
    // }
    // public function tambah()
    // {
    //     return view('user_tambah');
    // }
    
    // public function tambahSimpan(Request $request){
    //     UserModel::create([
    //         'username' => $request->username,
    //         'nama' => $request->nama,
    //         'password' => Hash::make($request->password),
    //         'level_id' => $request->level_id 
    //     ]);
    //     return redirect('/user');
    // }

    // public function ubah($id)
    // {
    //     $user = UserModel::find($id);
    //     return view('user_ubah', ['data'=>$user]);
    // }


    // public function ubah_simpan($id, Request $request){
    //     $user = UserModel::find($id);

    //     $user->username = $request->username;
    //     $user->nama = $request->nama;
    //     $user->level_id = $request->level_id;

    //     $user->save();
    //     return redirect('/user');
    // }
    // public function hapus($id)
    // {
    //     $user = UserModel::find($id);
    //     $user->delete();

    //     return redirect('/user');
    // }
//4. The webpage will load the user data from the database and display the 'Add User' link that leads to the 'user/add' route and 'Delete' that leads to the '/user/delete' route.
//8. The web page shows an error because Route [/user/add_save] not defined.
//11. When you click '+add user', the web page will load the add user form and you can fill in the form and click the 'save' button to save it.
//14. The web page will be show 'Form Ubah Data User' when cliking 'Change' button.
//17. When clicking the 'Change' button, the data will change.
//19. When clicking the 'Hapus' button, the selected data will be deleted
    // public function index(UserDataTable $dataTable){
    //     return $dataTable->render('user.index');
    // }
    // public function create(){
    //     return view('user.create');
    // }
    // public function tambah_simpan(Request $request): RedirectResponse{
    //     // UserModel::create
    //     $validated= $request->validate([
    //         // 'username' => $request->username,
    //         // 'nama' => $request->nama,
    //         // 'level_id' => $request->level_id,
    //         // 'password' => Hash::make($request->password)
    //         'username'=>'required',
    //         'nama'=>'required',
    //         'level_id'=>'required',
    //         'password'=>'required'
    //     ]);

    //     return redirect('/user');
    // }
    // public function ubah($id)
    // {
    //     $user = UserModel::find($id);
    //     return view('user_ubah', ['data'=>$user]);
    // }
    // public function ubah_simpan($id, Request $request){
    //     $user = UserModel::find($id);

    //     $user->username = $request->username;
    //     $user->nama = $request->nama;
    //     $user->level_id = $request->level_id;

    //     $user->save();
    //     return redirect('/user');
    // }
    // public function hapus($id)
    // {
    //     $user = UserModel::find($id);
    //     $user->delete();

    //     return redirect('/user');
    // }

}