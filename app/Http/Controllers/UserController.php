<?php

namespace App\Http\Controllers;

use App\Classes\AstronomyParserService;
use App\Models\Article;
use App\Models\Picture;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function login()
    {
        $styles = 'css/pages/login.css';
        return view('login',compact(['styles']));
    }
    public function auth(Request $request): \Illuminate\Http\RedirectResponse
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('dashboard');
    }
    public function dashboard()
    {
        $styles = 'css/pages/dashboard.css';
        $articles = Article::with(['picture'])
            ->select(['id','title','content','updated_at','created_at'])
            ->orderBy('updated_at','desc')
            ->simplePaginate(10);
        $articles->each(function ($article) {
            $likes = $article->getNumberOfLikes();
            $article->setNumberOfLikesAttribute($likes);
            $numberOfComments = $article->getNumberOfComments();
            $article->setNumberOfCommentsAttribute($numberOfComments);
            $article->setTextPreview($article->content);
        });
        $articles->withQueryString();
        return view('dashboard',compact(['articles','styles']));
    }
    public function sign()
    {
        $styles = 'css/pages/login.css';
        return view('sign',compact(['styles']));
    }
    public function admin()
    {
        $styles = 'css/pages/admin.css';
        $articles = Article::with(['picture'])
            ->select(['id','title','content','updated_at','created_at'])
            ->orderBy('updated_at','desc')
            ->simplePaginate(10);
        $articles->each(function ($article) {
            $likes = $article->getNumberOfLikes();
            $article->setNumberOfLikesAttribute($likes);
            $numberOfComments = $article->getNumberOfComments();
            $article->setNumberOfCommentsAttribute($numberOfComments);
            $article->setTextPreview($article->content,1200);
        });
        return view('admin',compact(['articles','styles']));
    }
    public function save(Request $request)
    {
        $validated=$request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);
        $validated['password']=Hash::make($validated['password']);
        User::query()->create($validated);
        $this->auth($request);
    }
    public function article()
    {
        return view('article');
    }
    public function articleSave(Request $request)
    {
        $validated = $request->validate([
            'content'=>['required'],
            'title'=>['required'],
        ]);
        $article = Article::query()->create($validated);
        $image = $request->file('image');
        if (isset($image)){
            $path = "pictures/$article->id";
            $name = $image->getClientOriginalName();
            $picture=$article->picture()->create(['path'=>$path,'name'=>$name]);
            $picture->savePicture($image->getContent(),$name);
        }
        return redirect()->route('admin');
    }
}
