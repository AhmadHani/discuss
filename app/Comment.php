<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id',"comment","post_id"];
    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
public function getComment($comments){
        return view("admin.comments.edit")->withComments($comments);
}
    public function replies(){
        return $this->hasMany(Reply::class);
    }
}
