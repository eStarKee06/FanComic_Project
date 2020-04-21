<?php

namespace App\Http\Controllers;
use App\User;
use App\Work;


use App\Http\AuthSys\Sessions;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class WorkController extends BaseController
{
     
    public function store(Request $request){
        $work = new Work();
        $work->title = $request["title"];
        $work->description = $request["description"];
        $work->genres = serialize($request["genres"]);
        $work->rating = $request["rating"];
        echo($request->session()->get("USER"));
        $work->user_id = (Sessions::getUserSession());
        $work->save();

        return redirect("works");
        //$this->index();
    }

    public function index(){
        return Work::all();
    }

    public function show($id){
        return Work::where("id", (int)$id)->get();
    }

    
    public function edit($id, Request $request){
        print($request);
        $work = Work::find((int)$id)->update(["title" => $request["title"], 
        "description" => $request["description"], "genre" => $request["genre"]]);
    }

    //-------------------------------------------------------------
    public function showByUser($user_id){
        $workList = Work::where("user_id", $user_id)->get();
        
        for($i=0; $i < count($workList) ; $i++){
            $workList[$i]->genres = unserialize($workList[$i]->genres);
        }
        
        return $workList;
    }
}
