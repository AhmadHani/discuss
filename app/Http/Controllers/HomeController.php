<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\Post;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHome()
    {
        $posts = Post::paginate(9);


        return view('index')->withPosts($posts);
    }
    public function logout(){
    Auth::logout();
        return redirect()->route("home");
    }
public function search(Request $request){
    $posts = Post::where('title', 'LIKE', '%'.$request->q.'%')->paginate(9);

    return view("search")->withPosts($posts);
}
}
