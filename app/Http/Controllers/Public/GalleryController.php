<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Menampilkan galeri foto untuk masyarakat.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $album = $request->input('album');

        $query = Gallery::query()
            ->where('is_active', true);

        // Pencarian foto
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('album', 'like', '%' . $search . '%');
            });
        }

        // Filter berdasarkan album
        if ($album) {
            $query->where('album', $album);
        }

        $galleries = $query
            ->orderBy('sort_order')
            ->latest()
            ->paginate(12)
            ->withQueryString();

        // Mengambil daftar album yang memiliki foto aktif
        $albums = Gallery::query()
            ->where('is_active', true)
            ->whereNotNull('album')
            ->where('album', '!=', '')
            ->select('album')
            ->distinct()
            ->orderBy('album')
            ->pluck('album');

        return view('public.galeri.index', compact(
            'galleries',
            'albums',
            'search',
            'album'
        ));
    }
}
