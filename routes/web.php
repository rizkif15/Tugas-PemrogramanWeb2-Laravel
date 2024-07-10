<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Route::get('/', function () {
//     return view('posts.index');
// });

Route::get('/',[PostController::class, 'index']);

Route::resource('/posts', PostController::class);

Route::get('/show/{code}', [PostController::class, 'show'])->name('posts.show');
Route::get('/add', [PostController::class, 'add'])->name('posts.add');
Route::get('/edit/{code}', [PostController::class, 'edit'])->name('posts.edit');
Route::get('/login', [PostController::class, 'login'])->name('posts.login');

?>