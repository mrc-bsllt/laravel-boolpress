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

Route::get('/', "HomeController@index")->name("home");

Route::get('/blog', "BlogController@index")->name("blog");

Route::get('/blog/{slug}', "BlogController@show")->name("post");

Route::get('/blog/tag/{slug}', "BlogController@getPostsByTag")->name("tag_posts");

Route::post('/blog/{id}', "BlogController@addComment")->name("add-comment");

// Rotte per la CRUD
Route::resource("crud-articles", "CrudArticleController");
