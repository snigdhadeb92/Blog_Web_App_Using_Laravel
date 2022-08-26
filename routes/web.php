<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/','App\Http\Controllers\Admin\PostController@viewPosts')->name('user_home');
//Route::get('/','App\Http\Controllers\Admin\HomeController@index')->name('home');
// {{route('home')}}
Route::resources([
    'details' => 'App\Http\Controllers\DetailPost'
]);
Route::group(['prefix' => 'admin'], function () {
    Route::get('/','App\Http\Controllers\Admin\LoginController@index');
    Route::resources([
        'home' => 'App\Http\Controllers\Admin\HomeController'
    ]);
    Route::resources([
        'categories' => 'App\Http\Controllers\Admin\CategoryController'
    ]);
    Route::resources([
        'addposts' => 'App\Http\Controllers\Admin\PostController'
    ]);
    
});

