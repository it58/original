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

         // 入力が指定なしの場合
        if ($request->has('strength') && $search1 != ('指定なし')) {
            $query->where('strength', $search1)->get();
        }
      
        // 入力が指定なしの場合
        if ($request->has('tactics') && $search2 != ('指定なし')) {
            $query->where('tactics', $search2)->get();
        }
        
        // 入力が指定なしの場合
        if ($request->has('name') && $search3 != '') {
            $query->where('name', 'like', '%'.$search3.'%')->get();
        }
        
        $data = $query->paginate(3);
     
        return view('users.search',[
            'data' => $data
        ]);
    }
}
