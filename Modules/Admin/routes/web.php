<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\app\Http\Controllers\AdminController;

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

// Route::group([], function () {
//     Route::resource('admin', AdminController::class)->names('admin');
// });

Route::prefix('admin')->group(function() {
    Route::POST('login', 	['as' => 'login.create','uses' => 'Auth\LoginController@adminLogin']);
	Route::get('logout', 	['as' => 'admin.logout','uses' => 'Auth\LoginController@logout']);
	Route::get('login', 	['as' => 'admin.login',	'uses' => 'Auth\LoginController@login']);
    Route::group(['middleware' => 'AuthAdmin'] , function(){
    	Route::get('/',['as' => 'admin.dashboard' , 'uses' => 'AdminController@index']);

        Route::get('books','BookController@index')->name('book.list');
        Route::get('book/create','BookController@create')->name('book.create');
        Route::post('book/save','BookController@store')->name('book.store');
        Route::get('/book/edit/{id}','BookController@edit')->name('book.edit');
        Route::put('/book/update/{id}','BookController@update')->name('book.update');
    	Route::delete('book/delete/{id}','BookController@destroy')->name('book.destroy');    
        Route::get('/bookattach/delete','BookController@removeAttachment');
    });  
});