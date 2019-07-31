<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','strength','tactics',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    // 参考にしたコメント一覧取得
    public function referencesComments()
    {
        return $this->belongsToMany(Comment::class,'users_comments','user_id','comment_id')->withTimestamps();
    }
    
    // あるコメントを参考にする。すでに参考にしているなら何もしない
    public function references($commentId){
        if($this->is_reference($commentId)){
            return false;
        }else{
            $this->referencesComments()->attach($commentId);
            return true;
        }
    }
    
    // 既にコメントが参考にされたか確認する
    public function is_reference($commentId){
        return $this->referencesComments()->where('comment_id', $commentId )->exists();
    }
}
