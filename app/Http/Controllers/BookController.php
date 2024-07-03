<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class BookController extends Controller
{
    /**
     * Get all books
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $books = Books::all();
        return response()->json($books);
    }
}
