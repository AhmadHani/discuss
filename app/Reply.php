<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
   public function user(){
       return $this->belongsTo(User::Class);
   }
   public function post(){
       return $this->belongsTo(Post::class);

   }
   public function comment(){
       return $this->belongsTo(Comment::Class);
   }
}
