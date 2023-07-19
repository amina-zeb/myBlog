<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}',[PostController::class, 'show']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');

Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::post('login', [SessionController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
//        'posts' => $category->posts->load(['category', 'author'])
        'posts' => $category->posts
    ]);
});

Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts
    ]);
});

/*Route::get('/', function () {
    return view('posts', [
        'posts' => Post::latest('published_at')->with(['category','author'])->get()
    ]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post
    ]);
});*/


/*Route::get('/', function(){
    \Illuminate\Support\Facades\DB::listen(function ($query){logger($query->sql);});
    return view('posts', [
        'posts' => Post::all()
    ]);
});*/

/*Route::get('/posts/{post}', function ($id) {
    return view('post', [
        'post' => Post::findOrFail($id)
    ]);
});*/