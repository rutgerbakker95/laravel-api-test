<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPosts;

class BlogPostsController extends Controller
{
    /**
     * Display a listing of all blog posts.
     */
    public function index()
    {
        $books = BlogPosts::all();

        return response()->json($books);
    }
}
