<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

// Post routes
// Route::get('/posts/{categories?}/{keywords?}', [PostController::class, 'index']);
// Route::get('/posts/user/id/{categories?}/{keywords?}', [PostController::class, 'user']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::get('/posts/edit/{id}', [PostController::class, 'edit']);
Route::post('/posts/edit/{id}', [PostController::class, 'update']);
Route::get('/posts/destroy/{id}', [PostController::class, 'destroy']);
