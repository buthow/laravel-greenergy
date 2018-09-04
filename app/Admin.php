<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

//
class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table    =   "admin";

    protected $primaryKey   =   "admin_id";

    public static function verify_admin($id =   null){
        $count      =   Admin::where('admin_id','=',$id)->count();
        if($count   ==  1){
            return true;
        }else{
            return false;
        }
    }

}

