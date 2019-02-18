<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getAllUsers() {

        return DB::table('users')->get();
    }

    public  static function changeUser($email, $phone, $role) {

        DB::table('users')->update([
            'phone'=>$phone, 'email'=>$email, 'role'=>$role
        ]);

        return true;
    }
}
