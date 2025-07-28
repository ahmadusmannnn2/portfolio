<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function index()
    {
        // Ambil semua konten dan ubah menjadi format key => value agar mudah diakses
        $contents = Content::all()->keyBy('key');
        return view('admin.content.index', compact('contents'));
    }

    public function update(Request $request)
    {
        $contents = Content::all();

        foreach ($contents as $content) {
            $key = $content->key;
            
            if ($request->has($key)) {
                if ($content->type === 'image' || $content->type === 'file') {
                    if ($request->hasFile($key)) {
                        // Hapus file lama jika ada
                        if ($content->value && Storage::disk('public')->exists($content->value)) {
                            Storage::disk('public')->delete($content->value);
                        }
                        // Simpan file baru
                        $path = $request->file($key)->store('site', 'public');
                        $content->value = $path;
                        $content->save();
                    }
                } else {
                    $content->value = $request->input($key);
                    $content->save();
                }
            }
        }

        return redirect()->route('admin.content.index')->with('success', 'Tampilan berhasil diperbarui.');
    }
}