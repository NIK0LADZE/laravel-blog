<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::latest('published_at')->get()
    ]);
});

Route::get('posts/{slug}', function ($slug) {
    $post = cache()->get("p_{$slug}");

    if (!$post) {
        $post = Post::where('slug', $slug)->firstOrFail();
        cache()->remember("p_{$slug}", 5, fn () => $post);
    }

    return view('post', [
        'post' => $post
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts->sortByDesc('published_at')
    ]);
});

Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts->sortByDesc('published_at')
    ]);
});
