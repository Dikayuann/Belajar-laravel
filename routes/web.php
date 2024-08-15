<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

// Mengubah route menjadi controller sehinga logikanya di pindah ke
// controller(page dan post) sehingga lebih mudah untuk mengelolanya


//Route::get('/', function () {
//    return view('home', ['title' => 'Home']);
//});
//
//Route::get('/about', function () {
//    return view('about', ['title' => 'About']);
//});
//
//Route::get('/contact', function () {
//    return view('contact', ['title' => 'Contact']);
//});
//
//Route::get('/posts', function () {
//
//    return view('posts', ['title' => 'Blog', 'posts'=>
//        Post::filter(request(['search', 'category','author']))->latest()->paginate(5)->withQueryString() ]);
//});
//
//Route::get('/posts/{post:slug}', function(Post $post) {
//
//    return view('post', ['title' => 'Single Post','post' => $post]);
//
//});
//
//
//Route::get('/authors/{user:username}', function(User $user) {
//
////    $posts = $user->posts()->load(['author','category']);
//
//
//    return view('posts', ['title' => count($user->posts).' Articles by '.$user->name,'posts' => $user->posts]);
//
//});
//
//Route::get('/categories/{category:slug}', function(Category $category) {
//
////    $posts = $category->posts()->load(['author','category']);
//
//    return view('posts', ['title' => ' Articles in '.$category->name,'posts' => $category->posts]);
//
//});

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{user:username}', [PostController::class, 'byAuthor'])->name('posts.byAuthor');
Route::get('/categories/{category:slug}', [PostController::class, 'byCategory'])->name('posts.byCategory');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');



