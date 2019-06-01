<?php

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

use App\Comment;
use App\Like;
use App\Post;
use App\User;
use App\Follow;

//Пользователь, Фото, Комментарий, Лайк, Подписка, Геолокация, Хештег
//User, Photo(post), Comment, Like, Following, Geotag, Hashtag

Auth::routes();
Route::get('/home', 'HomeController@index');

Route::get('/', 'PostsController@index');

Route::resource('/users', 'UserController'); // show posts for all users, particular user, get edit profile screen, update profile

Route::post('/users/{user}/follow', 'UserController@follow');
Route::delete('/users/{user}/follow', 'UserController@unfollow');

Route::get('/users/{user}/followers', 'UserController@followers');
Route::get('/users/{user}/following', 'UserController@following');

Route::resource('/posts', 'PostsController'); // create update remove post

Route::post('/posts/{post}/comment', 'PostsController@comment');
Route::delete('/posts/{post}/comment/{comment}', 'PostsController@deleteComment');

Route::post('/posts/{post}/like', 'PostsController@like');
Route::delete('/posts/{post}/like', 'PostsController@unlike');
