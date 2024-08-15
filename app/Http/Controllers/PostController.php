<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(Request $request)
    {
        $posts = Post::filter($request->only(['search', 'category', 'author']))
            ->latest()
            ->paginate(5)
            ->withQueryString();
        return view( 'posts',[
            'title' => 'Blog',
            'posts' => $posts,
        ]);
    }
    public function show(Post $post)
    {
        return view('post', [
           'title' => 'single post',
           'post' => $post,
        ]);
    }

    public function byAuthor(User $user)
    {
        return view('posts', [
            'title' => count($user->posts) . 'Articles by ' . $user->name,
            'posts' => $user->posts,
        ]);
    }

    public function byCategory(Category $category)
    {
        return view('posts', [
            'title' => 'Articles in ' . $category->name,
            'posts' => $category->posts
        ]);
    }
}
