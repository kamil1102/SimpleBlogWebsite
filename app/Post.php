<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // This function returns user that is the author of this post.
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // This function returns comments that are assigned to the post.
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function category()
    {
        return $this->hasOne('App\Category');
    }

}
