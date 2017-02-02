<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    public $table = "categories";
    public $fillable = ['name','slug'];
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
