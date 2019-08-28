<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Facades\Validator;
use App\User;

class UsersController extends Controller
{
    // ユーザのインスタンスとそのユーザのpostsをviewに渡す
    public function show($id){
        $user = User::find($id);
        $posts = $user->posts()->orderBy('created_at','desc')->paginate(6);
        //  dd($user->icon);
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
    // ユーザ情報編集
    public function update(Request $request, $id)
    {
        // ユーザアイコン登録
        $validator = Validator::make($request->all(), [
            'file' => 'required|max:10240|mimes:jpeg,gif,png'
        ]);
        
        if ($validator->fails())
        {
            return back()->withInput()->withErrors($validator);
        }
            
        $file = $request->file('file');
        $path = Storage::disk('s3')->putFile('/', $file, 'public');
        
        $user = User::find($id);
        $user->icon = $path;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->strength = $request->strength;
        $user->tactics = $request->tactics;
        $user->password = bcrypt($request->password);
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
    
    public function followings($id){
        $user = User::find($id);
        $followings = $user->followings;
        
        return view('users.following',[
            'user' => $user,
            'followings' => $followings
            ]);
            
    }
    
    public function followers($id){
        $user = User::find($id);
        $followers = $user->followers;
        
        return view('users.follower',[
            'user' => $user,
            'followers' => $followers
            ]);
            
    }
}
