<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Auth;
use App\Like;
class PostController extends Controller
{
    public function getNewPost(){

        $categories = Category::all();
        return view("newpost")->withCategories($categories);
}
    public function postNewPost(Request $request){
        $this->validate($request,[
        'title'=>"required|min:25|max:150",
         'body'=>"required|min:50|max:70000"

        ]);

        Post::create([
            'user_id'=>Auth::id(),
            'title'=>$request->title,
            'body'=>$request->body,
            'category_id'=>$request->s,
            'slug'=>str_slug($request->title,"-")
        ]);
        return redirect()->back();
    }
    public function getPost($slug){
            $post = Post::where("slug",$slug)->first();
        return view("post")->withPost($post);
    }
    public function like($slug){
        $post = Post::where("slug",$slug)->first();
        $like = new Like;
        $like->user_id = Auth::user()->id;
        $like->post_id = $post->id;
        $like->save();
        return redirect()->back();
    }
    public function unlike($slug){
        $post = Post::where("slug",$slug)->first();

       $post->likes->where("user_id",Auth::user()->id)->first()->delete();
        return redirect()->back();
    }
}
