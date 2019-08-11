<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;

class CommentsController extends Controller
{
    
    
    // コメント画面に渡す変数 :postのインスタンス　：そのpostに対するコメント ：コメントしたユーザ　
    // 引数$idは投稿id
    public function show($id){
        $post = Post::find($id);
        // 作成日時順でコメントを表示
        $comments = $post->comments()->orderBy('created_at','desc')->paginate(6);

        $userIds = $post->comments()->get()->pluck('user_id');
       
    //   ユーザのIDの配列からユーザのインスタンスの配列を取得
        $users= User::findMany($userIds);
        
        return view('comments.show', [
            'post' => $post, 
            'users' => $users,
            'comments' => $comments
        ]);
    }
    
    public function show_reference($id){
        $post = Post::find($id);
        // 参考になった回数順でコメントを表示
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
    
    public function destroy($id){
    }
    
    // 投稿に対するコメントを保存する。
    // コメントをしたユーザid auth()->id()　ゲストなら99999;
    // コメントされた投稿id  
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
