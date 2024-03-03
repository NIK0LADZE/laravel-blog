<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        // return Post::latest('published_at')->filter(request(['search']))->get();
        return view('posts.showMany', [
            'posts' => Post::latest('published_at')->filter(request(['search']))->paginate(6)->withQueryString(),
        ]);
    }

    public function showOne($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        cache()->remember("p_$slug", 5, fn() => $post);

        return view('posts.showOne', compact('post'));
    }

    public function showCategoryPosts(Category $category)
    {
        return view('posts.showMany', [
            'posts' => $category->posts()->latest('published_at')->filter(request(['search']))->paginate(6)->withQueryString(),
        ]);
    }

    public function showAuthorPosts(User $author)
    {
        return view('posts.showMany', [
            'posts' => $author->posts()->latest('published_at')->filter(request(['search']))->paginate(6)->withQueryString(),
        ]);
    }
}
