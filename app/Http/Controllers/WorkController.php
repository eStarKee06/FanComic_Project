<?php

namespace App\Http\Controllers;
use App\User;
use App\Work;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class WorkController extends BaseController
{

    //-------------helperfunctions-------------------------        
    public function store(Request $request){
        $work = new Work();
        $work->title = $request["title"];
        $work->description = $request["description"];
        $work->genre = $request["genre"];
        echo($request->session()->get("USER"));
        $work->user_id = ($request->session()->get("USER")["id"]);
        $work->save();

        return redirect("works");
        //$this->index();
    }

    public function index(){
        return(Work::all());
    }

    public function show($id){
        print(Work::where("id", (int)$id)->get());
    }

    
    public function edit($id, Request $request){
        //not working because $id is not getting registered right now
        $work = Work::find((int)$id)->update(["title" => $request["title"], 
        "description" => $request["description"], "genre" => $request["genre"]]);
    }
}
