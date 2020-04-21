<?php

namespace App;

use App\User;

use App\Chapter;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = ['title', 'description'];
    protected $casts = ["genres" => "array"];
    
    public function user(){
        return $this->belongsTo("App/User");
    }
    public function chapters()
    {
        return $this->hasMany('App\Chapter');
    }
}
