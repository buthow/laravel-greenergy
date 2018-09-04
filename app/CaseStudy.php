<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseStudy extends Model
{
    protected $table        =   "casestudy";

    protected $primaryKey   =   "case_id";

    public static function verify_case($id    =   NULL){

        $count      =   CaseStudy::where('case_id','=',$id)->count();

        if ($count  ==  1){
            return true;
        }else{
            return false;
        }

    }
}
