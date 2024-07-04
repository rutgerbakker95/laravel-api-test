<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostsController;

Route::get('/posts', [BlogPostsController::class, 'index']);
