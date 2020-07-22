<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Http\AuthSys\AuthCheck;

use App\Http\AuthSys\Sessions;

class UserController extends BaseController
{

    //-------------helperfunctions-------------------------        
    /*public function setSession(Request $request, User $user){
        $request->session()->put("USER", $user);
    }*/

    public function store(Request $request){
        if( $this->checkNotUnique($request["username"], $request["email"]) ) {
            return "AUTH_ERR_NOT_UNIQUE";
        }  
        $user = new User();
        $user->username = $request["username"];
        $user->email = $request["email"];
        $user->password = AuthCheck::hashPassword($request["password"]);
        //str_replace ('/', '', Hash::make($data["email"])));
        $user->hash = AuthCheck::uniqueUserHash();
        $user->hash = str_replace ('.', '', AuthCheck::uniqueUserHash());
        $user->hash = str_replace ('/', '', AuthCheck::uniqueUserHash());
        $user->save();

        AuthCheck::sendVerificationEmail($user->email, $user->hash);
        
        return "SUCCESS";
    }

    public function show(Request $request){
        $user = User::where('username', $request['username'])->get();
        if(count($user) == 1){ //username must be unique
            $user = $user[0];
            if(AuthCheck::checkPassword($request['password'], $user->password)){
                if(!($user->active)){
                    AuthCheck::sendVerificationEmail($user->email, $user->hash);
                    return "AUTH_ERR_VER";
                }
                else{
                    Sessions::setUserSession($user->id);
                    return "/profile";
                }
            }
            else{
                return "AUTH_ERR";
            }
        }
        else{
            return "AUTH_ERR";
        }
    }

    public function signOut(Request $request){
        Sessions::deleteSession();
        return redirect("/");
    }

    //----------------------helper functions--------------------------------
    public function checkNotUnique(string $username, string $email){
        $userNameCheck = User::where('username', $username)->get();
        $emailCheck = User::where('email', $email)->get();
        if( count($userNameCheck) != 0 || count($emailCheck) != 0){
            return true; //not unique
        }
        return false;
    }

    public function verifyUser($id){
        $user = User::where("hash", $id)->get();
        $user[0]->update(["active" => true]);
        $user_id = $user[0]->id;
        Sessions::setUserSession($user_id);
        return redirect("/profile");
    }

    public function sessionExists(){
        return Sessions::userSessionIsSet();
        //return Sessions::getUserSession();
    }
}
