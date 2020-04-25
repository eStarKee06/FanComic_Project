<?php

namespace App;
use App\Work;
use App\Pages;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = ['chapter_title'];
    public function work(){
        return $this->belongsTo("App/Work");
    }

    public function pages()
    {
        return $this->hasMany('App\Pages');
    }
}
