<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable=['name','password','role_id'];
    public function articles()
    {
        return $this->belongsToMany(Article::class,'articles_users','user_id','article_id');
    }
    public function article_liked(Article $article)
    {
        return $article->users()->where('user_id',auth()->id())->first();
//        return $this->articles()->where('user_id',auth()->id())->where('article_')->first();
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function likedComments()
    {
        return $this->belongsToMany(Comment::class,'comment_user','user_id','comment_id');
    }
}
