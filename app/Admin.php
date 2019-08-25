<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

// 新しいユーザを作成するときはAuthenticatableを継承しなければならない
class Admin extends Authenticatable
{
    
    use Notifiable;
    protected $guard = 'admin';
    
    protected $fillable = [
        'name', 'email', 'password',
    ];
 
    protected $hidden = [
       'password', 'remember_token',
    ];
    
    
}
