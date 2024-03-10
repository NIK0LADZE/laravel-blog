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

Route::controller(UserController::class)->group(function () {
    Route::get('/register','create')->middleware('guest');
    Route::post('/register','store')->middleware('guest');
});

Route::controller(SessionsController::class)->group(function () {
    Route::get('/login','create')->middleware('guest');
    Route::post('/login','store')->middleware('guest');
    Route::post('/logout','destroy')->middleware('auth');
});

Route::controller(CommentController::class)->group(function () {
    Route::post('/posts/{post:slug}/comments','store')->middleware('auth');
    Route::delete('/posts/{post:slug}/comments','destroy')->middleware('auth');
});
