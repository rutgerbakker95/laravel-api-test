<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $countsPerMonth = BlogPost::select(
            DB::raw("EXTRACT(YEAR FROM created_at) as year"),
            DB::raw("EXTRACT(MONTH FROM created_at) as month"),
            DB::raw('COUNT(*) as count')
        )
        ->where('created_at', '>=', now()->subMonths(12))
        ->groupBy('year', 'month')
        ->orderBy('year', 'desc')
        ->orderBy('month', 'desc')
        ->get();

        return response()->json([
            'blog_posts' => $blogPosts,
            'counts_per_month' => $countsPerMonth
        ]);
    }

    /**
     * Display the specified blog post
     */
    public function show($id)
    {
        $blogPost = BlogPost::with('user')->find($id);

        if ($blogPost) {
            return response()->json($blogPost);
        } else {
            return response()->json(['message' => 'Blogpost not found'], 404);
        }
    }
}
