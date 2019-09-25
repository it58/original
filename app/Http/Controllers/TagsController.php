<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;

class TagsController extends Controller
{
    // タグ一覧表示
    public function index($postId){
        $post = Post::find($postId);
       
        return view('posts.tags',[
            'post' => $post
        ]);
    }
    
    //タグ登録
    public function store(Request $request,$postId){
        $post = Post::find($postId);
        $tagIds = $request->input('tagId');
        
        foreach($tagIds as $tagId){
            $post->tag($tagId);
        }
        return back();
    }
    
    // タグ削除
    public function destroy(Request $request,$postId){
        $post = Post::find($postId);
        $tagIds = $request->input('tagId');

        foreach($tagIds as $tagId){
            $post->untag($tagId);
        }
    
        return back();
    }
    
    // タグ検索機能
    public function search(Request $request,$tagId){
        $tag = Tag::find($tagId);
        $posts = $tag->taggedImages()->paginate(6);
        
        $data =[
            'posts' => $posts
        ];
        return view('welcome',$data);
    }
}
