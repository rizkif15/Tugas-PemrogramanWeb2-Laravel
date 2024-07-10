<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('post.index');
});

Route::resource('/posts', PostController::class);

Route::get('/show', [PostController::class, 'show'])->name('posts.show');
Route::get('/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::get('/login', [PostController::class, 'login'])->name('posts.login');
?>