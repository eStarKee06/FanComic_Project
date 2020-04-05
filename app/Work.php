<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = ['title', 'description', 'genre'];
    public function user(){
        return $this->belongsTo("App/User");
    }
}
