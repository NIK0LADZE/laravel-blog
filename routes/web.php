<?php

use App\Http\Controllers\PostController;
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

Route::controller(PostController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('posts/{slug}', 'showOne');
    Route::get('/categories/{category:slug}', 'showCategoryPosts');
    Route::get('/authors/{author:username}', 'showAuthorPosts');
});
