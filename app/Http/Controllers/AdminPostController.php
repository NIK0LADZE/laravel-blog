<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminPostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.posts.index', [
            'posts' => Post::latest()->search($request->query('search'), titleOnly: true)->simplePaginate(10)->withQueryString()
        ]);
    }

    public function create()
    {
        return view('admin.posts.create', ['categories' => Category::all()]);
    }

    public function store(AdminPostRequest $request)
    {
        // ddd($request->validated());
        Post::create($request->validated())
            ->addMediaFromRequest('thumbnail')
            ->toMediaCollection('post_images');

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }

    public function update(AdminPostRequest $request)
    {
        $post = Post::find($request->post);

        if ($request->has('thumbnail')) {
            $post->addMediaFromRequest('thumbnail')->toMediaCollection('post_images');
        }

        $post->update($request->validated());

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }
}
