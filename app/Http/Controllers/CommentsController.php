<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index($id){
        
    }
    
    public function show($id){
        $post = Post::find($id);
        
        return view('comments.show', ['post' => $post ]);
    }
    
    public function destroy($id){
        
    }
    
    public function create($id){
        
    }
}
