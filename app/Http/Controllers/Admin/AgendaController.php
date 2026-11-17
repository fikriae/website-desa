<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::with('author')
            ->latest('start_date')
            ->paginate(10);

        return view('admin.agenda.index', compact('agendas'));
    }

    public function create()
    {
        return view('admin.agenda.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        // Membuat slug otomatis dan unik
        $validated['slug'] = $this->generateUniqueSlug($validated['title']);

        // Upload gambar
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request
                ->file('featured_image')
                ->store('agendas', 'public');
        }

        $validated['user_id'] = $request->user()->getAuthIdentifier();

        Agenda::create($validated);

        return redirect()
            ->route('admin.agendas.index')
            ->with('success', 'Agenda berhasil ditambahkan.');
    }

    public function show(Agenda $agenda)
    {
        return redirect()->route('admin.agendas.edit', $agenda);
    }

    public function edit(Agenda $agenda)
    {
        return view('admin.agenda.edit', compact('agenda'));
    }

    public function update(Request $request, Agenda $agenda)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        // Perbarui slug jika judul berubah
        if ($agenda->title !== $validated['title']) {
            $validated['slug'] = $this->generateUniqueSlug(
                $validated['title'],
                $agenda->id
            );
        }

        // Ganti gambar jika ada gambar baru
        if ($request->hasFile('featured_image')) {
            if ($agenda->featured_image) {
                Storage::disk('public')->delete($agenda->featured_image);
            }

            $validated['featured_image'] = $request
                ->file('featured_image')
                ->store('agendas', 'public');
        }

        $agenda->update($validated);

        return redirect()
            ->route('admin.agendas.index')
            ->with('success', 'Agenda berhasil diperbarui.');
    }

    public function destroy(Agenda $agenda)
    {
        if ($agenda->featured_image) {
            Storage::disk('public')->delete($agenda->featured_image);
        }

        $agenda->delete();

        return redirect()
            ->route('admin.agendas.index')
            ->with('success', 'Agenda berhasil dihapus.');
    }

    /**
     * Membuat slug unik berdasarkan judul agenda.
     */
    private function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);

        if ($baseSlug === '') {
            $baseSlug = 'agenda';
        }

        $slug = $baseSlug;
        $counter = 1;

        while (
            Agenda::where('slug', $slug)
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
