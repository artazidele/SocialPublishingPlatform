<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

use App\Http\Middleware\PostMiddleware;
use App\Http\Middleware\PostAuthMiddleware;
use App\Http\Middleware\CommentMiddleware;

// Post routes
Route::get('/posts', [PostController::class, 'index'])->middleware(PostAuthMiddleware::class);
Route::get('/posts/clear', [PostController::class, 'clearSearchResults'])->middleware(PostAuthMiddleware::class);
Route::get('/posts/user/{username}', [PostController::class, 'user'])->middleware(PostAuthMiddleware::class);
Route::get('/posts/create', [PostController::class, 'create'])->middleware(PostAuthMiddleware::class);
Route::post('/posts', [PostController::class, 'store'])->middleware(PostAuthMiddleware::class);
Route::get('/posts/{id}', [PostController::class, 'show'])->middleware(PostAuthMiddleware::class);
Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->middleware(PostMiddleware::class);
Route::post('/posts/edit/{id}', [PostController::class, 'update'])->middleware(PostMiddleware::class);
Route::get('/posts/destroy/{id}', [PostController::class, 'destroy'])->middleware(PostMiddleware::class);

// Comment routes
Route::get('/posts/{id}/comments/destroy/{comment_id}', [CommentController::class, 'destroy'])->middleware(CommentMiddleware::class);
Route::post('/posts/{id}/comments', [CommentController::class, 'store'])->middleware(PostAuthMiddleware::class);

// Filter and search routes
Route::post('/posts/filter/search', [PostController::class, 'filterAndSearch'])->middleware(PostAuthMiddleware::class);
Route::get('/posts/filtered/searched', [PostController::class, 'filteredAndSearched'])->middleware(PostAuthMiddleware::class);

// User routes
Route::get('/users/signup', [UserController::class, 'signup']);
Route::post('/users/register', [UserController::class, 'register']);
Route::get('/users/signin', [UserController::class, 'signin']);
Route::get('/users/login', [UserController::class, 'login']);
Route::get('/users/logout', [UserController::class, 'logout']);