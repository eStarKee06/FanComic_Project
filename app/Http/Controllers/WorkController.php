<?php

namespace App\Http\Controllers;
use App\User;
use App\Work;

use App\Genres;
use App\Ratings;


use App\Http\AuthSys\Sessions;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller as BaseController;

use App\Http\Controllers\PagesController;


class WorkController extends BaseController
{
     
    public function store(Request $request){
        $work = new Work();
        $work->title = $request["title"];
        $work->description = $request["description"];


        //$work->genres = serialize($request["genres"]);
        //$work->rating = $request["rating"];

        echo($request->session()->get("USER"));
        $work->user_id = (Sessions::getUserSession());

        $coverImagePath = $request->file('coverImage')->store("public/".$work->user_id."/".$work->title);
        $work->cover_image = $coverImagePath; 
        
        $work->num_of_chapters = 0; 

        $work->save();

        $rating = new Ratings();
        $rating->rating_title = $request["rating"];
        $rating->work_id = $work->id;
        $rating->save();

        $genresArr = json_decode($request["genres"]);
        for($i = 0; $i < count($genresArr); $i++){
            $genre = new Genres();
            $genre->genre_title = $genresArr[$i];
            $genre->work_id = $work->id;
            $genre->save();
        }

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
        $work = Work::find((int)$id)->update(["title" => $request["title"], 
        "description" => $request["description"], "genre" => $request["genre"]]);
    }

    //-------------------------------------------------------------
    public function showByUser($user_id){
        $workList = Work::where("user_id", $user_id)->get();
        
        for($i=0; $i < count($workList) ; $i++){
            //$workList[$i]->genres = unserialize($workList[$i]->genres);
            $workList[$i]->cover_image = asset("storage/".$workList[$i]->cover_image);
        }
        
        return $workList;
    }
    //This should be on chapters
    public function addPage($request){
        PagesController::setPage($request["work_title"], $request["pageNumber"], $request->file('pageImage'));
    }
}
