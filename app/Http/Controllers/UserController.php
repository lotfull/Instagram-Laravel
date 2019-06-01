<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Follow;
use App\Like;
use App\Post;
use App\User;
use Illuminate\Http\Request;

function generate()
{
    if (User::all()->count() < 2) {
        factory(User::class, 4)->make()->map->save();
        factory(Post::class, 20)->make()->map->save();
        factory(Comment::class, 10)->make()->map->save();
        factory(Like::class, 3)->make()->map->save();
        factory(Follow::class, 2)->make()->map->save();
    }
}

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        generate();
        $posts = auth()->check() ? auth()->user()->feed() : Post::take(10)->get();
//        dump($posts);
        return view('main', [
            'posts' => $posts
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user', [
            'yo' => 'Fuck',
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function follow(User $user)
    {
        Follow::create([
            'user_id' => auth()->user()->id,
            'following_id' => $user->id
        ]);
        return back();
    }

    public function unfollow(User $user)
    {
        Follow::find(auth()->user(), $user)->delete();
        return back();
    }

    public function followers(User $user)
    {
        return view('users', [
            'name' => 'followers',
            'users' => $user->followers()
        ]);
    }

    public function following(User $user)
    {
        return view('users', [
            'name' => 'following',
            'users' => $user->following()
        ]);
    }
}
