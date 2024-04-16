<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Picture;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        $article->load(['picture', 'comments.user']);
        return view('article.show', compact('article'));
    }
    public function edit(Article $article)
    {
        $article->load('picture');
        return view('article.edit', compact('article'));
    }
    public function update(Request $request,Article $article)
    {
        $validated = $request->validate([
            'content'=>['string'],
            'title'=>['string'],
            'image'=>['image']
        ]);
        unset($validated['image']);
        $image = $request->file('image');
        if (isset($image)){
            $article->load('picture');
            $picture = $article->picture;
            $name = $image->getClientOriginalName();
            $picture->savePicture($image->getContent(),$name);
        }
        $article->update($validated);
        return redirect()->route('admin');
    }
    public function cancel(Article $article)
    {
        $article->cancel();
        return redirect()->route('admin');
    }
}
