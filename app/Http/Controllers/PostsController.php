<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Like;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return view('main', [
            'posts' => $user->posts()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'image' => ['required', 'image'],
            'description' => ['max: 1000']
        ]);
        $path = $request->file('image')->store('public/images');
        $attributes['image'] = str_replace('public/images/', '', $path);
        $attributes['user_id'] = auth()->id();
        Post::create($attributes);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, User $user)
    {
        return view('main', [
            'posts' => $user->posts()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function like(Post $post)
    {
        Like::create([
            'user_id' => auth()->id(),
            'post_id' => $post->id
        ]);
        return back();
    }

    public function unlike(Post $post)
    {
        Like::find(auth()->user(), $post)->delete();
        return back();
    }

    public function comment(Post $post)
    {
        $attributes = request()->validate([
            'text' => ['required', 'max:1000']
        ]);
        $attributes['user_id'] = auth()->id();
        $attributes['post_id'] = $post->id;
        Comment::create($attributes);
        return back();
    }

    public function deleteComment(Comment $comment)
    {
        if ($comment->user_id == auth()->id())
            $comment->delete();
        return back();
    }
}
