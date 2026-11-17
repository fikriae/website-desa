<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Menampilkan daftar berita publik.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $categoryId = $request->input('category');

        // Query berita yang sudah dipublikasikan.
        $query = News::with('category')
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());

        // Fitur pencarian berita.
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('excerpt', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%');
            });
        }

        // Filter berdasarkan kategori.
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        // Ambil berita dengan pagination.
        $news = $query
            ->latest('published_at')
            ->paginate(9)
            ->withQueryString();

        // Ambil kategori aktif.
        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('public.berita.index', compact(
            'news',
            'categories',
            'search',
            'categoryId'
        ));
    }

    /**
     * Menampilkan detail berita.
     */
    public function show(string $slug)
    {
        // Ambil berita berdasarkan slug.
        $news = News::with(['category', 'author'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->firstOrFail();

        // Ambil maksimal 3 berita terkait.
        $relatedNews = News::with('category')
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->where('id', '!=', $news->id)
            ->when(
                $news->category_id,
                fn ($query) => $query->where(
                    'category_id',
                    $news->category_id
                )
            )
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('public.berita.show', compact(
            'news',
            'relatedNews'
        ));
    }
}
