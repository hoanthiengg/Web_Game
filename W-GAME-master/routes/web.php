<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

route::name('/')->group(function(){
    Route::get('/','GameController@show');
});

Route::middleware('checkadmin')->prefix('admin')->name('admin.')->group(function () { 
    Route::prefix('user')->name('user.')->group(function () { 
        Route::get('index','UserController@index')->name('index');

        Route::get('register','UserController@create')->name('register'); 
        Route::post('store','UserController@store')->name('store');  

        Route::get('edit/{id}','UserController@edit')->name('edit');
        Route::post('update/{id}','UserController@update')->name('update'); 

        Route::get('destroy/{id}','UserController@destroy')->name('destroy');
    });
    Route::prefix('category')->name('category.')->group(function () { 
        Route::get('index','CategoryController@index')->name('index');

        Route::get('create','CategoryController@create')->name('create'); 
        Route::post('store','CategoryController@store')->name('store');  

        Route::get('edit/{id}','CategoryController@edit')->name('edit');
        Route::post('update/{id}','CategoryController@update')->name('update'); 

        Route::get('destroy/{id}','Categorycontroller@destroy')->name('destroy');
    });
    Route::prefix('game')->name('game.')->group(function () { 
        Route::get('index','GameController@index')->name('index');

        Route::get('home','GameController@show')->name('home'); 
        Route::post('more','GameController@more')->name('more');  

        Route::get('create','GameController@create')->name('create'); 
        Route::post('store','GameController@store')->name('store');  

        Route::get('edit/{id}','GameController@edit')->name('edit');
        Route::post('update/{id}','GameController@update')->name('update'); 

        Route::get('destroy/{id}','GameController@destroy')->name('destroy');
    });
    Route::prefix('page')->name('page.')->group(function () { 
        Route::get('game/{id}','PageController@inforpage')->name('inforpage');
    
        Route::get('category/{name}','PageController@pagecate')->name('pagecate'); 
        Route::get('year/{year}','PageController@yearpage')->name('yearpage');
        Route::post('store','PageController@store')->name('store');  
    
        Route::get('edit/{id}','PageController@edit')->name('edit');
        Route::post('update/{id}','PageController@update')->name('update'); 
    
        Route::get('destroy/{id}','PageController@destroy')->name('destroy');
    });
    Route::prefix('comment')->name('comment.')->group(function () { 
        Route::get('index','CommentController@index')->name('index');/// name trùng dễ toang lắm này
        Route::post('index','CommentController@index')->name('index');
        Route::post('show','CommentController@showcomment')->name('showcomment');

        Route::post('destroy','CommentController@destroy')->name('destroy');
    });
});
Route::middleware('checklogin')->prefix('setting')->name('setting.')->group(function () { 
    Route::get('establish/{id}','SettingController@establish')->name('establish')->middleware('checkid');
    Route::post('edit/{id}','SettingController@edit')->name('edit')->middleware('checkid');
    Route::get('profile/{id}','SettingController@profile')->name('profile')->middleware('checkid');
    Route::get('account/{id}','SettingController@account')->name('account')->middleware('checkid');
    Route::post('changePassword','SettingController@changePassword')->name('changePassword');
});



Route::get('/home', 'AdminController@index')->name('home');
Route::get('/admin', 'AdminController@home')->name('admin')->middleware('checkadmin');
Route::post('/design', 'AdminController@design')->name('design');

Auth::routes();


route::get('/download/{id}','SonpageController@download')->name('download');
route::get('coin/{id}','SonpageController@coin')->name('coin')->middleware('checkcoin');
Route::get('infor/{id}','SonpageController@inforpage')->name('infor');
route::post('search','SonpageController@search')->name('searchgame');
// Route::get('/autocomplete', 'SonpageController@index');
// Route::post('/autocomplete/fetch', 'SonpageController@fetch')->name('autocomplete.fetch');
Route::get('the-loai/{name}','SonpageController@pagecategory')->name('pagecategory');
Route::get('allgame','SonpageController@allgame')->name('allgame');


Route::post('loadcomment','AjaxController@loadcomment')->name('loadcomment');
Route::post('xoacomment','AjaxController@xoacomment')->name('xoacomment')->middleware('checklogin');
Route::post('comment','AjaxController@addcomment')->name('addcomment')->middleware('checklogin');
Route::post('mun','AjaxController@mun')->name('mun');

