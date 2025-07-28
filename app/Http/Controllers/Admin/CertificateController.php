<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::latest()->paginate(10);
        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'thumbnail_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file_pdf' => 'required|mimes:pdf|max:10240', // Max 10MB
        ]);

        $validated['thumbnail_image'] = $request->file('thumbnail_image')->store('certificate_thumbnails', 'public');
        $validated['file_pdf'] = $request->file('file_pdf')->store('certificate_pdfs', 'public');

        Certificate::create($validated);

        return redirect()->route('admin.certificates.index')->with('success', 'Sertifikat berhasil ditambahkan.');
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file_pdf' => 'nullable|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('thumbnail_image')) {
            Storage::disk('public')->delete($certificate->thumbnail_image);
            $validated['thumbnail_image'] = $request->file('thumbnail_image')->store('certificate_thumbnails', 'public');
        }

        if ($request->hasFile('file_pdf')) {
            Storage::disk('public')->delete($certificate->file_pdf);
            $validated['file_pdf'] = $request->file('file_pdf')->store('certificate_pdfs', 'public');
        }

        $certificate->update($validated);

        return redirect()->route('admin.certificates.index')->with('success', 'Sertifikat berhasil diperbarui.');
    }

    public function destroy(Certificate $certificate)
    {
        Storage::disk('public')->delete($certificate->thumbnail_image);
        Storage::disk('public')->delete($certificate->file_pdf);
        $certificate->delete();

        return redirect()->route('admin.certificates.index')->with('success', 'Sertifikat berhasil dihapus.');
    }
}