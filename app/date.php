<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class date extends Model
{
    protected $table="date";

    public function category()
    {

        return $this->hasOne('App\category','id','category_id');

    }

}
