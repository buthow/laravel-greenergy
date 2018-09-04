<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table        =   'product';

    protected $primaryKey   =   'product_id';

    public static function verify_product($id   =   NULL){

        $count      =   Product::where('product_id','=',$id)->count();

        if ($count  ==  1){
            return true;
        }else{
            return false;
        }

    }

}
