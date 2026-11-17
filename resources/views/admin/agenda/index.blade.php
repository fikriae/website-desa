
@extends('admin.layouts.app')

@section('title', 'Agenda Kegiatan - Admin Desa Manyar')

@push('styles')
<style>
    .agenda-page {
        max-width: 1400px;
        margin: 0 auto;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-bottom: 25px;
        flex-wrap: wrap;
    }

    .page-title {
        margin: 0;
        color: #1e293b;
        font-size: 25px;
        font-weight: 800;
    }

    .page-description {
        margin: 7px 0 0;
        color: #64748b;
        font-size: 13px;
    }

    .btn-add {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 11px 17px;
        background: #1e462e;
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        transition: .2s;
    }

    .btn-add:hover {
        background: #163923;
        color: white;
    }

    .agenda-summary {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 16px;
        margin-bottom: 22px;
    }

    .summary-card {
        display: flex;
        align-items: center;
        gap: 15px;
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 19px;
    }

    .summary-icon {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: #eaf2ed;
        color: #1e462e;
        font-size: 20px;
        flex-shrink: 0;
    }

    .summary-label {
        color: #64748b;
        font-size: 12px;
        margin-bottom: 5px;
    }

    .summary-value {
        color: #1e293b;
        font-size: 22px;
        font-weight: 800;
    }

    .agenda-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 13px;
        overflow: hidden;
    }

    .agenda-card-header {
        padding: 19px 22px;
        border-bottom: 1px solid #e5e7eb;
    }

    .agenda-card-header h3 {
        margin: 0;
        font-size: 15px;
        font-weight: 750;
        color: #1e293b;
    }

    .agenda-card-header p {
        margin: 5px 0 0;
        font-size: 12px;
        color: #64748b;
    }

    .agenda-table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .agenda-table {
        width: 100%;
        min-width: 1050px;
        border-collapse: collapse;
    }

    .agenda-table th {
        padding: 14px 15px;
        background: #f8fafc;
        color: #64748b;
        font-size: 11px;
        font-weight: 800;
        text-align: left;
        text-transform: uppercase;
        letter-spacing: .4px;
        white-space: nowrap;
    }

    .agenda-table td {
        padding: 15px;
        border-bottom: 1px solid #f1f5f9;
        color: #475569;
        font-size: 12px;
        vertical-align: middle;
    }

    .agenda-table tbody tr:hover {
        background: #fafcfb;
    }

    .agenda-table tbody tr:last-child td {
        border-bottom: none;
    }

    .agenda-image {
        width: 76px;
        height: 56px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #e5e7eb;
    }

    .no-image {
        width: 76px;
        height: 56px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f1f5f9;
        color: #94a3b8;
        border-radius: 8px;
        font-size: 10px;
    }

    .agenda-title {
        color: #1e293b;
        font-size: 13px;
        font-weight: 700;
        line-height: 1.5;
        min-width: 160px;
        max-width: 230px;
        white-space: normal;
    }

    .agenda-location {
        max-width: 160px;
        line-height: 1.5;
    }

    .agenda-date {
        color: #334155;
        font-weight: 600;
        white-space: nowrap;
    }

    .agenda-end-date {
        display: block;
        margin-top: 5px;
        color: #94a3b8;
        font-size: 11px;
        white-space: nowrap;
    }

    .status-badge {
        display: inline-block;
        padding: 6px 11px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    .status-published {
        background: #dcfce7;
        color: #166534;
    }

    .status-draft {
        background: #fef3c7;
        color: #92400e;
    }

    .action-buttons {
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .btn-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 12px;
        border-radius: 7px;
        font-size: 11px;
        font-weight: 700;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: .2s;
    }

    .btn-edit {
        background: #eaf2ed;
        color: #1e462e;
    }

    .btn-edit:hover {
        background: #d6e7da;
        color: #163923;
    }

    .btn-delete {
        background: #fef2f2;
        color: #dc2626;
    }

    .btn-delete:hover {
        background: #fee2e2;
    }

    .empty-state {
        padding: 55px 20px;
        text-align: center;
    }

    .empty-icon {
        width: 55px;
        height: 55px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        border-radius: 50%;
        background: #eaf2ed;
        color: #1e462e;
        font-size: 23px;
    }

    .empty-state h3 {
        color: #334155;
        font-size: 16px;
        margin: 0 0 7px;
    }

    .empty-state p {
        color: #94a3b8;
        font-size: 12px;
        margin: 0 0 17px;
    }

    .agenda-pagination {
        padding: 18px 22px;
        border-top: 1px solid #e5e7eb;
    }

    .alert-message {
        padding: 13px 16px;
        margin-bottom: 18px;
        border-radius: 9px;
        font-size: 13px;
    }

    .alert-success {
        background: #ecfdf5;
        color: #166534;
        border: 1px solid #bbf7d0;
    }

    .alert-danger {
        background: #fef2f2;
        color: #991b1b;
        border: 1px solid #fecaca;
    }

    .alert-danger ul {
        margin: 0;
        padding-left: 20px;
    }

    @media (max-width: 700px) {
        .page-title {
            font-size: 21px;
        }

        .page-header {
            align-items: flex-start;
        }

        .btn-add {
            width: 100%;
        }

        .agenda-summary {
            gap: 10px;
        }

        .summary-card {
            padding: 13px;
            gap: 10px;
        }

        .summary-icon {
            width: 37px;
            height: 37px;
            font-size: 17px;
        }

        .summary-value {
            font-size: 19px;
        }

        .summary-label {
            font-size: 10px;
        }

        .agenda-card-header {
            padding: 16px;
        }

        .agenda-pagination {
            padding: 15px;
            overflow-x: auto;
        }
    }

    @media (max-width: 380px) {
        .agenda-summary {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')

<div class="container agenda-page">

    {{-- HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Agenda Kegiatan</h1>
            <p class="page-description">
                Kelola jadwal dan informasi kegiatan Desa Manyar.
            </p>
        </div>

        <a href="{{ route('admin.agendas.create') }}" class="btn-add">
            + Tambah Agenda
        </a>
    </div>

    {{-- NOTIFIKASI --}}
    @if(session('success'))
        <div class="alert-message alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert-message alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert-message alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul style="margin-top: 7px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- RINGKASAN --}}
    <div class="agenda-summary">

        <div class="summary-card">
            <div class="summary-icon">▤</div>
            <div>
                <div class="summary-label">Total Agenda</div>
                <div class="summary-value">
                    {{ $agendas->total() }}
                </div>
            </div>
        </div>

        <div class="summary-card">
            <div class="summary-icon">✓</div>
            <div>
                <div class="summary-label">Agenda Dipublikasikan</div>
                <div class="summary-value">
                    {{ \App\Models\Agenda::where('status', 'published')->count() }}
                </div>
            </div>
        </div>

    </div>

    {{-- TABEL AGENDA --}}
    <div class="agenda-card">

        <div class="agenda-card-header">
            <h3>Daftar Agenda Kegiatan</h3>
            <p>Informasi seluruh agenda kegiatan Desa Manyar.</p>
        </div>

        <div class="agenda-table-wrapper">
            <table class="agenda-table">

                <thead>
                    <tr>
                        <th width="55">No.</th>
                        <th width="100">Gambar</th>
                        <th>Nama Kegiatan</th>
                        <th>Lokasi</th>
                        <th>Waktu Pelaksanaan</th>
                        <th>Status</th>
                        <th>Penulis</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($agendas as $agenda)
                        <tr>

                            <td>
                                {{ $agendas->firstItem() + $loop->index }}
                            </td>

                            {{-- GAMBAR --}}
                            <td>
                                @if($agenda->featured_image)
                                    <img
                                        src="{{ asset('storage/' . $agenda->featured_image) }}"
                                        alt="{{ $agenda->title }}"
                                        class="agenda-image"
                                        loading="lazy">
                                @else
                                    <div class="no-image">
                                        Tidak ada
                                    </div>
                                @endif
                            </td>

                            {{-- NAMA KEGIATAN --}}
                            <td>
                                <div class="agenda-title">
                                    {{ $agenda->title }}
                                </div>
                            </td>

                            {{-- LOKASI --}}
                            <td>
                                <div class="agenda-location">
                                    {{ $agenda->location ?: '-' }}
                                </div>
                            </td>

                            {{-- WAKTU --}}
                            <td>
                                <div class="agenda-date">
                                    {{ $agenda->start_date?->format('d M Y, H:i') ?? '-' }}
                                </div>

                                @if($agenda->end_date)
                                    <span class="agenda-end-date">
                                        s.d. {{ $agenda->end_date->format('d M Y, H:i') }}
                                    </span>
                                @endif
                            </td>

                            {{-- STATUS --}}
                            <td>
                                @if($agenda->status === 'published')
                                    <span class="status-badge status-published">
                                        Dipublikasikan
                                    </span>
                                @else
                                    <span class="status-badge status-draft">
                                        Draft
                                    </span>
                                @endif
                            </td>

                            {{-- PENULIS --}}
                            <td>
                                {{ $agenda->author?->name ?? '-' }}
                            </td>

                            {{-- AKSI --}}
                            <td>
                                <div class="action-buttons">

                                    <a href="{{ route('admin.agendas.edit', $agenda) }}"
                                       class="btn-action btn-edit">
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.agendas.destroy', $agenda) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus agenda ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn-action btn-delete">
                                            Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">
                                <div class="empty-state">
                                    <div class="empty-icon">▤</div>

                                    <h3>Belum Ada Agenda</h3>

                                    <p>
                                        Belum ada agenda kegiatan yang ditambahkan.
                                    </p>

                                    <a href="{{ route('admin.agendas.create') }}"
                                       class="btn-add">
                                        + Tambah Agenda Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        {{-- PAGINATION --}}
        @if($agendas->hasPages())
            <div class="agenda-pagination">
                {{ $agendas->links() }}
            </div>
        @endif

    </div>

</div>

@endsection
