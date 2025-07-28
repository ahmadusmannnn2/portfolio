<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolios.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'project_link'=> 'nullable|url',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // simpan di public/images
            $filename = Str::random(10).'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $filename);
            $data['image_filename'] = $filename;
        }

        Portfolio::create($data);
        return redirect()->route('admin.portfolios.index')
                         ->with('success', 'Portfolio berhasil ditambahkan.');
    }

    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'project_link'=> 'nullable|url',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // hapus file lama jika ada
            if ($portfolio->image_filename && file_exists(public_path('images/'.$portfolio->image_filename))) {
                unlink(public_path('images/'.$portfolio->image_filename));
            }
            $filename = Str::random(10).'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $filename);
            $data['image_filename'] = $filename;
        }

        $portfolio->update($data);
        return redirect()->route('admin.portfolios.index')
                         ->with('success', 'Portfolio berhasil diupdate.');
    }

    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image_filename && file_exists(public_path('images/'.$portfolio->image_filename))) {
            unlink(public_path('images/'.$portfolio->image_filename));
        }
        $portfolio->delete();
        return redirect()->route('admin.portfolios.index')
                         ->with('success', 'Portfolio berhasil dihapus.');
    }
}
