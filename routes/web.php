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

function generate() {
    if (User::all()->count() == 0) {
        for ($i = 0; $i < 2; $i++)
            factory(User::class)->make()->save();
        for ($i = 0; $i < 2; $i++)
            factory(Post::class)->make()->save();
    }
    for ($i = 0; $i < 2; $i++) {
        try {
            factory(Like::class)->make()->save();
        } catch (Exception $error) {}
    }
    for ($i = 0; $i < 2; $i++)
        factory(Comment::class)->make()->save();
}

Route::get('/', function () {
    generate();
    return view('main', [
        'posts' => \App\Post::all()
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/{name}', 'PostsController');
Route::post('/{name}/follow', 'PostsController@follow');
Route::delete('/{name}/follow', 'PostsController@unfollow');

Route::post('/posts/{post}/comment', 'CommentController@store');
Route::delete('/posts/{post}/comment/{comment}', 'CommentController@destroy');

Route::post('/posts/{post}/like', 'LikeController@store');
Route::delete('/posts/{post}/like', 'LikeController@destroy');

//Пользователь, Фото, Комментарий, Лайк, Подписка, Геолокация, Хештег
//User, Photo(post), Comment, Like, Following, Geotag, Hashtag
