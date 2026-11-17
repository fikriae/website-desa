
@extends('admin.layouts.app')

@section('title', 'Pengumuman Desa')

@push('styles')
<style>
    .announcement-page {
        max-width: 1400px;
        margin: 0 auto;
    }

    /* HEADER */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 25px;
        flex-wrap: wrap;
    }

    .page-header h1 {
        font-size: 25px;
        font-weight: 800;
        color: #1e293b;
        margin: 0 0 7px;
    }

    .page-header p {
        color: #64748b;
        font-size: 13px;
        margin: 0;
    }

    .btn-add {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 11px 18px;
        background: #1e462e;
        color: white;
        text-decoration: none;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 700;
        transition: .2s;
        border: 1px solid #1e462e;
    }

    .btn-add:hover {
        background: #163722;
        color: white;
        transform: translateY(-1px);
    }

    /* STATISTIK */
    .announcement-summary {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 16px;
        margin-bottom: 22px;
    }

    .summary-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 18px 20px;
        display: flex;
        align-items: center;
        gap: 15px;
        box-shadow: 0 2px 8px rgba(15, 23, 42, .03);
    }

    .summary-icon {
        width: 46px;
        height: 46px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 11px;
        background: #eaf2ed;
        color: #1e462e;
        font-size: 21px;
    }

    .summary-info span {
        display: block;
        color: #64748b;
        font-size: 12px;
        margin-bottom: 5px;
    }

    .summary-info strong {
        display: block;
        color: #1e293b;
        font-size: 22px;
        font-weight: 800;
    }

    /* CARD DAFTAR */
    .announcement-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 13px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(15, 23, 42, .03);
    }

    .card-top {
        padding: 20px 22px;
        border-bottom: 1px solid #edf0f2;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .card-top h3 {
        color: #1e293b;
        font-size: 15px;
        font-weight: 800;
        margin: 0;
    }

    .total-label {
        color: #64748b;
        font-size: 12px;
        background: #f1f5f9;
        padding: 7px 11px;
        border-radius: 7px;
    }

    /* TABLE */
    .table-responsive {
        width: 100%;
        overflow-x: auto;
    }

    .announcement-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 750px;
    }

    .announcement-table th {
        background: #f8fafc;
        color: #64748b;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .5px;
        padding: 14px 18px;
        text-align: left;
        white-space: nowrap;
    }

    .announcement-table td {
        padding: 16px 18px;
        border-bottom: 1px solid #edf0f2;
        color: #475569;
        font-size: 13px;
        vertical-align: middle;
    }

    .announcement-table tbody tr:last-child td {
        border-bottom: none;
    }

    .announcement-table tbody tr:hover {
        background: #fafcfb;
    }

    .announcement-title {
        color: #1e293b;
        font-weight: 700;
        font-size: 13px;
        margin-bottom: 5px;
        max-width: 330px;
        line-height: 1.5;
    }

    .announcement-slug {
        color: #94a3b8;
        font-size: 11px;
        word-break: break-all;
    }

    /* STATUS */
    .status-badge {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
    }

    .status-published {
        background: #eaf2ed;
        color: #1e462e;
    }

    .status-draft {
        background: #f1f5f9;
        color: #64748b;
    }

    /* AKSI */
    .action-group {
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .action-group form {
        margin: 0;
    }

    .btn-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 7px 11px;
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
        background: #dce9df;
        color: #163722;
    }

    .btn-delete {
        background: #fef2f2;
        color: #dc2626;
    }

    .btn-delete:hover {
        background: #fee2e2;
    }

    /* EMPTY STATE */
    .empty-state {
        text-align: center;
        padding: 55px 20px;
    }

    .empty-icon {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        background: #eaf2ed;
        color: #1e462e;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 17px;
        font-size: 25px;
    }

    .empty-state h3 {
        color: #1e293b;
        font-size: 16px;
        margin-bottom: 8px;
    }

    .empty-state p {
        color: #94a3b8;
        font-size: 13px;
        margin-bottom: 18px;
    }

    /* PAGINATION */
    .pagination-wrapper {
        padding: 18px 22px;
        border-top: 1px solid #edf0f2;
    }

    .pagination-wrapper nav {
        display: flex;
        justify-content: flex-end;
    }

    .pagination-wrapper p {
        margin: 0;
    }

    /* ALERT */
    .announcement-alert {
        padding: 13px 16px;
        margin-bottom: 20px;
        background: #eaf2ed;
        color: #1e462e;
        border: 1px solid #c9ddce;
        border-radius: 9px;
        font-size: 13px;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .page-header h1 {
            font-size: 22px;
        }

        .announcement-summary {
            grid-template-columns: 1fr;
        }

        .card-top {
            padding: 16px;
        }

        .announcement-table td,
        .announcement-table th {
            padding: 13px 14px;
        }
    }

    @media (max-width: 600px) {
        .page-header {
            align-items: flex-start;
        }

        .page-header .btn-add {
            width: 100%;
        }

        .summary-card {
            padding: 15px;
        }
    }
</style>
@endpush

@section('content')

<div class="announcement-page">

    {{-- HEADER HALAMAN --}}
    <div class="page-header">
        <div>
            <h1>Pengumuman Desa</h1>
            <p>Kelola informasi dan pengumuman untuk masyarakat Desa Manyar.</p>
        </div>

        <a href="{{ route('admin.announcements.create') }}" class="btn-add">
            <span>+</span>
            Tambah Pengumuman
        </a>
    </div>

    {{-- PESAN SUKSES --}}
    @if (session('success'))
        <div class="announcement-alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- RINGKASAN --}}
    <div class="announcement-summary">

        <div class="summary-card">
            <div class="summary-icon">▤</div>
            <div class="summary-info">
                <span>Total Pengumuman</span>
                <strong>{{ $announcements->total() }}</strong>
            </div>
        </div>

        <div class="summary-card">
            <div class="summary-icon">✓</div>
            <div class="summary-info">
                <span>Pengumuman Ditampilkan</span>
                <strong>
                    {{ \App\Models\Announcement::where('status', 'published')->count() }}
                </strong>
            </div>
        </div>

    </div>

    {{-- DAFTAR PENGUMUMAN --}}
    <div class="announcement-card">

        <div class="card-top">
            <h3>Daftar Pengumuman</h3>

            <span class="total-label">
                Total {{ $announcements->total() }} pengumuman
            </span>
        </div>

        <div class="table-responsive">

            <table class="announcement-table">

                <thead>
                    <tr>
                        <th width="50">No.</th>
                        <th>Judul Pengumuman</th>
                        <th>Penulis</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($announcements as $index => $announcement)

                        <tr>
                            <td>
                                {{ $announcements->firstItem() + $index }}
                            </td>

                            <td>
                                <div class="announcement-title">
                                    {{ $announcement->title }}
                                </div>

                                <div class="announcement-slug">
                                    {{ $announcement->slug }}
                                </div>
                            </td>

                            <td>
                                {{ $announcement->author?->name ?? 'Tidak diketahui' }}
                            </td>

                            <td>
                                @if ($announcement->status === 'published')
                                    <span class="status-badge status-published">
                                        Published
                                    </span>
                                @else
                                    <span class="status-badge status-draft">
                                        Draft
                                    </span>
                                @endif
                            </td>

                            <td>
                                {{ $announcement->created_at?->translatedFormat('d M Y') ?? '-' }}
                            </td>

                            <td>
                                <div class="action-group">

                                    <a
                                        href="{{ route('admin.announcements.edit', $announcement->id) }}"
                                        class="btn-action btn-edit">
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.announcements.destroy', $announcement->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengumuman ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-action btn-delete">
                                            Hapus
                                        </button>

                                    </form>

                                </div>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="6">

                                <div class="empty-state">

                                    <div class="empty-icon">
                                        ▤
                                    </div>

                                    <h3>Belum Ada Pengumuman</h3>

                                    <p>
                                        Belum ada pengumuman yang ditambahkan.
                                        Silakan buat pengumuman pertama.
                                    </p>

                                    <a
                                        href="{{ route('admin.announcements.create') }}"
                                        class="btn-add">
                                        + Tambah Pengumuman
                                    </a>

                                </div>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- PAGINATION --}}
        @if ($announcements->hasPages())
            <div class="pagination-wrapper">
                {{ $announcements->links() }}
            </div>
        @endif

    </div>

</div>

@endsection
