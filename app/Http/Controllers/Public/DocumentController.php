<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $documents = Document::query()
            ->where('is_active', true)
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->search;

                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->orderBy('sort_order')
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('public.dokumen.index', compact('documents'));
    }

    public function download(Document $document)
    {
        abort_unless($document->is_active, 404);

        if (
            !$document->file_path ||
            !Storage::disk('public')->exists($document->file_path)
        ) {
            abort(404, 'File dokumen tidak ditemukan.');
        }

        $path = Storage::disk('public')->path($document->file_path);

        $extension = $document->file_type ?: 'pdf';

        $filename = Str::slug($document->title) . '.' . $extension;

        return response()->download($path, $filename);
    }
}
