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

function generate()
{
    if (User::all()->count() == 0) {
        factory(User::class, 2)->make()->map->save();
        factory(Post::class, 4)->make()->map->save();
        factory(Comment::class, 10)->make()->map->save();
        factory(Like::class, 3)->make()->map->save();
        factory(Follow::class, 3)->make()->map->save();
    }
}

//Пользователь, Фото, Комментарий, Лайк, Подписка, Геолокация, Хештег
//User, Photo(post), Comment, Like, Following, Geotag, Hashtag

Auth::routes();
Route::get('/home', 'HomeController@index');

Route::resource('/', 'UserController'); // show posts for all users, particular user, get edit profile screen, update profile

Route::post('/{user}/follow', 'UserController@follow');
Route::delete('/{user}/follow', 'UserController@unfollow');

Route::get('/{user}/followers', 'UserController@followers');
Route::get('/{user}/followed', 'UserController@followed');

Route::resource('/posts', 'PostsController'); // create update remove post

Route::post('/posts/{post}/comment', 'PostsController@comment');
Route::delete('/posts/{post}/comment/{comment}', 'PostsController@deleteComment');

Route::post('/posts/{post}/like', 'PostsController@like');
Route::delete('/posts/{post}/like', 'PostsController@unlike');

