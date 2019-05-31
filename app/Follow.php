<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
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
}
