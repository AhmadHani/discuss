<?php

namespace App;

use Illuminate\Http\Response;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','blocked','rank','slug'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
public function posts(){
    return $this->hasMany(Post::class);
}
public function comments(){
    return $this->hasMany(Comment::class);
}
    public function users()
    {
        return $this->belongsToMany(
            self::class,
            'followers',
            'user_id',
            'follower_id'
        );
    }
    public function followers()
    {
        return $this->belongsToMany(
            self::class,
            'followers',
            'follower_id',
            'user_id'
        );
    }
    public function getBlocked($user){
        if($user->blocked != 1){
            echo "Not Blocked";
        }else{
            echo "<div style='color:Red'>Blocked</div>";
        }
    }
    public function getRank($user){
        if($user->rank == 1){
            echo "Member";
        }else if($user->rank == 2){
            echo '<div style="color:red">Admin</div>';
        }
    }
    public function getPosts($user){

        return view("admin.users.posts.show")->withUser($user);
    }
    public function getComments($user){

            return view("admin.users.comments.show")->withUser($user);
    }
    public function getUser($users){
        return view("admin.users.edit")->withUsers($users);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
    public function replies(){
        return $this->hasMany(Reply::class);
    }
    public function getFollowers($user){
        return view("admin.users.followers.show")->withUser($user);
    }
    public function editProfile($users){
        return view("editprofile")->withUsers($users);
    }

}
