
@extends('admin.layouts.app')

@section('title', 'Edit Pengumuman - Admin Desa Manyar')

@push('styles')
<link href="https://cdn.quilljs.com/2.0.3/quill.snow.css" rel="stylesheet">

<style>
    .announcement-form-page {
        max-width: 1100px;
        margin: 0 auto;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }

    .page-title {
        margin: 0;
        font-size: 25px;
        font-weight: 800;
        color: #1e293b;
    }

    .page-description {
        color: #64748b;
        font-size: 13px;
        margin-top: 7px;
    }

    .form-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        padding: 28px;
        box-shadow: 0 4px 15px rgba(15, 23, 42, .03);
    }

    .form-group {
        margin-bottom: 24px;
    }

    .form-label {
        display: block;
        font-size: 13px;
        font-weight: 700;
        color: #334155;
        margin-bottom: 9px;
    }

    .required {
        color: #dc2626;
    }

    .form-control {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        font-family: inherit;
        font-size: 13px;
        color: #334155;
        outline: none;
        transition: .2s;
        background: #fff;
    }

    .form-control:focus {
        border-color: #1e462e;
        box-shadow: 0 0 0 3px rgba(30, 70, 46, .09);
    }

    textarea.form-control {
        min-height: 110px;
        resize: vertical;
    }

    .form-help {
        font-size: 11px;
        color: #64748b;
        margin-top: 7px;
        line-height: 1.6;
    }

    .form-error {
        color: #dc2626;
        font-size: 12px;
        margin-top: 6px;
    }

    .image-current {
        margin-bottom: 14px;
    }

    .image-current-label {
        display: block;
        font-size: 11px;
        font-weight: 700;
        color: #64748b;
        margin-bottom: 8px;
    }

    .image-preview {
        display: block;
        width: 100%;
        max-width: 320px;
        max-height: 220px;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid #e5e7eb;
        margin-top: 12px;
    }

    .editor-wrapper {
        border-radius: 8px;
        overflow: hidden;
    }

    #editor {
        min-height: 300px;
        font-size: 14px;
        color: #334155;
    }

    .ql-toolbar.ql-snow {
        border-radius: 8px 8px 0 0;
        border-color: #cbd5e1;
        background: #f8fafc;
    }

    .ql-container.ql-snow {
        border-radius: 0 0 8px 8px;
        border-color: #cbd5e1;
        font-family: inherit;
    }

    .ql-editor {
        min-height: 300px;
        line-height: 1.7;
    }

    .ql-editor.ql-blank::before {
        color: #94a3b8;
        font-style: normal;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 28px;
        padding-top: 22px;
        border-top: 1px solid #e5e7eb;
        flex-wrap: wrap;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        padding: 11px 18px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: .2s;
    }

    .btn-primary {
        background: #1e462e;
        color: #fff;
    }

    .btn-primary:hover {
        background: #163923;
        color: #fff;
    }

    .btn-secondary {
        background: #f1f5f9;
        color: #334155;
        border: 1px solid #e2e8f0;
    }

    .btn-secondary:hover {
        background: #e2e8f0;
        color: #1e293b;
    }

    .btn:disabled {
        opacity: .65;
        cursor: not-allowed;
    }

    .alert-error {
        padding: 14px 16px;
        background: #fef2f2;
        color: #991b1b;
        border: 1px solid #fecaca;
        border-radius: 9px;
        font-size: 13px;
        margin-bottom: 20px;
    }

    .alert-error ul {
        margin: 8px 0 0 18px;
        padding: 0;
    }

    @media (max-width: 600px) {
        .announcement-form-page {
            padding: 0;
        }

        .page-title {
            font-size: 21px;
        }

        .form-card {
            padding: 17px;
        }

        .form-actions {
            flex-direction: column-reverse;
        }

        .form-actions .btn {
            width: 100%;
        }

        #editor,
        .ql-editor {
            min-height: 250px;
        }

        .ql-toolbar.ql-snow {
            padding: 8px;
        }
    }
</style>
@endpush

@section('content')

<div class="container announcement-form-page">

    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Pengumuman</h1>
            <div class="page-description">
                Perbarui informasi dan isi pengumuman Desa Manyar.
            </div>
        </div>

        <a href="{{ route('admin.announcements.index') }}"
           class="btn btn-secondary">
            ← Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="alert-error">
            <strong>Periksa kembali data yang dimasukkan.</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.announcements.update', $announcement) }}"
          method="POST"
          enctype="multipart/form-data"
          id="announcementForm">

        @csrf
        @method('PUT')

        <div class="form-card">

            {{-- JUDUL --}}
            <div class="form-group">
                <label for="title" class="form-label">
                    Judul Pengumuman <span class="required">*</span>
                </label>

                <input type="text"
                       name="title"
                       id="title"
                       class="form-control"
                       value="{{ old('title', $announcement->title) }}"
                       placeholder="Masukkan judul pengumuman"
                       required>

                @error('title')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            {{-- RINGKASAN --}}
            <div class="form-group">
                <label for="excerpt" class="form-label">
                    Ringkasan Pengumuman
                </label>

                <textarea name="excerpt"
                          id="excerpt"
                          class="form-control"
                          rows="3"
                          placeholder="Tuliskan ringkasan singkat pengumuman...">{{ old('excerpt', $announcement->excerpt) }}</textarea>

                @error('excerpt')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            {{-- GAMBAR UTAMA --}}
            <div class="form-group">
                <label for="featuredImage" class="form-label">
                    Gambar Utama
                </label>

                @if ($announcement->featured_image)
                    <div class="image-current">
                        <span class="image-current-label">GAMBAR SAAT INI</span>

                        <img
                            src="{{ asset('storage/' . $announcement->featured_image) }}"
                            class="image-preview"
                            id="imagePreview"
                            alt="Gambar pengumuman saat ini">
                    </div>
                @else
                    <img
                        id="imagePreview"
                        class="image-preview"
                        alt="Pratinjau gambar"
                        style="display: none;">
                @endif

                <input type="file"
                       name="featured_image"
                       id="featuredImage"
                       class="form-control"
                       accept="image/jpeg,image/png,image/webp">

                <div class="form-help">
                    Kosongkan jika tidak ingin mengganti gambar.
                    Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                </div>

                @error('featured_image')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            {{-- ISI PENGUMUMAN --}}
            <div class="form-group">
                <label class="form-label">
                    Isi Pengumuman <span class="required">*</span>
                </label>

                <div class="editor-wrapper">
                    <div id="editor"></div>
                </div>

                <input type="hidden"
                       name="content"
                       id="content"
                       value="">

                <div class="form-help">
                    Gunakan toolbar untuk mengatur teks, judul, daftar,
                    tautan, dan gambar.
                </div>

                @error('content')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            {{-- STATUS --}}
            <div class="form-group">
                <label for="status" class="form-label">
                    Status Pengumuman <span class="required">*</span>
                </label>

                <select name="status"
                        id="status"
                        class="form-control"
                        required>

                    <option value="draft"
                        {{ old('status', $announcement->status) == 'draft' ? 'selected' : '' }}>
                        Draft
                    </option>

                    <option value="published"
                        {{ old('status', $announcement->status) == 'published' ? 'selected' : '' }}>
                        Dipublikasikan
                    </option>
                </select>

                <div class="form-help">
                    Draft tidak ditampilkan di website publik.
                </div>

                @error('status')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            {{-- TOMBOL --}}
            <div class="form-actions">

                <a href="{{ route('admin.announcements.index') }}"
                   class="btn btn-secondary">
                    Batal
                </a>

                <button type="submit"
                        class="btn btn-primary"
                        id="submitButton">
                    Simpan Perubahan
                </button>

            </div>

        </div>
    </form>

</div>

@endsection

@push('scripts')
<script src="https://cdn.quilljs.com/2.0.3/quill.min.js"></script>

<script>
    const initialContent = @json(old('content', $announcement->content ?? ''));

    const quill = new Quill('#editor', {
        theme: 'snow',
        placeholder: 'Tuliskan isi pengumuman di sini...',
        modules: {
            toolbar: {
                container: [
                    [{ header: [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ color: [] }, { background: [] }],
                    [{ list: 'ordered' }, { list: 'bullet' }],
                    [{ align: [] }],
                    ['link', 'image'],
                    ['clean']
                ],
                handlers: {
                    image: uploadImage
                }
            }
        }
    });

    // MEMUAT ISI PENGUMUMAN LAMA
    quill.root.innerHTML = initialContent;

    // UPLOAD GAMBAR KE EDITOR
    function uploadImage() {
        const input = document.createElement('input');

        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/jpeg,image/png,image/webp');
        input.click();

        input.onchange = async () => {
            const file = input.files[0];

            if (!file) return;

            if (!['image/jpeg', 'image/png', 'image/webp'].includes(file.type)) {
                alert('Format gambar harus JPG, PNG, atau WEBP.');
                return;
            }

            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran gambar maksimal 2 MB.');
                return;
            }

            const formData = new FormData();
            formData.append('image', file);

            try {
                const response = await fetch(
                    "{{ route('admin.announcements.upload-image') }}",
                    {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        credentials: 'same-origin',
                        body: formData
                    }
                );

                const result = await response.json();

                if (!response.ok || !result.success || !result.url) {
                    throw new Error(
                        result.message || 'Gagal mengunggah gambar.'
                    );
                }

                const range = quill.getSelection(true);

                quill.insertEmbed(range.index, 'image', result.url);
                quill.setSelection(range.index + 1);

            } catch (error) {
                alert(error.message || 'Terjadi kesalahan saat upload gambar.');
            }
        };
    }

    // PREVIEW GAMBAR UTAMA
    document.getElementById('featuredImage').addEventListener('change', function () {
        const file = this.files[0];
        const preview = document.getElementById('imagePreview');

        if (!file) return;

        const allowedTypes = [
            'image/jpeg',
            'image/png',
            'image/webp'
        ];

        if (!allowedTypes.includes(file.type)) {
            alert('Format gambar harus JPG, PNG, atau WEBP.');
            this.value = '';
            return;
        }

        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran gambar maksimal 2 MB.');
            this.value = '';
            return;
        }

        if (preview.dataset.objectUrl) {
            URL.revokeObjectURL(preview.dataset.objectUrl);
        }

        const objectUrl = URL.createObjectURL(file);

        preview.src = objectUrl;
        preview.dataset.objectUrl = objectUrl;
        preview.style.display = 'block';
    });

    // SIMPAN ISI EDITOR
    document.getElementById('announcementForm').addEventListener('submit', function (event) {
        const content = quill.root.innerHTML;
        const plainText = quill.getText().trim();

        if (!plainText) {
            event.preventDefault();
            alert('Isi pengumuman wajib diisi.');
            quill.focus();
            return;
        }

        document.getElementById('content').value = content;

        const button = document.getElementById('submitButton');

        button.disabled = true;
        button.textContent = 'Menyimpan...';
    });
</script>
@endpush
