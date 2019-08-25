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
    
    public function edit($id)
    {
        $user=User::find($id);
        
        return view('users.edit',[
            'user' => $user
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->strength = $request->strength;
        $user->tactics = $request->tactics;
        $user->password = $request->password;
        $user->save();

        return redirect('/users/'.$user->id);
    }
    
    // ユーザをフォローする
    public function store(Request $request,$id)
    {
        \Auth::user()->follow($id);
        return back();
    }
    // ユーザをアンフォローする
    public function destroy(Request $request,$id)
    {
        \Auth::user()->unfollow($id);
        return back();
    }
}
