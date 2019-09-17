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
        $user = User::find($id);
        if($request->file !=null){
            // ユーザアイコン登録
            $validator = Validator::make($request->all(), [
                'file' => 'max:10240|mimes:jpeg,gif,png'
            ]);
            
            if ($validator->fails())
            {
                return back()->withInput()->withErrors($validator);
            }
                
            $file = $request->file('file');
            $path = Storage::disk('s3')->putFile('/', $file, 'public');
            $user->icon = $path;
        }
        
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->strength = $request->strength;
        $user->tactics = $request->tactics;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/users/'.$user->id);
    }
    
    public function destroy($id){
        $user = User::find($id);
        if(\Auth::id() == $user->id){
            $user->delete();
        }
        
         return redirect('/');
    }
    
    
}
