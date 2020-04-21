<?php

namespace App;
use App\Work;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = ['chapter_title'];
    protected $casts = ["images" => "array"];
    public function work(){
        return $this->belongsTo("App/Work");
    }
}
