<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['user_id', 'post_id'];

    public static function find(User $user, Post $post)
    {
        return Like::where('user_id', $user->id)
            ->where('post_id', $post->id);
    }
}
