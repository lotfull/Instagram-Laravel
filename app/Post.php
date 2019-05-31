<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes_count()
    {
        return $this->hasMany(Like::class)->count();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->get();
    }

    public function like()
    {
        Like::create([
            'user_id' => auth()->user(),
            'post_id' => $this
        ]);
    }

    public function unlike()
    {
        Like::destroy([
            'user_id' => auth()->user(),
            'post_id' => $this
        ]);
    }

    public function comment($text)
    {
        Comment::create([
            compact('text'),
            'user_id' => auth()->user(),
            'post_id' => $this
        ]);
    }
}
