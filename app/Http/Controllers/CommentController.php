<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Comment;
use App\Reply;
class CommentController extends Controller
{
    public function postNewComment(Request $request){
        Comment::create([
            'user_id'=>Auth::user()->id,
            'comment'=>$request->comment,
            'post_id'=>$request->post_id

        ]);
        return redirect()->back();
    }
    public function postReplyComment(Request $request){
$reply = new Reply;
        $reply->user_id = Auth::user()->id;
        $reply->comment_id = $request->id;
        $reply->post_id = $request->post_id;
        $reply->reply = $request->reply;
        $reply->save();
        return redirect()->back();
    }
}
