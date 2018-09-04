<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $table        =   'quote';

    protected $primaryKey   =   'quote_id';

    public static function verify_quote($id = NULL){

        $count  =   Quote::where('quote_id','=',$id)->count();

        if ($count == 1){
            return true;
        }else{
            return false;
        }

    }

}
