<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    const VERIFIED_USER='1';
    const UNVERIFIED_USER='0';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='users';
    protected $fillable = [
        'id','name', 'email','password'
        ,'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];
    public static function getverificationtoken()
    {
        return str_random(40);
    }
}


//namespace App;
//
//use Laravel\Passport\HasApiTokens;
//
//use Illuminate\Notifications\Notifiable;
//
//use Illuminate\Foundation\Auth\User as Authenticatable;
//
//
//
//class User extends Authenticatable
//
//{
//
//    use HasApiTokens, Notifiable;
//
//
//
//    /**
//
//     * The attributes that are mass assignable.
//
//     *
//
//     * @var array
//
//     */
//
//    protected $fillable = [
//
//        'name', 'email', 'password',
//
//    ];
//
//
//
//    /**
//
//     * The attributes that should be hidden for arrays.
//
//     *
//
//     * @var array
//
//     */
//
//    protected $hidden = [
//
//        'password', 'remember_token',
//
//    ];
//
//}
