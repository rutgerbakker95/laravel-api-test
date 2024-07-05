<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;

// Get posts
Route::get('/posts', [BlogPostController::class, 'index']);

// Get single post
Route::get('/posts/{id}', [BlogPostController::class, 'show']);
