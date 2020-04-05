<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Work;
class User extends Model
{
    //ctor to recreate user object when we pull from DB
    public function works()
    {
        return $this->hasMany('App\Work');
    }

}
