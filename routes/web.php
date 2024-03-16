<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
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
    Route::get('posts/{slug}', 'show')->name('post');
    Route::get('/categories/{category:slug}', 'categoryPosts')->name('categories');
    Route::get('/authors/{author:username}', 'authorPosts');
});

Route::controller(UserController::class)->middleware('guest')->name('register')->group(function () {
    Route::get('/register','create');
    Route::post('/register','store');
});

Route::controller(SessionsController::class)->group(function () {
    Route::get('/login','create')->middleware('guest')->name('login');
    Route::post('/login','store')->middleware('guest');
    Route::post('/logout','destroy')->middleware('auth')->name('logout');
});

Route::controller(CommentController::class)->middleware('auth')->name('comments')->group(function () {
    Route::post('/posts/{post:slug}/comments','store');
    Route::delete('/posts/{post:slug}/comments','destroy');
});
