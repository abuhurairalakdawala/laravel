<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPostLike extends Model
{
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
