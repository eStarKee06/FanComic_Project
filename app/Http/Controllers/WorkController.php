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
        if(Sessions::userSessionIsSet()){
            $work = new Work();
            $work->title = $request["title"];
            $work->description = $request["description"];


            //$work->genres = serialize($request["genres"]);
            //$work->rating = $request["rating"];

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
        }
        return redirect("works");
        //$this->index();
    }

    public function index(){
        return Work::all();
    }

    public function show($id){
        $work = Work::where("id", (int)$id)->get()[0];
        $work->cover_image = asset("storage/".$work->cover_image);
        $work->rating = Ratings::where("work_id", $id)->get()[0]->rating_title;
        $work->author = User::where("id", $work->user_id)->get()[0]->username;
        $work->genres = Genres::where("work_id", $id)->get();

        return $work;
    }

    
    public function edit($id, Request $request){
        $work = Work::find((int)$id)->update(["title" => $request["title"], 
        "description" => $request["description"], "genre" => $request["genre"]]);
    }

    //-------------------------------------------------------------
    public function showByUser(){
        if(Sessions::userSessionIsSet()){
            $user_id = (Sessions::getUserSession());
            $workList = Work::where("user_id", $user_id)->get();
            for($i=0; $i < count($workList) ; $i++){
                $workList[$i]->cover_image = asset("storage/".$workList[$i]->cover_image);
                $workList[$i]->rating = Ratings::where("work_id", $workList[$i]->id)->get()[0]->rating_title;
            } 
            return $workList;
        }
    }

    //This should be on chapters
    public function addPage($request){
        PagesController::setPage($request["work_title"], $request["pageNumber"], $request->file('pageImage'));
    }
}
