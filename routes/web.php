<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//vue set up
//Route::get('/{any}', 'SinglePageController@index')->where('any', '.*');

Route::post('/signUp', 'UserController@store');
Route::post('/signIn', 'UserController@show');
Route::get('/verify/{id}', 'UserController@verifyUser');

Route::get('/showWorkOfUser', "WorkController@showByUser");

Route::post('/create-work', 'WorkController@store');

Route::post('/getWork/{id}', 'WorkController@show');
//Route::get("/sessionExists",'UserController@sessionExists');
/*
Route::get('/works', 'WorkController@index');
Route::get('/works/{id}', 'WorkController@show');
Route::post('/create-work', 'WorkController@store');
Route::post('/edit-work/{id}', 'WorkController@edit');

Route::post('/add_chapter', 'ChaptersController@store');
Route::get("works/{id}/chapters", 'ChaptersController@showChaptersByWork');
*/

//Route::post('/create-page', 'PagesController@store');

/*
Route::get("profile/{id}", 'UserController@show');
Route::get("profile/{id}/works", 'WorkController@showByUser');
*/

Route::get('/signOut', 'UserController@signOut');
/*Route::post('/edit-work/{id}', function(Request $request){
    print $request;
});*/

Route::get('/{any}', 'SinglePageController@index')->where('any', '.*');

//----------------------------------------USERS-----------------------
/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/explore', function (Request $request) {
    print($request->session()->get("USER"));
    return view('explore');
});*/



//-----------------------WORK------------------------------------
/*
Route::get('/newWork', function(){
    return view("newWork");
});

Route::post('/newWork', 'WorkController@store');


route::get('/works/{id}', 'WorkController@show');

route::get('/works/{id}/edit', function(){
    return view('editWork');
});

route::post('/works/{id}/edit', 'WorkController@edit');
*/
//route::post('edit', 'WorkController@edit');