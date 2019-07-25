<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use App\Post;
use Storage;

class PostsController extends Controller
{
     public function upload(Request $request){
        
        if ($request->file('file')->isValid([])) {
           
            $file = $request->file('file');
            
            $path = Storage::disk('s3')->putFile('/', $file, 'public');

            Post::create([
                'image_file_name' => $path,
                'user_id' => auth()->id(),
                'image_title' => 'test'
            ]);
       
            return redirect()->back();
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
        }
    }
    
    public function destroy($id){
       
        $post = \App\Post::find($id);
        if(\Auth::id() === $post->user_id){
            $post->delete();
        } 
        
        return redirect()->back();
    }
    
}


