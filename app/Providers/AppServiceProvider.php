<?php

namespace App\Providers;

use App\Comment;
use App\Follow;
use App\Like;
use App\Post;
use App\User;
use Illuminate\Support\ServiceProvider;

function generate()
{
    if (User::all()->count() < 2) {
        factory(User::class, 4)->make()->map->save();
        factory(Post::class, 10)->make()->map->save();
        factory(Comment::class, 10)->make()->map->save();
        factory(Like::class, 3)->make()->map->save();
        factory(Follow::class, 2)->make()->map->save();
    }
}

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        generate();
    }
}
