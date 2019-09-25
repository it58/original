<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    // ユーザのインスタンスとそのユーザのpostsをviewに渡す
    public function show($id){
        $user = User::find($id);
        $posts = $user->posts()->orderBy('created_at','desc')->paginate(6);
        
        return view ('admin.show',[
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
