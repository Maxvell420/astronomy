<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $validated = $request->validate(['text' => ['required']]);
        $user = Auth::user();
        $validated=array_merge($validated,['user_id'=>$user->id]);
        $article->comments()->create($validated);
        return redirect()->back();
    }
}
