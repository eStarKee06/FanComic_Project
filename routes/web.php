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
Route::get('/{any}', 'SinglePageController@index')->where('any', '.*');

//----------------------------------------USERS-----------------------
Route::get('/', function () {
    return view('welcome');
});

Route::get('/explore', function (Request $request) {
    print($request->session()->get("USER"));
    return view('explore');
});


Route::post('/signUp', 'UserController@store');
Route::post('/signIn', 'UserController@show');

Route::get('/signOut', 'UserController@signOut');

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
Route::get('/works', 'WorkController@index');
//route::post('edit', 'WorkController@edit');