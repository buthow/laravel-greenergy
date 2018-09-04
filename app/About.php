<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{

    protected $table    =   "about";

    protected $primaryKey   =   "about_id";

    public static function verify_about($id =   NULL){

        $count      =   About::where('about_id','=',$id)->count();

        if($count       ==  1){
            return true;
        }else{
            return false;
        }
    }

}
