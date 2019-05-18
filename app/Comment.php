<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=[
        'job_id',
        'author',
        'email',
        'body',
        'is-active'
    ];


    public function replies(){


        return $this->hasMany('App\CommentReply');
    }



    //
}
