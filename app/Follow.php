<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $primaryKey = ['user_id', 'followed_id'];
    public $incrementing = false;

    public function user() {
        return $this->belongsTo(User::class);
    }
}
