<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Category;
use App\Models\Content;
use App\Models\SocialLink;
use App\Models\Certificate;
use App\Models\Service; // <-- Tambahkan ini

class HomeController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with('category')->latest()->get();
        $categories = Category::all();
        $contents = Content::all()->keyBy('key');
        $socialLinks = SocialLink::all();
        $services = Service::latest()->get(); // <-- Tambahkan ini
        
        // Tambahkan 'services' ke dalam data yang dikirim ke view
        return view('home', compact('portfolios', 'categories', 'contents', 'socialLinks', 'services'));
    }

    public function certificates()
    {
        $certificates = Certificate::latest()->get();
        return view('certificates', compact('certificates'));
    }

    // Method baru untuk halaman detail layanan
    public function serviceDetail(Service $service)
    {
        return view('service-detail', compact('service'));
    }
}