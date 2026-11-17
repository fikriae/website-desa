<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    /**
     * Menampilkan daftar dokumen.
     */
    public function index()
    {
        $documents = Document::with('author')
            ->orderBy('sort_order')
            ->latest()
            ->paginate(10);

        return view('admin.dokumen.index', compact('documents'));
    }

    /**
     * Menampilkan form tambah dokumen.
     */
    public function create()
    {
        return view('admin.dokumen.create');
    }

    /**
     * Menyimpan dokumen baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:10240',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ], [
            'title.required' => 'Judul dokumen wajib diisi.',
            'file.required' => 'File dokumen wajib diunggah.',
            'file.mimes' => 'Format file tidak didukung.',
            'file.max' => 'Ukuran file maksimal 10 MB.',
        ]);

        $file = $request->file('file');

        $validated['slug'] = $this->generateUniqueSlug($validated['title']);

        $validated['file_path'] = $file->store('documents', 'public');
        $validated['file_type'] = strtolower($file->getClientOriginalExtension());

        unset($validated['file']);

        $validated['user_id'] = $request->user()->getAuthIdentifier();
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $request->boolean('is_active');

        Document::create($validated);

        return redirect()
            ->route('admin.documents.index')
            ->with('success', 'Dokumen berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail dokumen.
     */
    public function show(Document $document)
    {
        return redirect()->route('admin.documents.edit', $document);
    }

    /**
     * Menampilkan form edit dokumen.
     */
    public function edit(Document $document)
    {
        return view('admin.dokumen.edit', compact('document'));
    }

    /**
     * Memperbarui dokumen.
     */
    public function update(Request $request, Document $document)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:10240',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ], [
            'title.required' => 'Judul dokumen wajib diisi.',
            'file.mimes' => 'Format file tidak didukung.',
            'file.max' => 'Ukuran file maksimal 10 MB.',
        ]);

        // Membuat slug baru jika judul berubah.
        if ($document->title !== $validated['title']) {
            $validated['slug'] = $this->generateUniqueSlug(
                $validated['title'],
                $document->id
            );
        }

        // Mengganti file jika ada unggahan baru.
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $newFilePath = $file->store('documents', 'public');

            if ($document->file_path) {
                Storage::disk('public')->delete($document->file_path);
            }

            $validated['file_path'] = $newFilePath;
            $validated['file_type'] = strtolower(
                $file->getClientOriginalExtension()
            );
        }

        unset($validated['file']);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $request->boolean('is_active');

        $document->update($validated);

        return redirect()
            ->route('admin.documents.index')
            ->with('success', 'Dokumen berhasil diperbarui.');
    }

    /**
     * Menghapus dokumen.
     */
    public function destroy(Document $document)
    {
        if ($document->file_path) {
            Storage::disk('public')->delete($document->file_path);
        }

        $document->delete();

        return redirect()
            ->route('admin.documents.index')
            ->with('success', 'Dokumen berhasil dihapus.');
    }

    /**
     * Membuat slug unik berdasarkan judul.
     */
    private function generateUniqueSlug(
        string $title,
        ?int $ignoreId = null
    ): string {
        $baseSlug = Str::slug($title);

        if ($baseSlug === '') {
            $baseSlug = 'dokumen';
        }

        $slug = $baseSlug;
        $counter = 1;

        while (
            Document::where('slug', $slug)
                ->when($ignoreId, function ($query) use ($ignoreId) {
                    $query->where('id', '!=', $ignoreId);
                })
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
