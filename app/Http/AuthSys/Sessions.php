<?php

namespace App\Http\AuthSys;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Session;
class Sessions
{
    public static function setUserSession(String $id){
        Session::put("USER_ID", $id);
    }

    public static function getUserSession(){
        return Session::get("USER_ID");
    }

    public static function userSessionIsSet(){
        return(Session::has("USER_ID"));
    }

    public static function deleteSession(){
        Session::flush();
    }

}