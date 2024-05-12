<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as UserAuthenticate;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable implements JWTSubject
{
    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [];
    }

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
    protected $fillable = ['username','nama','level_id', 'password'];
}
// class UserModel extends UserAuthenticate
// {
//     use HasFactory;

//     protected $table = 'm_user'; //mendefinisikan nama table yang digunakan oleh model
//     protected $primaryKey = 'user_id'; //mendefinisikan primary key dari tabel yang digunakan
    
//     //Jobsheet4 P1
//     /**
//      * The attributes that are mass assignable
//      * 
//      * @var array
//      */
//     protected $fillable = ['level_id', 'username', 'nama', 'password'];

//     public function level(): BelongsTo
//     {
//         return $this->belongsTo(levelModel::class, 'level_id', "level_id");
//     }
// }

