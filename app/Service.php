<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table        =   'service';

    protected $primaryKey   =   'service_id';

    public static function verify_service($id   =   NULL){

        $count  =   Service::where('service_id','=',$id)->count();

        if ($count == 1){
            return true;
        }else{
            return false;
        }
    }
}
