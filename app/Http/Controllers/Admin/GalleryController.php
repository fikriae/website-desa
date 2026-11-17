<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Menampilkan daftar galeri.
     */
    public function index()
    {
        $galleries = Gallery::with('author')
            ->orderBy('sort_order')
            ->latest()
            ->paginate(12);

        return view('admin.galeri.index', compact('galleries'));
    }

    /**
     * Menampilkan form tambah galeri.
     */
    public function create()
    {
        return view('admin.galeri.create');
    }

    /**
     * Menyimpan galeri baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'album' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ], [
            'title.required' => 'Judul foto wajib diisi.',
            'image.required' => 'Foto wajib diunggah.',
            'image.image' => 'File harus berupa gambar.',
            'image.max' => 'Ukuran foto maksimal 2 MB.',
        ]);

        $validated['image_path'] = $request->file('image')
            ->store('galleries', 'public');

        unset($validated['image']);

        $validated['user_id'] = $request->user()->getAuthIdentifier();
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $request->boolean('is_active');

        Gallery::create($validated);

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail galeri.
     */
    public function show(Gallery $gallery)
    {
        return redirect()->route('admin.galleries.edit', $gallery);
    }

    /**
     * Menampilkan form edit galeri.
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.galeri.edit', compact('gallery'));
    }

    /**
     * Memperbarui galeri.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'album' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ], [
            'title.required' => 'Judul foto wajib diisi.',
            'image.image' => 'File harus berupa gambar.',
            'image.max' => 'Ukuran foto maksimal 2 MB.',
        ]);

        if ($request->hasFile('image')) {
            if ($gallery->image_path) {
                Storage::disk('public')->delete($gallery->image_path);
            }

            $validated['image_path'] = $request->file('image')
                ->store('galleries', 'public');
        }

        unset($validated['image']);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $request->boolean('is_active');

        $gallery->update($validated);

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Foto galeri berhasil diperbarui.');
    }

    /**
     * Menghapus galeri.
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->image_path) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        $gallery->delete();

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Foto galeri berhasil dihapus.');
    }
}
