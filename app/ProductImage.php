<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table        =   "product_image";

//    For 12m/m2m tables
//    must be null
    protected $primaryKey   =   null;


//    For tables with no pk
    public $incrementing    =   false;

}
