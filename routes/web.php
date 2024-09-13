<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

// Post routes
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/user/{username}', [PostController::class, 'user']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::get('/posts/edit/{id}', [PostController::class, 'edit']);
Route::post('/posts/edit/{id}', [PostController::class, 'update']);
Route::get('/posts/destroy/{id}', [PostController::class, 'destroy']);

// Comment routes
Route::get('/posts/{id}/comments/destroy/{comment_id}', [CommentController::class, 'destroy']);
Route::post('/posts/{id}/comments', [CommentController::class, 'store']);

// Filter and search routes
Route::post('/posts/filter/search', [PostController::class, 'filterAndSearch']);
Route::get('/posts/filtered/searched', [PostController::class, 'filteredAndSearched']);

// User routes
Route::get('/users/signup', [UserController::class, 'signup']);
Route::post('/users/register', [UserController::class, 'register']);
Route::get('/users/signin', [UserController::class, 'signin']);
Route::get('/users/login', [UserController::class, 'login']);
Route::get('/users/logout', [UserController::class, 'logout']);