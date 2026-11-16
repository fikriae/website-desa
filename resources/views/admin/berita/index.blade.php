
@extends('admin.layouts.app')

@section('title', 'Manajemen Berita - Desa Manyar')

@section('content')
<div class="container">

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:25px; gap:15px; flex-wrap:wrap;">
        <div>
            <h2 style="margin:0 0 8px;">Manajemen Berita</h2>
            <p style="margin:0; color:#64748b;">
                Kelola berita dan informasi Desa Manyar.
            </p>
        </div>

        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
            + Tambah Berita
        </a>
    </div>

    @if (session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div style="background:#fee2e2; color:#991b1b; padding:12px; border-radius:8px; margin-bottom:18px;">
            Terjadi kesalahan. Silakan periksa kembali data berita.
        </div>
    @endif

    <div class="card">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul Berita</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($news as $item)
                        <tr>
                            <td>{{ $news->firstItem() + $loop->index }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->category?->name ?? '-' }}</td>
                            <td>{{ $item->author?->name ?? '-' }}</td>
                            <td>
                                @if ($item->status === 'published')
                                    <span style="color:#15803d; font-weight:bold;">Terbit</span>
                                @else
                                    <span style="color:#d97706; font-weight:bold;">Draft</span>
                                @endif
                            </td>
                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                            <td style="white-space:nowrap;">
                                <a href="{{ route('admin.news.edit', $item->id) }}"
                                   class="btn btn-warning">
                                    Edit
                                </a>

                                <form action="{{ route('admin.news.destroy', $item->id) }}"
                                      method="POST"
                                      style="display:inline;"
                                      onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align:center; padding:30px; color:#64748b;">
                                Belum ada berita yang ditambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top:20px;">
            {{ $news->links() }}
        </div>
    </div>

</div>
@endsection
