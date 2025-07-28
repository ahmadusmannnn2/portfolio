<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        $socialLinks = SocialLink::latest()->get();
        return view('admin.social_links.index', compact('socialLinks'));
    }

    public function create()
    {
        return view('admin.social_links.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
            'icon_class' => 'required|string|max:255',
        ]);

        SocialLink::create($validated);

        return redirect()->route('admin.social_links.index')->with('success', 'Link sosial media berhasil ditambahkan.');
    }

    public function edit(SocialLink $socialLink)
    {
        return view('admin.social_links.edit', compact('socialLink'));
    }

    public function update(Request $request, SocialLink $socialLink)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
            'icon_class' => 'required|string|max:255',
        ]);

        $socialLink->update($validated);

        return redirect()->route('admin.social_links.index')->with('success', 'Link sosial media berhasil diperbarui.');
    }

    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();
        return redirect()->route('admin.social_links.index')->with('success', 'Link sosial media berhasil dihapus.');
    }
}