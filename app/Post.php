<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'image_file_name', 'image_title',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
     // 写真につけるタグ一覧取得
    public function tagsToImage()
    {
        return $this->belongsToMany(Tag::class,'posts_tags','post_id','tag_id');
    }
    
    // 写真に対してタグをつける
    public function tag($tagId)
    {
        // 既についているタグなら何もしない
        if($this->is_tagging($tagId)){
            return false;
        }
        else{
        $this->tagsToImage()->attach($tagId);
        return true;
        }
    }
    
    // 写真のタグをはずす
    public function untag($tagId)
    {
        // まだついていないタグなら何もしない
        if(!$this->is_tagging($tagId)){
            return false;
        }
        else{
        $this->tagsToImage()->detach($tagId);
        return true;
        }
    }
    
    // 既にタグ付けしているか確認
    public function is_tagging($tagId){
        return $this->tagsToImage()->where('tag_id',$tagId)->exists();
    }
}
