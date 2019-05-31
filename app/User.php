<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class)->get();
    }

    public function followers()
    { // Returns [Follow]
        return $this->hasMany(Follow::class, 'followed_id')->get();
    }

    public function following()
    { // Returns [Follow]
        return $this->hasMany(Follow::class, 'user_id')->get();
    }

    public function unfollow()
    {
        Follow::destroy([
            'user_id' => auth()->user(),
            'followed_user' => $this
        ]);
    }
}
