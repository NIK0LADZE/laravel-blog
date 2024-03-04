<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected Request $request;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest('published_at')->filter($this->request)->paginate(6)->withQueryString(),
        ]);
    }

    public function show($slug)
    {
        $post = cache()->remember("p_$slug", 5, fn() => Post::where('slug', $slug)->firstOrFail());

        return view('posts.show', compact('post'));
    }

    public function categoryPosts(Category $category)
    {
        return view('posts.index', [
            'posts' => $category->posts()->latest('published_at')->filter($this->request)->paginate(6)->withQueryString(),
        ]);
    }

    public function authorPosts(User $author)
    {
        return view('posts.index', [
            'posts' => $author->posts()->latest('published_at')->filter($this->request)->paginate(6)->withQueryString(),
        ]);
    }
}
