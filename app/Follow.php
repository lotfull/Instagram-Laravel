<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = ['user_id', 'following_id'];

    public function follower()
    {
        return $this->belongsTo(User::class, 'user_id')->get()
            ->all()[0];
    }

    public function following()
    {
        return $this->belongsTo(User::class, 'following_id')->get()
            ->all()[0];
    }

    public static function find(User $follower, User $following)
    {
        return Follow::where('user_id', $follower->id)
            ->where('following_id', $following->id);
    }
}
