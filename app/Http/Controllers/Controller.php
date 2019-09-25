<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    //参考になったボタンを押された回数を取得
    public function counts($comment){
        $referencedUsersCount = $comment->referencedUsers()->count();
        
        return [
            'referencedUsersCount' => $referencedUsersCount
        ];
         
    }
}
