<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class BlogPostController extends Controller
{
    /**
     * Display a listing of blog posts
     */
    public function index(Request $request)
    {
        $query = BlogPost::with('user');

        if ($request->has('created_at')) {
            $date = $request->input('created_at');
            $query->whereDate('created_at', $date);
        }

        if ($request->has('user_id')) {
            $userId = $request->input('user_id');
            $query->where('user_id', $userId);
        }

        $blogPosts = $query->paginate(10);

        return response()->json($blogPosts);
    }
}
