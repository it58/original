<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SearchController extends Controller
{
    public function getIndex(){
   
        return view('users.search');
    }
    
    public function index(Request $request){
        $query = User::query();
        
        $search1 = $request->input('strength');
        $search2 = $request->input('tactics');
        $search3 = $request->input('name');

         // 棋力フォームに入力した内容で検索する
        if ($request->has('strength') && $search1 != ('指定なし')) {
            $query->where('strength', $search1)->get();
        }
      
        // 戦法フォームに入力した内容で検索する
        if ($request->has('tactics') && $search2 != ('指定なし')) {
            $query->where('tactics', $search2)->get();
        }
        
        // ユーザ名フォームに入力した内容で検索する
        if ($request->has('name') && $search3 != '') {
            $query->where('name', 'like', '%'.$search3.'%')->get();
        }
        
        $data = $query->paginate(10);
     
        return view('users.search',[
            'data' => $data
        ]);
    }
}
