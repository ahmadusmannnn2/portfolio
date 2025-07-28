<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Category; // <-- Tambahkan ini
use App\Models\Content;


class HomeController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with('category')->latest()->get();
        $categories = Category::all();
        $contents = Content::all()->keyBy('key'); // <-- Tambahkan ini
        
        // Kirim semua data ke view
        return view('home', compact('portfolios', 'categories', 'contents'));
    }
}