<?php

namespace App\Http\AuthSys;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;

class AuthCheck
{
    
    //ctor to recreate user object when we pull from DB
    public static function hashPassword(string $password)
    {
        $encryptedPassword = Hash::make($password);
        return $encryptedPassword;
    }

    public static function checkPassword(string $password, $dbPassword){
        return Hash::check($password, $dbPassword);
    }

    public static function uniqueUserHash(){
        $uniqueHash = Hash::make( (((rand() * 100) % rand()) + rand()) * (rand() % rand()) );
        return $uniqueHash;
    }

    public static function sendVerificationEmail(string $email, string $userHash){
        
        $msg = "click below to verify account \n http://localhost:8000/verify/".$userHash; // TODO: change this later
        $subject = "Verify Email";
        Mail::send('accountVerificationEmail', array('msg' => $msg), function ($message) use ($email, $subject)
        {

            $message->from('keeprogramtester@gmail.com', 'artWorkspace');

            $message->to($email)->subject($subject);

        });

    } 

}
