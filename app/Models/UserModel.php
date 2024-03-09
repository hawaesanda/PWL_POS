<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user'; //mendefinisikan nama table yang digunakan oleh model
    protected $primaryKey = 'user_id'; //mendefinisikan primary key dari tabel yang digunakan
    
    //Jobsheet4 P1
    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = ['level_id', 'username', 'nama', 'password'];

    public function level(): BelongsTo
    {
        return $this->belongsTo(levelModel::class, 'level_id', "level_id");
    }
}
//3. When running localhost/PWL_POS/public/user the web page will display the user data entered, namely 'manager_two' as well as the database will increase by 1 row.
//6. An error 'SQLSTATE[HY000]: General error: 1364 The 'password' field has no default value' This is because in the UserModel, the password field is not populated with a default value and is not considered a mass assignable field.