<?php
namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
  use AuthenticatesUsers;
// ログイン後のリダイレクト先
    protected $redirectTo = '/admin/home';
    
    public function __construct()
    {
        // logout アクション以外ではログイン認証されていないことが必要
      $this->middleware('guest:admin')->except('logout');
    }
    public function showLoginForm()
   {
       return view('admin.auth.login');
   }
   
   protected function guard()
   {
       return \Auth::guard('admin');
   }
    
    public function logout(Request $request)
    {
        $this->guard('admin')->logout();
        // $request->session()->flush();
        $request->session()->regenerate();
 
        return redirect('/admin/login');
    }
}