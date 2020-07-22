<?php

namespace App\Http\Controllers;
use App\User;
use App\Work;

use App\Pages;
use App\Chapter;


use App\Http\AuthSys\Sessions;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller as BaseController;

class pagesController extends BaseController
{
     public function store(Request $request){
        $page = new Pages();
        $page->chapters_id = $request["chaptersId"];
        
        $chapter = Chapter::find($page->chapters_id);
        $chapter->num_of_pages = $chapter->num_of_pages + 1;
        $chapter->save();

        $page->page_number = $chapter->num_of_pages;


        $work = Work::find($chapter->work_id);
        $pageImagePath = $request->file('pageImage')->store("public/".$work->user_id."/".$work->title."/".$chapter->chapter_title);
        $page->page_image = $pageImagePath;

        $page->save();
     }
}
