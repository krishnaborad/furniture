<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table="category";
    // protected $primaryKey = 'id';

    public function company()
    {

        return $this->hasOne('App\company','id','company_id');
    

    }
}
