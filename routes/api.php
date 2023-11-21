<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['namespace'=> '\App\Http\Controllers'],function(){

    Route::group(['prefix'=>'v1'],function(){
        Route::post('login',['as'=>'api.login','uses'=>'Auth\LoginController@apiLogin']);
        Route::group(['middleware'=>'jwt_auth'],function(){
            Route::get('book/list',['as'=>'api.book.list','uses'=>'BookController@list']);
            Route::get('search/book',['as'=>'api.book.list','uses'=>'BookController@search']);
            Route::get('book/detail/{id}',['as'=>'api.book.detail','uses'=>'BookController@bookDetail']);

        });
    });
});