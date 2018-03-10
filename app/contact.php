<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
        protected $table = 'contact';
        public $primaryKey = 'id';
        public $timestamps = true;
}
