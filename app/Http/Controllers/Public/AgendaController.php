<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Tampilkan semua agenda yang sudah dipublikasikan,
        // termasuk agenda yang tanggalnya sudah lewat.
        $query = Agenda::query()
            ->where('status', 'published');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('location', 'like', '%' . $search . '%');
            });
        }

        $agendas = $query
            ->orderBy('start_date', 'desc')
            ->paginate(9)
            ->withQueryString();

        return view('public.agenda.index', compact(
            'agendas',
            'search'
        ));
    }

    public function show(string $slug)
    {
        $agenda = Agenda::with('author')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        return view('public.agenda.show', compact('agenda'));
    }
}
