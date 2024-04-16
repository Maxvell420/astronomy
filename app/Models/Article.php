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
    public function cancel()
    {
        $this->comments()->delete();
        $picture=$this->picture()->first();
        $picture->deletePicture();
        $picture->delete();
        $this->delete();
    }
}
