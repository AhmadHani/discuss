<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Like;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Post;
use App\Setting;
use App\User;
use DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function showAdmin(){
        $categories = Category::all();
        $posts = Post::all();
        $users = User::all();
        $comments = Comment::all();
        $all = ["categories"=>$categories,"posts"=>$posts,"users"=>$users,"comments"=>$comments];

        return view('admin.index')->withAll($all);
    }
    public function getSetting(){
        $setting = Setting::get()->last();
        return view("admin.setting.show")->withSetting($setting);
    }
    public function postSetting(Request $request){
       $setting = new Setting();
        $setting->name = $request->name;
        $setting->key_words = $request->key_words;
        $setting->save();
        return redirect()->back();
    }
    public function getCategories(){
        $categories = Category::paginate(9);
        return view("admin.categories.show")->withCategories($categories);
    }
    public function postCategories(Request $request){
        $this->validate($request,[
        'category_name'=>"required|min:2"
        ]);
        Category::create([
            'name'=>$request->category_name,
            'slug'=>str_slug($request->category_name,'-')

        ]);
        $file = $request->file("img");
        $filename = $request->name.'.jpg';
        if($file){
            Storage::disk("local")->put($filename,File::get($file));
        }
        return redirect()->back();
    }
    public function deleteCategories($slug){
        $category = Category::where("slug",$slug)->first();
        $category->delete();
        return redirect()->back();
    }
    public function editCategories($slug,Request $request){
        $category = Category::where("slug",$request->slug)->first();
        return view("admin.categories.edit")->withCategory($category);
    }
    public function postEditCategories(Request $request){
        $category = Category::where("slug",$request->slug)->first();
        $category->update([
            'name'=>$request->category_name,
            'slug'=>str_slug($request->category_name,"-")
        ]);
        return redirect()->route("get.categories");
    }
    public function getPosts(){
        $posts = Post::paginate(9);
        $categories = Category::all();
        return view("admin.posts.show")->withCategories($categories)->withPosts($posts);
    }
    public function editPosts($slug){
        $post = Post::where("slug",$slug)->first();
        $categories = Category::all();
        return view("admin.posts.edit")->withPost($post)->withCategories($categories);
    }
    public function postEditPosts(Request $request)
    {

        $this->validate($request,[
            'title'=>"required|min:25|max:150",
            'body'=>"required|min:50|max:70000"

        ]);
        $post = Post::where("slug",$request->slug)->first();
        $post->title = $request->title;
        $post->category_id = $request->s;
        $post->body = $request->body;
        $post->save();
        return redirect()->back();
    }
    public function deletePosts($slug){
        $deletepost = Post::where("slug",$slug)->first();
        $deletepost->delete();
        return redirect()->back();
    }
    public function getUsers(){
        $categories = Category::all();
        $users = User::paginate(9);
        return view('admin.users.show')->withCategories($categories)->withUsers($users);
    }public function deleteComments($id){
        $comment = Comment::find($id)->first();
    $comment->delete();
    return redirect()->back();
}
           public function updateComment(Request $request){
               $this->validate($request,[
                    'comment'=>"required|min:3"
               ]);
                $comment = Comment::where("id",$request->comment_id)->first();
               $comment->comment = $request->comment;
               $comment->save();
               return redirect()->back();
        }
        public function updateUser(Request $request){
             $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255',
                'password' => 'min:6|confirmed'
            ]);
            $user = User::where("id",$request->id)->first();

            $user->name = $request->name;
            $user->email = $request->email;
            if(!empty($request->password)){
                $user->password = $request->password;

            }
            if($request->blocked){$user->blocked = $request->blocked;}
           if($request->rank) {$user->rank = $request->rank;}
            $user->save();
            $file = $request->file("img");
            $filename = $request->name . '-' . $request->id . '.jpg';
            if($file){
                Storage::disk("local")->put($filename,File::get($file));
            }
           return redirect()->back();
        }
        public function deleteUser($id){
            $user = User::where("id",$id)->first();
            $user->delete();
            return redirect()->back();
        }
        public function adminUnlike($post_id,$user_id){

            $like = Like::where("post_id",$post_id)->where("user_id",$user_id)->first();
            $like->delete();
            return redirect()->back();
        }
        public function postNewPost(Request $request){
    $this->validate($request,[
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',

    ]);
            $adduser = new User();
            $adduser->name = $request->name;
            $adduser->email = $request->email;
            $adduser->password = bcrypt($request->password);
            $adduser->rank = $request->rank;
            $adduser->blocked = $request->blocked;
            $adduser->slug = str_slug($request->name,'-');
            $adduser->save();
            if(!empty($request->img)){
                $file = $request->file("img");
                $filename = $request->name.'-'.User::get()->last()->id.'.jpg';
                    if($file){
                        Storage::disk("local")->put($filename,File::get($file));

                    }
            }
        return redirect()->back();
        }
        public function searchUsers(Request $request){
            $users = User::where('name', 'LIKE', '%'.$request->q.'%')->paginate(9);
            $categories = Category::all();
            return view("admin.users.show")->withCategories($categories)->withUsers($users);
        }
    public function searchPosts(Request $request){
        $posts = Post::where('title', 'LIKE', '%'.$request->q.'%')->paginate(9);
        $categories = Category::all();
        return view("admin.posts.show")->withCategories($categories)->withPosts($posts);
    }
}
