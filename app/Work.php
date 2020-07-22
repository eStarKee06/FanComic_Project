<?php

namespace App;

use App\User;

use App\Chapter;
use App\Genres;
use App\Ratings;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = ['title', 'description'];
    protected $casts = ["genres" => "array"];
    
    public function user(){
        return $this->belongsTo("App/User");
    }

    public function rating(){
        return $this->belongsTo("App/Ratings");
    }
    
    public function chapters()
    {
        return $this->hasMany('App\Chapter');
    }

    public function genres()
    {
        return $this->hasMany('App\Genres');
    }
}
