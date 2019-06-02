<?php

use App\User;
use App\Post;
use App\Comment;
use App\Like;
use App\Follow;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 4)->make()->map->save();
        factory(Post::class, 10)->make()->map->save();
        factory(Comment::class, 10)->make()->map->save();
        factory(Like::class, 3)->make()->map->save();
        factory(Follow::class, 2)->make()->map->save();
    }
}
