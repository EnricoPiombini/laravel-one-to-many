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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')
->namespace('Admin')
->name('admin.')
->prefix('admin')
->group(function(){

Route::get('/', 'HomeController@index')->name('index');
Route::get('/test', 'HomeController@test')->name('test');
// Route::get('/post/create', 'HomeController@test')->name('posts.create');
// Route::get('/post{post}/edit', 'HomeController@index')->name('posts.edit');

Route::get("/users", "UserController@index")->name("users.index");

Route::resource('posts', 'PostController');

});


