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
        if ( $this->checkEmptiness($request["username"], $request["email"], $request["password"]) ) {
            //error
            return 0;
        }

        if( $this->checkUniqueness($request["username"], $request["email"]) ) {
            //error
            return 0;
        }  

        $user = new User();
        $user->username = $request["username"];
        $user->email = $request["email"];
        $user->password = AuthCheck::hashPassword($request["password"]);
        $user->hash = AuthCheck::uniqueUserHash();
        $user->save();

        AuthCheck::sendVerificationEmail($user->email, $user->hash);

        //$this->setSession($request, $user);

        //return ["redirect" => "/explore/index"];
        
        return redirect('profile');
    }

    public function show(Request $request){
        //$user = User::where('username', $request['username'])->where('password', AuthCheck::hashPassword($request['password']))->get();
        $user = User::where('username', $request['username'])->get();
        if(count($user) == 1){ //username must be unique
            $user = $user[0];
            if(AuthCheck::checkPassword($request['password'], $user->password)){
                if(!($user->active)){
                    AuthCheck::sendVerificationEmail($user->email, $user->hash);
                }
                else{
                    Sessions::setUserSession($user->id);
                }
            }
        }
        
        return redirect('profile');

        //return ["redirect" => "/explore/index"];
    }

    public function signOut(Request $request){
        Sessions::deleteSession();
        return redirect("/");
    }


    //----------------------helper functions--------------------------------
    public function checkUniqueness(string $username, string $email){
        $userNameCheck = null;
        $emailCheck = null;
        $userNameCheck = User::where('username', $username)->get();
        $emailCheck = User::where('email', $email)->get();
        
        if( $userNameCheck != null || $emailCheck != null){
            return false;
        }
        return true;
    }

    public function checkEmptiness(string $username, string $email, string $password){
        if( $username == "" || $email == "" || $password == "" ){
            return true;
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
