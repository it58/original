<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
         'tag',
    ];
    
     // 同じタグがつく写真一覧取得
    public function taggedImages()
    {
        return $this->belongsToMany(Post::class,'posts_tags','tag_id','post_id');
    }
}
