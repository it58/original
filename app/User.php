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
    
    // あるコメントを参考になった登録する。すでに登録しているなら何もしない
    public function references($commentId){
        if($this->is_reference($commentId)){
            return false;
        }else{
            $this->referencesComments()->attach($commentId);
            return true;
        }
    }
    
    // あるコメントを参考になった登録から解除する。登録していないなら何もしない
    public function unreferences($commentId){
        if($this->is_reference($commentId)){
            $this->referencesComments()->detach($commentId);
            return true;
        }else{
              return false;
        }
    }
    
    // 既にコメントが参考にされたか確認する
    public function is_reference($commentId){
        return $this->referencesComments()->where('comment_id', $commentId )->exists();
    }
    
    //フォローしているユーザ取得
    public function followings(){
        return $this->belongsToMany(User::class,"user_follow","user_id","follow_id")->withTimestamps();
    }
    
    //フォローされているユーザ取得
    public function followers(){
        return $this->belongsToMany(User::class,"user_follow","follow_id","user_id")->withTimestamps();
    }
    
    // あるユーザをフォローする。すでにフォローしているか自分自身なら何もしない
    public function follow($id){
        if($this->is_following($id) || $id == $this->id){
            return false;
        }else{
            $this->followings()->attach($id);
            return true;
        }
    }
    
    // あるユーザをアンフォローする。まだフォローしていないか自分自身なら何もしない
    public function unfollow($id){
        if(!$this->is_following($id) || $id == $this->id){
            return false;
        }else{
            $this->followings()->detach($id);
            return true;
        }
    }
    
    // フォローしているかの判定。フォローしているならtrueを返す
    public function is_following($id){
        return $this->followings()->where('follow_id', $id)->exists();
    }
}
