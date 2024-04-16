<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ParserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['auth'])->group(function () {
    Route::post('/comment/{article}/store',[CommentController::class,'store'])->name('comment.store');
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin',[UserController::class,'admin'])->name('admin');
        Route::get('/newArticle',[UserController::class,'article'])->name('article.create');
        Route::post('article.save',[UserController::class,'articleSave'])->name('article.save');
        Route::get('/article/{article}/edit',[ArticleController::class,'edit'])->name('article.edit');
        Route::post('/article/{article}/update',[ArticleController::class,'update'])->name('article.update');
        Route::post('/article/{article}/cancel',[ArticleController::class,'cancel'])->name('article.cancel');
        Route::get('/parse',[ParserController::class,'parse'])->name('parser');
    });
});
Route::get('',[UserController::class,'dashboard'])->name('dashboard');
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('auth',[UserController::class,'auth'])->name('auth');
Route::get('logout',[UserController::class,'logout'])->name('logout');
Route::get('/sign',[UserController::class,'sign'])->name('sign');
Route::post('users.save',[UserController::class,'save'])->name('users.save');
Route::get('/article/{article}/show',[ArticleController::class,'show'])->name('article.show');
