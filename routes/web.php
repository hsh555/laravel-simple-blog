<?php

use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Web\CommentController;
use App\Http\Controllers\Web\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [PostController::class, "index"])->name("index");

Route::get('/posts/{post}', [PostController::class, "show"])->name("show");

Route::get('/search', [PostController::class, "search"])->name("search");

Route::post('/comments/{id}/store', [CommentController::class, "store"])->name("comments.store");

Route::prefix('admin')->name("admin.")->group(function () {
    Route::get('/', [AdminController::class, "index"])->name("index");
    Route::get('/posts', [AdminPostController::class, "index"])->name("posts.index");
    Route::get('/posts/create', [AdminPostController::class, "create"])->name("posts.create");
    Route::post('/posts/store', [AdminPostController::class, "store"])->name("posts.store");
    Route::get('/posts/{post}/edit', [AdminPostController::class, "edit"])->name("posts.edit");
    Route::put('/posts/{post}', [AdminPostController::class, "update"])->name("posts.update");
    Route::get('/posts/{post}', [AdminPostController::class, "active"])->name("posts.active");
    Route::delete('/posts/{post}', [AdminPostController::class, "delete"])->name("posts.delete");
    Route::get('/comments', [AdminCommentController::class, "index"])->name("comments.index");
    Route::delete('/comments/{comment}', [AdminCommentController::class, "delete"])->name("comments.delete");
    Route::get('/comment/{comment}', [AdminCommentController::class, "active"])->name("comments.active");
});

Auth::routes();

Route::get('/user-panel', [App\Http\Controllers\HomeController::class, 'showUserPanel'])->name('panel');
