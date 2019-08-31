<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use App\Post;
use Storage;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
     public function upload(Request $request){
        
            $validator = Validator::make($request->all(), [
                'file' => 'required|max:10240|mimes:jpeg,gif,png',
                'comment' => 'required|max:191',
            ]);
            
            if ($validator->fails())
                {
                    return back()->withInput()->withErrors($validator);
                }
                
            $file = $request->file('file');
            $path = Storage::disk('s3')->putFile('/', $file, 'public');
    
            Post::create([
                'image_file_name' => $path,
                'user_id' => auth()->id(),
                'image_title' => $request->comment
            ]);
       
            return redirect('/users/'.auth()->id());
      
    }
    
    public function destroy($id){
       
        $post = \App\Post::find($id);
        if(\Auth::id() === $post->user_id){
            $post->delete();
        } 
        
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


