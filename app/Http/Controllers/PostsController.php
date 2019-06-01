<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Follow;
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
        //
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
        dd($post);
        Like::create([
            'user_id' => auth()->user(),
            'post_id' => $post->id
        ]);
        return back();
    }

    public function unlike(Like $like)
    {
        if ($like->user_id == auth()->user()->id)
            $like->delete();
        return back();
    }

    public function comment(Post $post)
    {
        Comment::create([
            'text' => request()->text,
            'user_id' => auth()->user(),
            'post_id' => $post->id
        ]);
        return back();
    }

    public function deleteComment(Comment $comment)
    {
        if ($comment->user_id == auth()->user()->id)
            $comment->delete();
        return back();
    }
}
