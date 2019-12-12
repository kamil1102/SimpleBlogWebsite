<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // This function returns user that is the author of the comment.
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // This function returns the post that this comment belongs to.
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
