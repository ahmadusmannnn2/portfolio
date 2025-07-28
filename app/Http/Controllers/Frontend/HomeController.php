<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Category; // <-- Tambahkan ini

class HomeController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with('category')->latest()->get(); // Ambil portfolio dengan data kategorinya
        $categories = Category::all(); // Ambil semua kategori
        
        // Kirim kedua data ke view
        return view('home', compact('portfolios', 'categories'));
    }
}