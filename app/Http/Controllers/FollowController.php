<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Facades\Validator;
use App\User;

class FollowController extends Controller
{
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
