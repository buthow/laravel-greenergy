<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table        =   'contact';

    protected $primaryKey   =   'contact_id';

    public static function verify_contact($id   =   NULL){

        $count  =   Contact::where('contact_id','=',$id)->count();

        if ($count == 1){
            return true;
        }else{
            return false;
        }
    }

}
