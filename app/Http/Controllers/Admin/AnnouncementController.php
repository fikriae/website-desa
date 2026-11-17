<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AnnouncementController extends Controller
{
    /**
     * Menampilkan daftar pengumuman.
     */
    public function index()
    {
        $announcements = Announcement::with('author')
            ->latest()
            ->paginate(10);

        return view('admin.pengumuman.index', compact('announcements'));
    }

    /**
     * Menampilkan halaman tambah pengumuman.
     */
    public function create()
    {
        return view('admin.pengumuman.create');
    }

    /**
     * Menyimpan pengumuman baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'featured_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
            'status' => ['required', Rule::in(['draft', 'published'])],
        ]);

        // Membuat slug unik.
        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $counter = 1;

        while (Announcement::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        // Upload gambar utama.
        $imagePath = null;

        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')
                ->store('announcements', 'public');
        }

        Announcement::create([
            'user_id' => $request->user()->getAuthIdentifier(),
            'title' => $validated['title'],
            'slug' => $slug,
            'excerpt' => $validated['excerpt'] ?? null,
            'content' => $validated['content'],
            'featured_image' => $imagePath,
            'status' => $validated['status'],
            'published_at' => $validated['status'] === 'published'
                ? now()
                : null,
        ]);

        return redirect()
            ->route('admin.announcements.index')
            ->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    /**
     * Upload gambar untuk isi pengumuman.
     */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);

        $path = $request->file('image')
            ->store('announcements/content', 'public');

        return response()->json([
            'success' => true,
            'url' => asset('storage/' . $path),
        ]);
    }

    /**
     * Menampilkan detail pengumuman di admin.
     */
    public function show(Announcement $announcement)
    {
        return redirect()->route(
            'admin.announcements.edit',
            $announcement
        );
    }

    /**
     * Menampilkan halaman edit pengumuman.
     */
    public function edit(Announcement $announcement)
    {
        return view('admin.pengumuman.edit', compact('announcement'));
    }

    /**
     * Memperbarui pengumuman.
     */
    public function update(Request $request, Announcement $announcement)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'featured_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
            'status' => ['required', Rule::in(['draft', 'published'])],
        ]);

        // Membuat slug unik dan mengecualikan data saat ini.
        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $counter = 1;

        while (
            Announcement::where('slug', $slug)
                ->where('id', '!=', $announcement->id)
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter++;
        }

        // Mempertahankan gambar lama jika tidak ada gambar baru.
        $imagePath = $announcement->featured_image;

        if ($request->hasFile('featured_image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }

            $imagePath = $request->file('featured_image')
                ->store('announcements', 'public');
        }

        // Mengatur tanggal publikasi.
        $publishedAt = $announcement->published_at;

        if ($validated['status'] === 'published' && !$publishedAt) {
            $publishedAt = now();
        }

        if ($validated['status'] === 'draft') {
            $publishedAt = null;
        }

        $announcement->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'excerpt' => $validated['excerpt'] ?? null,
            'content' => $validated['content'],
            'featured_image' => $imagePath,
            'status' => $validated['status'],
            'published_at' => $publishedAt,
        ]);

        return redirect()
            ->route('admin.announcements.index')
            ->with('success', 'Pengumuman berhasil diperbarui.');
    }

    /**
     * Menghapus pengumuman.
     */
    public function destroy(Announcement $announcement)
    {
        if ($announcement->featured_image) {
            Storage::disk('public')->delete(
                $announcement->featured_image
            );
        }

        $announcement->delete();

        return redirect()
            ->route('admin.announcements.index')
            ->with('success', 'Pengumuman berhasil dihapus.');
    }
}
