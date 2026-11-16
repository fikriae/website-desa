<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('category')
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->paginate(9);

        return view('public.berita.index', compact('news'));
    }

    public function show(string $slug)
    {
        $news = News::with(['category', 'author'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->firstOrFail();

        $relatedNews = News::with('category')
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->where('id', '!=', $news->id)
            ->when(
                $news->category_id,
                fn ($query) => $query->where('category_id', $news->category_id)
            )
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('public.berita.show', compact('news', 'relatedNews'));
    }
}
