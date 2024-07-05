<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class BlogPostController extends Controller
{
    /**
     * Display a listing of all blog posts.
     */
    public function index()
    {
        $blogPosts = BlogPost::with('user')->paginate(10);

        return response()->json($blogPosts);
    }
}
