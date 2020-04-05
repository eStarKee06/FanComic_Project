<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{

    //-------------helperfunctions-------------------------        
    public function setSession(Request $request, User $user){
        $request->session()->put("USER", $user);
    }

    public function store(Request $request){
        $user = new User();
        $user->username = $request["username"];
        $user->email = $request["email"];
        $user->password = $request["password"];

        $user->save();
        $this->setSession($request, $user);

        return redirect("explore");
    }

    public function show(Request $request){
        $user = User::where('username', $request['username'])->where('password', $request['password'])->get();
        return redirect("explore");
    }

    public function signOut(Request $request){
        //use later
    }
}
