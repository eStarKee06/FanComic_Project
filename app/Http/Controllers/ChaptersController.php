<?php

namespace App\Http\Controllers;
use App\Chapter;
use App\Work;

use App\Pages;


use App\Http\AuthSys\Sessions;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller as BaseController;

class ChaptersController extends BaseController
{
    public function store(Request $request){
        $chapter = new Chapter();
        $chapter->work_id = $request["workId"];
        $chapter->chapter_title = $request["chapterTitle"];
        
        $work = Work::where("id", $chapter->work_id)->get();
        $work[0]->num_of_chapters = $work[0]->num_of_chapters + 1;
        $work[0]->save();
        
        $chapter->chapter_number = $work[0]->num_of_chapters;
        
        $chapter->num_of_pages = 0;
        $chapter->save();
    }

    public function showChaptersByWork($id){
        return Chapter::where("work_id", (int)$id)->get();
        
    }

}
