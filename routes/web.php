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

Route::get('/', function () {
    return view('mainpage');
});

//Route::middleware(['auth'])->group(function () {
//Route::get('/home', 'ArticlesController@index')->name('home');

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('articles', 'ArticlesController@index');
    Route::post('articles', 'ArticlesController@store');

    Route::get('articles/create', 'ArticlesController@create')->name('article.create');
    // 'article.create' alias for using in controller and in other places
    Route::get('articles/{id}', 'ArticlesController@show');
//Route::get('/welcome', function () {
//    return view('welcome');
//});
});
// good practick use in view same     <a href="{{route('article.create')}}" class="btn btn-danger">Create</a>