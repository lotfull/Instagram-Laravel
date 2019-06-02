<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Follow;
use App\Like;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users', [
            'name' => 'All users',
            'users' => User::all()
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
        return view('user.show', [
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
        return view('user.edit');
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
        $user->update($request->validate([
            'name' => ['required', 'max:50'],
            'description' => ['required']
        ]));
        return redirect('/users/' . $user->id);
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
            'user_id' => auth()->id(),
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
            'name' => 'Followers',
            'users' => $user->followers()
        ]);
    }

    public function following(User $user)
    {
        return view('users', [
            'name' => 'Following',
            'users' => $user->following()
        ]);
    }
}
