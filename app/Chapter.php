<?php

namespace App;
use App\Work;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    public function work(){
        return $this->belongsTo("App/Work");
    }
}
