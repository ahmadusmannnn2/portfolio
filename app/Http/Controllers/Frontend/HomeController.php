<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Category;
use App\Models\Content;
use App\Models\SocialLink; // <-- Tambahkan ini
use App\Models\Certificate;

class HomeController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with('category')->latest()->get();
        $categories = Category::all();
        $contents = Content::all()->keyBy('key');
        $socialLinks = SocialLink::all(); // <-- Tambahkan ini
        
        // Kirim semua data ke view
        return view('home', compact('portfolios', 'categories', 'contents', 'socialLinks'));
    }

    public function certificates()
{
    $certificates = Certificate::latest()->get();
    return view('certificates', compact('certificates'));
}
}