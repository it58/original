<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'post_id', 'comment',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
     public function post()
    {
        return $this->belongsTo(Post::class);
    }
    
    // 参考にしたユーザ一覧取得
    public function referencedUsers()
    {
        return $this->belongsToMany(User::class,'users_comments','comment_id','user_id')->withTimestamps();
    }
    
    
}
