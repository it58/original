<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use App\Post;
use Storage;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
     
    public function destroy($id){
       
        $post = \App\Post::find($id);
        $post->delete();
        
        
        return redirect()->back();
    }
    
    public function index(){
        $posts = \App\Post::orderBy('created_at','desc')->paginate(6);
        $users = \App\User::orderBy('created_at','desc')->paginate(6);
        
        $data = [
            'posts' => $posts,
            'users' => $users
        ];
        
        return view('welcome',$data);
    }
    
}


