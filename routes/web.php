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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('articles', 'ArticlesController@index')->name('articles.index');
    Route::post('articles', 'ArticlesController@store')->name('articles.store');
    Route::get('articles/create', 'ArticlesController@create')->name('articles.create');
    Route::get('articles/{id}', 'ArticlesController@show')->name('articles.show');
    Route::get('articles/{id}/edit', 'ArticlesController@edit')->name('articles.edit');
//    Route::resource('articles', 'ArticlesController', [
//        'names' => ['create' => 'articles.create']
//    ]);
});
// good practick use in view same     <a href="{{route('article.create')}}" class="btn btn-danger">Create</a>

