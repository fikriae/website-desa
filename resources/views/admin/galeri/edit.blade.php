
@extends('admin.layouts.app')

@section('title', 'Edit Foto Galeri')

@section('content')
<style>
    .gallery-form-page {
        max-width: 900px;
        margin: 0 auto;
    }

    .form-header {
        margin-bottom: 25px;
    }

    .form-header h2 {
        color: #172554;
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .form-header p {
        color: #64748b;
        font-size: 14px;
        margin: 0;
    }

    .form-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 13px;
        padding: 28px;
        box-shadow: 0 3px 12px rgba(15, 23, 42, .04);
    }

    .form-group {
        margin-bottom: 21px;
    }

    .form-group label {
        display: block;
        color: #334155;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .form-control {
        width: 100%;
        padding: 11px 13px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        font-size: 14px;
        color: #334155;
        background: white;
        box-sizing: border-box;
    }

    .form-control:focus {
        outline: none;
        border-color: #1e462e;
        box-shadow: 0 0 0 3px rgba(30, 70, 46, .1);
    }

    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    .form-hint {
        display: block;
        color: #94a3b8;
        font-size: 12px;
        margin-top: 6px;
    }

    .form-error {
        color: #dc2626;
        font-size: 12px;
        margin-top: 6px;
    }

    .current-image {
        width: 100%;
        max-width: 350px;
        height: 220px;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        display: block;
        margin-bottom: 12px;
    }

    .image-preview {
        display: none;
        width: 100%;
        max-width: 350px;
        height: 220px;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        margin-top: 12px;
    }

    .checkbox-wrapper {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 13px;
        background: #f8fafc;
        border-radius: 8px;
    }

    .checkbox-wrapper input {
        width: 17px;
        height: 17px;
        accent-color: #1e462e;
    }

    .checkbox-wrapper label {
        margin: 0;
        font-weight: 500;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 28px;
        padding-top: 20px;
        border-top: 1px solid #e5e7eb;
    }

    .btn-submit,
    .btn-cancel {
        padding: 11px 20px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        border: none;
    }

    .btn-submit {
        background: #1e462e;
        color: white;
    }

    .btn-submit:hover {
        background: #163622;
    }

    .btn-cancel {
        background: #f1f5f9;
        color: #475569;
    }

    .alert-error {
        padding: 13px 16px;
        background: #fee2e2;
        color: #991b1b;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    @media(max-width: 600px) {
        .form-card {
            padding: 18px;
        }

        .form-actions {
            flex-direction: column-reverse;
        }

        .form-actions a,
        .form-actions button {
            width: 100%;
            text-align: center;
        }
    }
</style>

<div class="gallery-form-page">

    <div class="form-header">
        <h2>Edit Foto Galeri</h2>
        <p>Perbarui informasi dan foto dokumentasi Desa Manyar.</p>
    </div>

    @if($errors->any())
        <div class="alert-error">
            <strong>Periksa kembali data berikut:</strong>
            <ul style="margin:8px 0 0 18px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-card">

        <form
            action="{{ route('admin.galleries.update', $gallery) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Judul Foto <span style="color:red">*</span></label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    class="form-control"
                    value="{{ old('title', $gallery->title) }}"
                    placeholder="Masukkan judul foto"
                    required
                >
                @error('title')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="album">Nama Album</label>
                <input
                    type="text"
                    name="album"
                    id="album"
                    class="form-control"
                    value="{{ old('album', $gallery->album) }}"
                    placeholder="Contoh: Kegiatan Desa 2026"
                >
                <small class="form-hint">
                    Foto dengan nama album yang sama akan dikelompokkan bersama.
                </small>
                @error('album')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Deskripsi Foto</label>
                <textarea
                    name="description"
                    id="description"
                    class="form-control"
                    placeholder="Tuliskan keterangan foto..."
                >{{ old('description', $gallery->description) }}</textarea>
                @error('description')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Foto Saat Ini</label>

                <img
                    src="{{ asset('storage/' . $gallery->image_path) }}"
                    alt="{{ $gallery->title }}"
                    class="current-image"
                >
            </div>

            <div class="form-group">
                <label for="image">Ganti Foto</label>
                <input
                    type="file"
                    name="image"
                    id="image"
                    class="form-control"
                    accept=".jpg,.jpeg,.png,.webp"
                >
                <small class="form-hint">
                    Kosongkan jika tidak ingin mengganti foto. Format JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                </small>

                <img
                    id="preview"
                    class="image-preview"
                    alt="Preview foto baru"
                >

                @error('image')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="sort_order">Urutan Tampilan</label>
                <input
                    type="number"
                    name="sort_order"
                    id="sort_order"
                    class="form-control"
                    min="0"
                    value="{{ old('sort_order', $gallery->sort_order) }}"
                >
                <small class="form-hint">
                    Angka lebih kecil akan ditampilkan lebih dahulu.
                </small>
                @error('sort_order')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <div class="checkbox-wrapper">
                    <input
                        type="checkbox"
                        name="is_active"
                        id="is_active"
                        value="1"
                        {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}
                    >
                    <label for="is_active">
                        Tampilkan foto di website publik
                    </label>
                </div>
            </div>

            <div class="form-actions">
                <a
                    href="{{ route('admin.galleries.index') }}"
                    class="btn-cancel"
                >
                    Kembali
                </a>

                <button type="submit" class="btn-submit">
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>
</div>

<script>
    document.getElementById('image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('preview');

        if (!file) {
            preview.style.display = 'none';
            preview.removeAttribute('src');
            return;
        }

        if (!file.type.startsWith('image/')) {
            alert('File harus berupa gambar.');
            event.target.value = '';
            preview.style.display = 'none';
            return;
        }

        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran foto maksimal 2 MB.');
            event.target.value = '';
            preview.style.display = 'none';
            return;
        }

        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    });
</script>
@endsection
