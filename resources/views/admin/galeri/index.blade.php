
@extends('admin.layouts.app')

@section('title', 'Galeri Desa')

@section('content')
<style>
    .gallery-page {
        max-width: 1200px;
        margin: 0 auto;
    }

    .gallery-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-bottom: 25px;
        flex-wrap: wrap;
    }

    .gallery-header h2 {
        font-size: 24px;
        font-weight: 700;
        color: #172554;
        margin: 0 0 6px;
    }

    .gallery-header p {
        color: #64748b;
        margin: 0;
        font-size: 14px;
    }

    .gallery-add {
        background: #1e462e;
        color: white;
        padding: 11px 18px;
        border-radius: 9px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
    }

    .gallery-add:hover {
        background: #163622;
        color: white;
    }

    .gallery-alert {
        padding: 13px 16px;
        border-radius: 8px;
        margin-bottom: 20px;
        background: #dcfce7;
        color: #166534;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 20px;
    }

    .gallery-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 13px;
        overflow: hidden;
        box-shadow: 0 3px 12px rgba(15, 23, 42, .04);
    }

    .gallery-image {
        width: 100%;
        height: 210px;
        object-fit: cover;
        display: block;
        background: #f1f5f9;
    }

    .gallery-body {
        padding: 16px;
    }

    .gallery-title {
        font-size: 16px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 7px;
        overflow-wrap: anywhere;
    }

    .gallery-description {
        color: #64748b;
        font-size: 13px;
        margin-bottom: 12px;
        line-height: 1.6;
    }

    .gallery-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 8px;
        margin-bottom: 15px;
        flex-wrap: wrap;
    }

    .gallery-album {
        font-size: 12px;
        color: #475569;
        background: #f1f5f9;
        padding: 5px 9px;
        border-radius: 20px;
    }

    .gallery-status {
        font-size: 12px;
        font-weight: 600;
        padding: 5px 9px;
        border-radius: 20px;
    }

    .gallery-status.active {
        background: #dcfce7;
        color: #166534;
    }

    .gallery-status.inactive {
        background: #fee2e2;
        color: #991b1b;
    }

    .gallery-actions {
        display: flex;
        gap: 8px;
    }

    .gallery-actions a,
    .gallery-actions button {
        flex: 1;
        border: none;
        text-align: center;
        padding: 9px;
        border-radius: 7px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
    }

    .gallery-edit {
        background: #eff6ff;
        color: #1d4ed8;
    }

    .gallery-delete {
        background: #fef2f2;
        color: #dc2626;
    }

    .gallery-empty {
        grid-column: 1 / -1;
        text-align: center;
        background: white;
        padding: 55px 20px;
        border: 1px dashed #cbd5e1;
        border-radius: 12px;
        color: #64748b;
    }

    .gallery-pagination {
        margin-top: 25px;
    }

    @media(max-width: 900px) {
        .gallery-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media(max-width: 600px) {
        .gallery-grid {
            grid-template-columns: 1fr;
        }

        .gallery-header {
            align-items: flex-start;
        }
    }
</style>

<div class="gallery-page">

    <div class="gallery-header">
        <div>
            <h2>Galeri Desa</h2>
            <p>Kelola dokumentasi foto kegiatan Desa Manyar.</p>
        </div>

        <a href="{{ route('admin.galleries.create') }}" class="gallery-add">
            + Tambah Foto
        </a>
    </div>

    @if(session('success'))
        <div class="gallery-alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="gallery-grid">

        @forelse($galleries as $gallery)

            <div class="gallery-card">

                <img
                    src="{{ asset('storage/' . $gallery->image_path) }}"
                    alt="{{ $gallery->title }}"
                    class="gallery-image"
                >

                <div class="gallery-body">

                    <div class="gallery-title">
                        {{ $gallery->title }}
                    </div>

                    <div class="gallery-description">
                        {{ Str::limit($gallery->description, 100) ?: 'Tidak ada deskripsi.' }}
                    </div>

                    <div class="gallery-meta">

                        <span class="gallery-album">
                            {{ $gallery->album ?: 'Tanpa Album' }}
                        </span>

                        @if($gallery->is_active)
                            <span class="gallery-status active">
                                Aktif
                            </span>
                        @else
                            <span class="gallery-status inactive">
                                Nonaktif
                            </span>
                        @endif

                    </div>

                    <div class="gallery-actions">

                        <a
                            href="{{ route('admin.galleries.edit', $gallery) }}"
                            class="gallery-edit"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('admin.galleries.destroy', $gallery) }}"
                            method="POST"
                            style="flex:1"
                            onsubmit="return confirm('Yakin ingin menghapus foto ini?')"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="gallery-delete" style="width:100%">
                                Hapus
                            </button>
                        </form>

                    </div>

                </div>
            </div>

        @empty

            <div class="gallery-empty">
                <h3>Belum Ada Foto Galeri</h3>
                <p>Silakan tambahkan foto kegiatan Desa Manyar.</p>
            </div>

        @endforelse

    </div>

    <div class="gallery-pagination">
        {{ $galleries->links() }}
    </div>

</div>
@endsection
