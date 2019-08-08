<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    // ユーザのインスタンスとそのユーザのpostsをviewに渡す
    public function show($id){
        $user = User::find($id);
        $posts = $user->posts()->orderBy('created_at','desc')->paginate(6);
        // dd($posts);
        return view ('users.show',[
            'user' => $user,
            'posts' => $posts,
        ]);
    }
}
