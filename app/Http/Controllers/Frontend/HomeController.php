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
        // KEMBALIKAN KE get() UNTUK MENGAMBIL SEMUA PORTOFOLIO
        $portfolios = Portfolio::with('category')->latest()->get(); 
        
        $categories = Category::all();
        $contents = Content::all()->keyBy('key');
        $socialLinks = SocialLink::all();
        $services = Service::all();
        
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
        // 1. Cari kategori yang namanya sama dengan judul layanan
        $category = Category::where('name', $service->title)->first();
        
        // 2. Jika kategori ditemukan, ambil semua portofolio dari kategori tersebut. Jika tidak, ambil koleksi kosong.
        $relatedPortfolios = $category ? Portfolio::where('category_id', $category->id)->latest()->get() : collect();

        // 3. Kirim data layanan dan portofolio terkait ke view
        return view('service-detail', compact('service', 'relatedPortfolios'));
    }
}