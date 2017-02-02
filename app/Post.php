<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id','title','body','category_id','slug'];

        public function category(){
        return $this->belongsTo(Category::class);
        }

public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function getComments($post){

        return view("admin.comments.delete")->withPost($post);
        }

        public function likes(){
            return $this->hasMany(Like::class);
        }
        public function replies(){
            return $this->hasMany(Reply::class);
        }
        public function getLikes($post){
            return view("admin.posts.likes.show")->withPost($post);
        }

}
