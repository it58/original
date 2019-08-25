<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $posts = \App\Post::orderBy('created_at','desc')->paginate(6);
        $users = \App\User::orderBy('created_at','desc')->paginate(6);
        
        $data = [
            'posts' => $posts,
            'users' => $users
        ];
        
        return view('admin.home',$data);
    }
}
