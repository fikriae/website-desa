
@extends('admin.layouts.app')

@section('title', 'Layanan Surat')

@section('content')

<style>
    .document-page {
        max-width: 1400px;
        margin: 0 auto;
    }

    .document-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
        margin-bottom: 25px;
    }

    .document-header h2 {
        font-size: 24px;
        font-weight: 700;
        color: #1e293b;
        margin: 0 0 6px;
    }

    .document-header p {
        color: #64748b;
        margin: 0;
        font-size: 14px;
        line-height: 1.6;
    }

    .btn-add {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: #1e462e;
        color: #fff;
        padding: 11px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: .2s;
        white-space: nowrap;
    }

    .btn-add:hover {
        background: #163622;
        color: #fff;
        transform: translateY(-1px);
    }

    .document-alert {
        padding: 13px 16px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 14px;
        background: #dcfce7;
        color: #166534;
        border: 1px solid #bbf7d0;
    }

    .document-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 3px 12px rgba(15, 23, 42, .04);
    }

    .document-card-header {
        padding: 18px 20px;
        border-bottom: 1px solid #e5e7eb;
    }

    .document-card-header h3 {
        color: #1e293b;
        font-size: 16px;
        font-weight: 700;
        margin: 0 0 4px;
    }

    .document-card-header p {
        color: #94a3b8;
        font-size: 13px;
        margin: 0;
    }

    .document-table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .document-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 850px;
    }

    .document-table th {
        background: #f8fafc;
        color: #475569;
        font-size: 12px;
        font-weight: 700;
        text-align: left;
        padding: 15px;
        border-bottom: 1px solid #e5e7eb;
        text-transform: uppercase;
        letter-spacing: .4px;
        white-space: nowrap;
    }

    .document-table td {
        padding: 15px;
        border-bottom: 1px solid #f1f5f9;
        color: #475569;
        font-size: 13px;
        vertical-align: middle;
    }

    .document-table tbody tr:hover {
        background: #fafcfb;
    }

    .document-table tbody tr:last-child td {
        border-bottom: none;
    }

    .document-title {
        color: #1e293b;
        font-weight: 700;
        font-size: 14px;
        margin-bottom: 5px;
        line-height: 1.5;
    }

    .document-description {
        color: #94a3b8;
        max-width: 300px;
        line-height: 1.5;
    }

    .file-badge {
        display: inline-block;
        padding: 5px 9px;
        border-radius: 6px;
        background: #eff6ff;
        color: #1d4ed8;
        font-weight: 700;
        font-size: 11px;
        text-transform: uppercase;
    }

    .status-badge {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    .status-active {
        background: #dcfce7;
        color: #166534;
    }

    .status-inactive {
        background: #fee2e2;
        color: #991b1b;
    }

    .document-actions {
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .document-actions a,
    .document-actions button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: none;
        padding: 8px 11px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        transition: .2s;
    }

    .btn-edit {
        background: #eff6ff;
        color: #1d4ed8;
    }

    .btn-edit:hover {
        background: #dbeafe;
        color: #1e40af;
    }

    .btn-delete {
        background: #fef2f2;
        color: #dc2626;
    }

    .btn-delete:hover {
        background: #fee2e2;
        color: #b91c1c;
    }

    .document-empty {
        text-align: center;
        padding: 55px 20px;
        color: #64748b;
    }

    .document-empty-icon {
        width: 55px;
        height: 55px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        border-radius: 14px;
        background: #eaf2ed;
        color: #1e462e;
        font-size: 24px;
    }

    .document-empty h3 {
        color: #334155;
        font-size: 16px;
        margin: 0 0 8px;
    }

    .document-empty p {
        font-size: 13px;
        margin: 0;
    }

    .document-pagination {
        padding: 18px 20px;
        border-top: 1px solid #f1f5f9;
    }

    @media (max-width: 600px) {
        .document-header {
            align-items: flex-start;
        }

        .document-header h2 {
            font-size: 21px;
        }

        .btn-add {
            width: 100%;
        }

        .document-card-header {
            padding: 15px;
        }

        .document-pagination {
            padding: 15px;
            overflow-x: auto;
        }
    }
</style>

<div class="document-page">

    <div class="document-header">
        <div>
            <h2>Layanan Surat</h2>
            <p>Kelola dokumen dan formulir layanan administrasi Desa Manyar.</p>
        </div>

        <a href="{{ route('admin.documents.create') }}" class="btn-add">
            <span>＋</span>
            Tambah Dokumen
        </a>
    </div>

    @if(session('success'))
        <div class="document-alert">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="document-alert" style="background:#fee2e2;color:#991b1b;border-color:#fecaca;">
            {{ session('error') }}
        </div>
    @endif

    <div class="document-card">

        <div class="document-card-header">
            <h3>Daftar Dokumen</h3>
            <p>Informasi seluruh dokumen layanan surat yang tersimpan.</p>
        </div>

        <div class="document-table-wrapper">
            <table class="document-table">
                <thead>
                    <tr>
                        <th width="55">No.</th>
                        <th>Nama Dokumen</th>
                        <th>Format</th>
                        <th>Urutan</th>
                        <th>Status</th>
                        <th>Pengunggah</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($documents as $document)
                        <tr>
                            <td>
                                {{ $documents->firstItem() + $loop->index }}
                            </td>

                            <td>
                                <div class="document-title">
                                    {{ $document->title }}
                                </div>

                                <div class="document-description">
                                    {{ \Illuminate\Support\Str::limit($document->description, 90) ?: 'Tidak ada deskripsi.' }}
                                </div>
                            </td>

                            <td>
                                <span class="file-badge">
                                    {{ $document->file_type ?: 'FILE' }}
                                </span>
                            </td>

                            <td>
                                {{ $document->sort_order }}
                            </td>

                            <td>
                                @if($document->is_active)
                                    <span class="status-badge status-active">
                                        Aktif
                                    </span>
                                @else
                                    <span class="status-badge status-inactive">
                                        Nonaktif
                                    </span>
                                @endif
                            </td>

                            <td>
                                {{ $document->author?->name ?? 'Admin' }}
                            </td>

                            <td>
                                <div class="document-actions">

                                    <a
                                        href="{{ route('admin.documents.edit', $document) }}"
                                        class="btn-edit"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.documents.destroy', $document) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus dokumen ini?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-delete">
                                            Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="document-empty">
                                    <div class="document-empty-icon">▤</div>
                                    <h3>Belum Ada Dokumen</h3>
                                    <p>Silakan tambahkan dokumen layanan surat melalui tombol Tambah Dokumen.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($documents->hasPages())
            <div class="document-pagination">
                {{ $documents->links() }}
            </div>
        @endif

    </div>

</div>
@endsection
