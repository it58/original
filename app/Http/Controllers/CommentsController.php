<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;

class CommentsController extends Controller
{
    public function index($id){
        
    }
    
    // コメント画面に渡す変数 postのインスタンス　そのpostに対するコメント コメントしたユーザ　
    // 引数$idは投稿のid
    public function show($id){
        $post = Post::find($id);
        $comments = $post->comments()->get()->pluck('comment');
        $userIds = $post->comments()->get()->pluck('user_id');
       
        $users= User::findMany($userIds);
        
        return view('comments.show', [
            'post' => $post, 
            'users' => $users,
            // 'comments' => $comments, 
        ]);
    }
    
    public function destroy($id){
        
    }
    
    // 投稿に対するコメントを保存する。
    // コメントをしたユーザid auth()->id();
    // コメントされた投稿id  
    public function store(Request $request,$postId){
        $this->validate($request,[
            'comment' => 'required|max:191',
        ]);
        //  dd($request->user);
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->user_id = auth()->id();
        $comment->post_id = $postId;
        $comment->save();
        
        
        return back();
    }
}
