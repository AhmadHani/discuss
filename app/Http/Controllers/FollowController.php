<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follower;
use App\User;
use Auth;
class FollowController extends Controller
{
    public function follow($slug){
        $userid = User::where("slug",$slug)->first();
        Follower::create([
            'user_id'=>$userid->id,
            "follower_id"=>Auth::user()->id
        ]);
        return redirect()->back();
    }
    public function unFollow($slug){
        $userid = User::where("slug",$slug)->first();
      $follower =  Follower::where("user_id",$userid->id)->where("follower_id",Auth::user()->id)->get();
        $follower->delete();
        return redirect()->back();
    }
    public function adminUnfollow(Request $request,$user_id,$follower_id){
        $follow = Follower::where("user_id",$user_id)->where("follower_id",$follower_id)->first();
$follow->delete();
        return redirect()->back();
    }
}
