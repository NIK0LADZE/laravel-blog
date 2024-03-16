<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        return view('posts.index', [
            'posts' => Post::latest('published_at')->filter($request)->paginate(6)->withQueryString(),
        ]);
    }

    public function show($slug)
    {
        $post = cache()->remember("p_$slug", 5, fn() => Post::where('slug', $slug)->firstOrFail());

        return view('posts.show', compact('post'));
    }

    public function categoryPosts(Category $category, Request $request)
    {
        return view('posts.index', [
            'posts' => $category->posts()->latest('published_at')->filter($request)->paginate(6)->withQueryString(),
        ]);
    }

    public function authorPosts(User $author, Request $request)
    {
        return view('posts.index', [
            'posts' => $author->posts()->latest('published_at')->filter($request)->paginate(6)->withQueryString(),
        ]);
    }
}
