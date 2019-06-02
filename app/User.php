<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);//\Hash::make($password);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'email', 'password',
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
        return $this->hasMany(Post::class)->orderBy('created_at', 'desc')->get();
    }

    public function followers()
    { // Returns [Follow]
        $userFollowedFollows = $this->hasMany(Follow::class, 'following_id')->get();
        return $userFollowedFollows->map->follower();
    }

    public function following()
    { // Returns [Follow]
        $userFollowingFollows = $this->hasMany(Follow::class, 'user_id')->get();
        return $userFollowingFollows->map->following();
    }

    public function follows(User $user)
    {
        return Follow::find(auth()->user(), $user)->exists();
    }

    public function likes(Post $post)
    {
        return Like::find(auth()->user(), $post)->exists();
    }

    public function feed()
    {
        $following_users_ids = $this->following()->map->id->push(auth()->id());
        return Post::whereIn('user_id', $following_users_ids)->orderBy('created_at', 'asc')->get();
    }
}
