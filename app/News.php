<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table        =   "news";

    protected $primaryKey   =   "news_id";

    public static function verify_news($id    =   NULL){

        $count      =   News::where('news_id','=',$id)->count();

        if ($count  ==  1){
            return true;
        }else{
            return false;
        }

    }
}
