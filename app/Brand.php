<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table        =   'brand';

    protected $primaryKey   =   'brand_id';

    public static function verify_brand($id =   NULL){

        $count      =   Brand::where('brand_id','=',$id)->count();

        if($count       ==  1){
            return true;
        }else{
            return false;
        }
    }
}
