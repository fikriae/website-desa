
@extends('admin.layouts.app')

@section('title', 'Edit Agenda')

@push('styles')
<style>
    .form-container {
        max-width: 950px;
        margin: 0 auto;
    }

    .form-header {
        margin-bottom: 25px;
    }

    .form-header h2 {
        margin: 0 0 7px;
        color: #172554;
        font-size: 24px;
        font-weight: 700;
    }

    .form-header p {
        color: #64748b;
        margin: 0;
        font-size: 14px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #334155;
        font-size: 14px;
        font-weight: 600;
    }

    .form-control {
        width: 100%;
        padding: 11px 13px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        background: #fff;
        color: #1e293b;
        font-size: 14px;
        box-sizing: border-box;
    }

    .form-control:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, .1);
    }

    textarea.form-control {
        min-height: 140px;
        resize: vertical;
    }

    .form-help {
        display: block;
        color: #64748b;
        font-size: 12px;
        margin-top: 6px;
    }

    .image-preview {
        display: block;
        max-width: 260px;
        max-height: 180px;
        object-fit: cover;
        border-radius: 10px;
        margin-top: 12px;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        border-top: 1px solid #e2e8f0;
        padding-top: 20px;
        margin-top: 10px;
    }

    .btn-secondary {
        background: #f1f5f9;
        color: #334155;
        text-decoration: none;
    }

    @media(max-width: 650px) {
        .form-grid {
            grid-template-columns: 1fr;
            gap: 0;
        }

        .form-group.full {
            grid-column: auto;
        }
    }
</style>
@endpush

@section('content')

<div class="form-container">

    <div class="form-header">
        <h2>Edit Agenda Kegiatan</h2>
        <p>Perbarui informasi kegiatan Desa Manyar.</p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Periksa kembali data berikut:</strong>
            <ul style="margin: 8px 0 0; padding-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <form
            action="{{ route('admin.agendas.update', $agenda) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')

            <div class="form-grid">

                <div class="form-group full">
                    <label for="title">Nama Kegiatan *</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        class="form-control"
                        value="{{ old('title', $agenda->title) }}"
                        required
                    >
                </div>

                <div class="form-group full">
                    <label for="description">Deskripsi Kegiatan</label>
                    <textarea
                        name="description"
                        id="description"
                        class="form-control"
                    >{{ old('description', $agenda->description) }}</textarea>
                </div>

                <div class="form-group full">
                    <label for="location">Lokasi Kegiatan</label>
                    <input
                        type="text"
                        name="location"
                        id="location"
                        class="form-control"
                        value="{{ old('location', $agenda->location) }}"
                    >
                </div>

                <div class="form-group">
                    <label for="start_date">Tanggal dan Waktu Mulai *</label>
                    <input
                        type="datetime-local"
                        name="start_date"
                        id="start_date"
                        class="form-control"
                        value="{{ old('start_date', $agenda->start_date?->format('Y-m-d\TH:i')) }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="end_date">Tanggal dan Waktu Selesai</label>
                    <input
                        type="datetime-local"
                        name="end_date"
                        id="end_date"
                        class="form-control"
                        value="{{ old('end_date', $agenda->end_date?->format('Y-m-d\TH:i')) }}"
                    >
                </div>

                <div class="form-group full">
                    <label>Foto Saat Ini</label>

                    @if($agenda->featured_image)
                        <img
                            src="{{ asset('storage/' . $agenda->featured_image) }}"
                            alt="{{ $agenda->title }}"
                            class="image-preview"
                        >
                    @else
                        <p style="color:#64748b;">Belum ada foto kegiatan.</p>
                    @endif
                </div>

                <div class="form-group full">
                    <label for="featured_image">Ganti Foto Kegiatan</label>
                    <input
                        type="file"
                        name="featured_image"
                        id="featured_image"
                        class="form-control"
                        accept="image/jpeg,image/png,image/webp"
                    >
                    <small class="form-help">
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </small>

                    <img
                        id="imagePreview"
                        class="image-preview"
                        alt="Preview foto baru"
                        style="display:none;"
                    >
                </div>

                <div class="form-group full">
                    <label for="status">Status Publikasi *</label>
                    <select
                        name="status"
                        id="status"
                        class="form-control"
                        required
                    >
                        <option
                            value="draft"
                            {{ old('status', $agenda->status) == 'draft' ? 'selected' : '' }}
                        >
                            Draft
                        </option>

                        <option
                            value="published"
                            {{ old('status', $agenda->status) == 'published' ? 'selected' : '' }}
                        >
                            Publikasikan
                        </option>
                    </select>
                </div>

            </div>

            <div class="form-actions">
                <a
                    href="{{ route('admin.agendas.index') }}"
                    class="btn btn-secondary"
                >
                    Kembali
                </a>

                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>

</div>

@endsection

@push('scripts')
<script>
    const imageInput = document.getElementById('featured_image');
    const imagePreview = document.getElementById('imagePreview');

    imageInput.addEventListener('change', function () {
        const file = this.files[0];

        if (!file) {
            imagePreview.style.display = 'none';
            imagePreview.removeAttribute('src');
            return;
        }

        if (!file.type.startsWith('image/')) {
            alert('File harus berupa gambar.');
            this.value = '';
            imagePreview.style.display = 'none';
            return;
        }

        imagePreview.src = URL.createObjectURL(file);
        imagePreview.style.display = 'block';
    });

    const startInput = document.getElementById('start_date');
    const endInput = document.getElementById('end_date');

    startInput.addEventListener('change', function () {
        endInput.min = this.value;

        if (endInput.value && endInput.value < this.value) {
            endInput.value = '';
        }
    });

    if (startInput.value) {
        endInput.min = startInput.value;
    }
</script>
@endpush
