<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable=['title','content','original'];
    public function picture()
    {
        return $this->hasOne(Picture::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'articles_users','article_id','user_id');
    }
    public function getNumberOfLikes()
    {
        return $this->users()->count();
    }
    public function setNumberOfLikesAttribute($likes)
    {
        $this->attributes['likes'] = $likes;
    }
    public function getNumberOfComments()
    {
        return $this->comments()->count();
    }
    public function setNumberOfCommentsAttribute($comments)
    {
        $this->setAttribute('comments', $comments);
    }
    public function setTextPreview(string $text)
    {
        if (mb_strlen($text)>400) {
            $text = mb_substr($text, 0, 400).'...';
        } else{
            $text = mb_substr($text, 0, 400);
        }
        $this->setAttribute('previewText',$text);
    }
    public function cancel()
    {
        $this->comments()->delete();
        $picture=$this->picture()->first();
        $picture->deletePicture();
        $picture->delete();
        $this->delete();
    }
    public function attachLikeHref()
    {
        $route = route('article.like',$this->id);
        $this->setAttribute('like',$route);
    }
    public function articleLiked():bool
    {
        if (auth()->check()){
            $id = auth()->id();
            $user = auth()->user();
            $liked= $user->article_liked($this);
            if ($liked){
                return true;
            } else{
                return false;
            }
        }
        return false;
    }
}
