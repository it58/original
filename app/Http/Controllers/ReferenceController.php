<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferenceController extends Controller
{
    public function store(Request $request ,$id){
        \Auth::user()->references($id);
        return back();
    }
    
    public function destroy(Request $request ,$id){
        \Auth::user()->unreferences($id);
        return back();
    }
}
