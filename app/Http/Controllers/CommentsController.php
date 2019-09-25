<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;

class CommentsController extends Controller
{
    // 投稿日時順でコメントを表示
    public function show($id){
        $post = Post::find($id);
        
        $comments = $post->comments()->orderBy('created_at','desc')->paginate(6);
        $userIds = $post->comments()->get()->pluck('user_id');
       
    // ユーザのIDの配列からユーザのインスタンスの配列を取得
        $users= User::findMany($userIds);
        
    // postのインスタンス,postに対するcomments,コメントしたusersをviewに渡す　
        return view('comments.show', [
            'post' => $post, 
            'users' => $users,
            'comments' => $comments
        ]);
    }
    
    // 参考になった回数順でコメントを表示
    public function show_reference($id){
        $post = Post::find($id);
        
        $comment_count = $post->comments()->withCount('referencedUsers')->orderBy('referenced_users_count', 'desc')->paginate(6);
        $userIds = $post->comments()->get()->pluck('user_id');
       
    //   ユーザのIDの配列からユーザのインスタンスの配列を取得
        $users= User::findMany($userIds);
       
        return view('comments.show', [
            'post' => $post, 
            'users' => $users,
            'comments' => $comment_count
        ]);
    }
    
    // 投稿に対するコメントを削除する。
    public function destroy($id){
        $comment = \App\Comment::find($id);
        if(\Auth::id() === $comment->user_id){
            $comment->delete();
        } 
        
        return redirect()->back();
    }
    
    // 投稿に対するコメントを保存する。
    // コメントをしたユーザid auth()->id()　ゲストなら1;
    // コメントされた投稿$postId  
    public function store(Request $request,$postId){
        $this->validate($request,[
            'comment' => 'required|max:191',
        ]);

        $comment = new Comment;
        $comment->comment = $request->comment;
        if(\Auth::check()){
            $comment->user_id = auth()->id();
        }else{
            $comment->user_id = 1;
        }
        $comment->post_id = $postId;
        $comment->save();
        
        return back();
    }
}
