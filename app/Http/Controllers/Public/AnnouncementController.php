<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Announcement::query()
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('excerpt', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%');
            });
        }

        $announcements = $query
            ->latest('published_at')
            ->paginate(9)
            ->withQueryString();

        return view('public.pengumuman.index', compact(
            'announcements',
            'search'
        ));
    }

    public function show(string $slug)
    {
        $announcement = Announcement::with('author')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->firstOrFail();

        $relatedAnnouncements = Announcement::query()
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->where('id', '!=', $announcement->id)
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('public.pengumuman.show', compact(
            'announcement',
            'relatedAnnouncements'
        ));
    }
}
