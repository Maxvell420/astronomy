<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=['text','user_id','article_id'];
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likedBy()
    {
        return $this->belongsToMany(User::class,'comment_user','comment_id','user_id');
    }
    public function getNumberOfLikes()
    {
        return $this->likedBy()->count();
    }
    public function setNumberOfLikesAttribute($likes)
    {
        $this->setAttribute('likes',$likes);
    }
    public function isLikedBy(User $user)
    {
        return $this->likedBy()->where('user_id',$user->id)->first();
    }
    public function setLikedBy(User $user)
    {
        $liked = $this->isLikedBy($user);
        $this->setAttribute('liked',$liked);
    }
    public function attachLikeHref()
    {
        $route = route('comment.like',$this);
        $this->setAttribute('like',$route);
    }
}
