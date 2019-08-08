<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SearchController extends Controller
{
    public function index(Request $request){
        $query = User::query();
        $search1 = $request->input('strength');
        $search2 = $request->input('tactics');
        $data = $query->where([
            ['strength', $search1],
            ['tactics', $search2]
        ])->get();
        
        // dd($data);
       
        return view('users.search',[
            'data' => $data
        ]);
    }
}
