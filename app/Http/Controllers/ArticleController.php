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
        $commentsNumber = $article->getNumberOfComments();
        $likes = $article->getNumberOfLikes();
        $liked = $article->articleLiked();
        $article->attachLikeHref();
        $comments = $article->comments->sortBy('updated_at');
        $comments = $comments->each(function ($comment) {
            $comment->attachLikeHref();
            if (auth()->check()){
                $comment->setLikedBy(auth()->user());
            }
            $commentsLikes = $comment->getNumberOfLikes();
            $comment->setNumberOfLikesAttribute($commentsLikes);
        });
        return view('article.show', compact(['article','commentsNumber','liked','likes','comments']));
    }
    public function edit(Article $article)
    {
        $article->load('picture');
        return view('article.edit', compact('article'));
    }
    public function like(string|int $article_id)
    {
        $user_id = auth()->id();
        $article = Article::find($article_id);
        $article->users()->toggle($user_id);
        $comments = $article->getNumberOfComments();
        $likes = $article->getNumberOfLikes();
        $liked = $article->articleLiked();
        $article->attachLikeHref();
        return view('components.articlePanel',compact(['article','comments','liked','likes']));
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
