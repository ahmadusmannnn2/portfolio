<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Category; // <-- TAMBAHKAN BARIS INI
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::latest()->paginate(10);
        return view('admin.portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); // Baris ini sekarang akan berfungsi
        return view('admin.portfolios.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'project_link' => 'nullable|url',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('portfolio_images', 'public');
            $validated['image'] = $path;
        }

        Portfolio::create($validated);

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        return redirect()->route('admin.portfolios.edit', $portfolio->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        $categories = Category::all(); // Baris ini juga sekarang akan berfungsi
        return view('admin.portfolios.edit', compact('portfolio', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'project_link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($portfolio->image) {
                Storage::disk('public')->delete($portfolio->image);
            }
            $path = $request->file('image')->store('portfolio_images', 'public');
            $validated['image'] = $path;
        }

        $portfolio->update($validated);

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image) {
            Storage::disk('public')->delete($portfolio->image);
        }
        
        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio berhasil dihapus.');
    }
}