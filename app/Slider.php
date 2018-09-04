<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table        =   "slider";

    protected $primaryKey   =   "slider_id";

    public static function verify_slider($id    =   NULL){

        $count      =   Slider::where('slider_id','=',$id)->count();

        if ($count  ==  1){
            return true;
        }else{
            return false;
        }

    }

}
