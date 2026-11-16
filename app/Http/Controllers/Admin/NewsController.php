<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class NewsController extends Controller
{
    /**
     * Menampilkan daftar berita.
     */
    public function index()
    {
        $news = News::with(['category', 'author'])
            ->latest()
            ->paginate(10);

        return view('admin.berita.index', compact('news'));
    }

    /**
     * Menampilkan form tambah berita.
     */
    public function create()
    {
        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('admin.berita.create', compact('categories'));
    }

    /**
     * Menyimpan berita baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => ['nullable', 'exists:categories,id'],
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

        // Membuat slug unik
        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $counter = 1;

        while (News::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        // Upload gambar sampul
        $imagePath = null;

        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')
                ->store('news', 'public');
        }

        // Simpan berita
        News::create([
            'category_id' => $validated['category_id'] ?? null,
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
            ->route('admin.news.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Upload gambar untuk isi berita Quill Editor.
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
            ->store('news/content', 'public');

        return response()->json([
            'success' => true,
            'url' => asset('storage/' . $path),
        ]);
    }

    /**
     * Menampilkan detail berita.
     */
    public function show(News $news)
    {
        return redirect()->route('admin.news.edit', $news);
    }

    /**
     * Menampilkan form edit berita.
     */
    public function edit(News $news)
    {
        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('admin.berita.edit', compact('news', 'categories'));
    }

    /**
     * Memperbarui berita.
     */
    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'category_id' => ['nullable', 'exists:categories,id'],
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

        // Membuat slug unik
        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $counter = 1;

        while (
            News::where('slug', $slug)
                ->where('id', '!=', $news->getKey())
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter++;
        }

        // Pertahankan gambar lama jika tidak ada gambar baru
        $imagePath = $news->featured_image;

        if ($request->hasFile('featured_image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }

            $imagePath = $request->file('featured_image')
                ->store('news', 'public');
        }

        // Mengatur tanggal publikasi
        $publishedAt = $news->published_at;

        if ($validated['status'] === 'published' && !$publishedAt) {
            $publishedAt = now();
        }

        if ($validated['status'] === 'draft') {
            $publishedAt = null;
        }

        // Update berita
        $news->update([
            'category_id' => $validated['category_id'] ?? null,
            'title' => $validated['title'],
            'slug' => $slug,
            'excerpt' => $validated['excerpt'] ?? null,
            'content' => $validated['content'],
            'featured_image' => $imagePath,
            'status' => $validated['status'],
            'published_at' => $publishedAt,
        ]);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Menghapus berita.
     */
    public function destroy(News $news)
    {
        // Hapus gambar sampul dari storage
        if ($news->featured_image) {
            Storage::disk('public')->delete($news->featured_image);
        }

        // Hapus data berita
        $news->delete();

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
