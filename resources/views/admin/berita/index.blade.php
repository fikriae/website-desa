
@extends('admin.layouts.app')

@section('title', 'Manajemen Berita - Desa Manyar')

@section('content')

<style>
    .news-page {
        width: 100%;
        max-width: 1400px;
        margin: 0 auto;
    }

    .news-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
        margin-bottom: 25px;
    }

    .news-heading h2 {
        margin: 0 0 7px;
        color: #1e293b;
        font-size: 25px;
        font-weight: 700;
    }

    .news-heading p {
        margin: 0;
        color: #64748b;
        font-size: 14px;
    }

    .btn-add-news {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 11px 18px;
        background: #1e462e;
        color: #fff;
        text-decoration: none;
        border-radius: 9px;
        font-size: 14px;
        font-weight: 600;
        transition: .2s;
        white-space: nowrap;
    }

    .btn-add-news:hover {
        background: #163723;
        color: #fff;
        transform: translateY(-1px);
    }

    .news-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 13px;
        padding: 20px;
        box-shadow: 0 3px 12px rgba(15, 23, 42, .035);
    }

    .news-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
        margin-bottom: 18px;
    }

    .news-card-header h3 {
        margin: 0;
        color: #1e293b;
        font-size: 17px;
        font-weight: 700;
    }

    .news-count {
        color: #64748b;
        font-size: 13px;
    }

    .news-table-wrapper {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .news-table {
        width: 100%;
        min-width: 850px;
        border-collapse: collapse;
    }

    .news-table thead th {
        padding: 14px 13px;
        background: #f8fafc;
        color: #475569;
        font-size: 12px;
        font-weight: 700;
        text-align: left;
        text-transform: uppercase;
        letter-spacing: .4px;
        border-bottom: 1px solid #e5e7eb;
        white-space: nowrap;
    }

    .news-table tbody td {
        padding: 15px 13px;
        color: #475569;
        font-size: 13px;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }

    .news-table tbody tr:last-child td {
        border-bottom: none;
    }

    .news-table tbody tr:hover {
        background: #fafcfb;
    }

    .news-number {
        color: #94a3b8;
        font-weight: 600;
    }

    .news-title {
        display: block;
        max-width: 300px;
        color: #1e293b;
        font-weight: 600;
        line-height: 1.5;
        overflow-wrap: anywhere;
    }

    .news-category {
        display: inline-block;
        padding: 5px 9px;
        background: #f1f5f9;
        color: #475569;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
    }

    .news-status {
        display: inline-flex;
        align-items: center;
        padding: 5px 10px;
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

    .news-actions {
        display: flex;
        align-items: center;
        gap: 7px;
        white-space: nowrap;
    }

    .btn-news-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 32px;
        padding: 7px 11px;
        border: none;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: .2s;
    }

    .btn-news-edit {
        background: #eaf2ed;
        color: #1e462e;
    }

    .btn-news-edit:hover {
        background: #d6e7db;
        color: #163723;
    }

    .btn-news-delete {
        background: #fee2e2;
        color: #b91c1c;
    }

    .btn-news-delete:hover {
        background: #fecaca;
        color: #991b1b;
    }

    .news-empty {
        padding: 45px 20px !important;
        text-align: center;
        color: #64748b !important;
    }

    .news-empty-icon {
        display: block;
        margin-bottom: 10px;
        font-size: 30px;
    }

    .news-alert {
        padding: 13px 16px;
        margin-bottom: 18px;
        border-radius: 9px;
        font-size: 13px;
    }

    .news-alert-success {
        background: #dcfce7;
        color: #166534;
        border: 1px solid #bbf7d0;
    }

    .news-alert-error {
        background: #fee2e2;
        color: #991b1b;
        border: 1px solid #fecaca;
    }

    .news-pagination {
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
    }

    @media (max-width: 768px) {
        .news-heading {
            align-items: flex-start;
        }

        .news-heading h2 {
            font-size: 21px;
        }

        .btn-add-news {
            width: 100%;
        }

        .news-card {
            padding: 14px;
        }

        .news-card-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .news-pagination {
            justify-content: center;
            overflow-x: auto;
        }
    }

    @media (max-width: 480px) {
        .news-heading h2 {
            font-size: 19px;
        }

        .news-heading p {
            font-size: 13px;
            line-height: 1.6;
        }

        .news-card {
            padding: 11px;
            border-radius: 10px;
        }

        .news-table {
            min-width: 780px;
        }
    }
</style>

<div class="news-page">

    <div class="news-heading">
        <div>
            <h2>Manajemen Berita</h2>
            <p>Kelola berita dan informasi Desa Manyar.</p>
        </div>

        <a href="{{ route('admin.news.create') }}" class="btn-add-news">
            <span>+</span>
            Tambah Berita
        </a>
    </div>

    @if (session('success'))
        <div class="news-alert news-alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="news-alert news-alert-error">
            Terjadi kesalahan. Silakan periksa kembali data berita.
        </div>
    @endif

    <div class="news-card">

        <div class="news-card-header">
            <h3>Daftar Berita</h3>

            <span class="news-count">
                Total {{ $news->total() }} berita
            </span>
        </div>

        <div class="news-table-wrapper">
            <table class="news-table">
                <thead>
                    <tr>
                        <th width="55">No.</th>
                        <th>Judul Berita</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($news as $item)
                        <tr>
                            <td class="news-number">
                                {{ $news->firstItem() + $loop->index }}
                            </td>

                            <td>
                                <span class="news-title">
                                    {{ $item->title }}
                                </span>
                            </td>

                            <td>
                                <span class="news-category">
                                    {{ $item->category?->name ?? '-' }}
                                </span>
                            </td>

                            <td>
                                {{ $item->author?->name ?? '-' }}
                            </td>

                            <td>
                                @if ($item->status === 'published')
                                    <span class="news-status status-published">
                                        Terbit
                                    </span>
                                @else
                                    <span class="news-status status-draft">
                                        Draft
                                    </span>
                                @endif
                            </td>

                            <td>
                                {{ $item->created_at?->format('d-m-Y') ?? '-' }}
                            </td>

                            <td>
                                <div class="news-actions">
                                    <a href="{{ route('admin.news.edit', $item->id) }}"
                                       class="btn-news-action btn-news-edit">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.news.destroy', $item->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn-news-action btn-news-delete">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="news-empty">
                                <span class="news-empty-icon">📰</span>
                                <strong>Belum Ada Berita</strong>
                                <div style="margin-top:6px;">
                                    Silakan tambahkan berita pertama Desa Manyar.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($news->hasPages())
            <div class="news-pagination">
                {{ $news->links() }}
            </div>
        @endif

    </div>
</div>

@endsection
