<?php

namespace App;
use App\Chapter;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $fillable = ['page_number'];
    public function chapter(){
        return $this->belongsTo("App/Chapter");
    }
}
