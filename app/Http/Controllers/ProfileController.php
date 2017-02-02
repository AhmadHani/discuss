<?php

namespace App\Http\Controllers;

use App\Follower;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
class ProfileController extends Controller
{
    public function showProfile(Request $request,$slug){
            $user = User::where("slug",$slug)->first();


        return view("profile")->withUser($user);
    }
    public function getImg($filename){
        if(Storage::disk("local")->has($filename)) {
            $img = Storage::disk("local")->get($filename);
            return new Response($img,200);

        }else{
            $img = Storage::disk("local")->get("user".'.jpg');
            return new Response($img,200);
        }
    }

}
