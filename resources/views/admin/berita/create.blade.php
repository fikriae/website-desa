
@extends('admin.layouts.app')

@section('title', 'Tambah Berita - Desa Manyar')

@section('content')

<style>
    .news-form {
        max-width: 1000px;
        margin: auto;
    }

    .form-card {
        background: white;
        padding: 25px;
        border-radius: 12px;
        margin-bottom: 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,.04);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .form-control {
        width: 100%;
        padding: 11px 13px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        font-size: 14px;
        background: white;
    }

    .form-control:focus {
        outline: none;
        border-color: #2563eb;
    }

    .editor-wrapper {
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        overflow: hidden;
    }

    #editor {
        min-height: 350px;
        background: white;
    }

    #editor .ql-editor {
        min-height: 350px;
        font-size: 15px;
        line-height: 1.8;
    }

    #editor .ql-editor img {
        max-width: 100%;
        height: auto;
    }

    .image-preview {
        max-width: 300px;
        max-height: 200px;
        display: none;
        margin-top: 12px;
        border-radius: 8px;
        object-fit: cover;
    }

    .form-error {
        color: #dc2626;
        font-size: 13px;
        margin-top: 6px;
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        flex-wrap: wrap;
    }

    .btn-secondary {
        background: #e2e8f0;
        color: #334155;
    }

    .btn-success {
        background: #15803d;
        color: white;
    }

    .editor-info {
        color: #64748b;
        font-size: 13px;
        margin-top: 10px;
    }
</style>

<div class="news-form">

    <div style="margin-bottom:25px;">
        <h2 style="margin-bottom:8px;">Tambah Berita</h2>
        <p style="color:#64748b; margin:0;">
            Buat berita dan informasi terbaru Desa Manyar.
        </p>
    </div>

    @if ($errors->any())
        <div style="background:#fee2e2; color:#991b1b; padding:15px; border-radius:8px; margin-bottom:20px;">
            <strong>Periksa kembali data berikut:</strong>
            <ul style="margin-bottom:0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        id="newsForm"
        action="{{ route('admin.news.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf

        <div class="form-card">

            <div class="form-group">
                <label for="title">Judul Berita *</label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    class="form-control"
                    value="{{ old('title') }}"
                    placeholder="Masukkan judul berita"
                    required
                >
            </div>

            <div class="form-group">
                <label for="category_id">Kategori Berita</label>

                <select
                    name="category_id"
                    id="category_id"
                    class="form-control"
                >
                    <option value="">Pilih kategori</option>

                    @foreach ($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="excerpt">Ringkasan Berita</label>

                <textarea
                    name="excerpt"
                    id="excerpt"
                    class="form-control"
                    rows="3"
                    placeholder="Tuliskan ringkasan singkat berita..."
                >{{ old('excerpt') }}</textarea>
            </div>

            <div class="form-group">
                <label for="featured_image">Gambar Sampul Berita</label>

                <input
                    type="file"
                    name="featured_image"
                    id="featured_image"
                    class="form-control"
                    accept="image/jpeg,image/png,image/webp"
                >

                <small class="editor-info">
                    Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                </small>

                <img
                    id="imagePreview"
                    class="image-preview"
                    alt="Preview gambar sampul"
                >
            </div>

        </div>

        <div class="form-card">

            <h3 style="margin-top:0;">Isi Berita</h3>

            <p style="color:#64748b; font-size:14px;">
                Tulis berita seperti menggunakan Microsoft Word.
                Gunakan tombol gambar untuk menyisipkan foto di antara paragraf.
            </p>

            <div class="editor-wrapper">
                <div id="toolbar">
                    <span class="ql-formats">
                        <select class="ql-header">
                            <option value="1">Judul 1</option>
                            <option value="2">Judul 2</option>
                            <option selected>Normal</option>
                        </select>
                    </span>

                    <span class="ql-formats">
                        <button class="ql-bold"></button>
                        <button class="ql-italic"></button>
                        <button class="ql-underline"></button>
                        <button class="ql-strike"></button>
                    </span>

                    <span class="ql-formats">
                        <button class="ql-list" value="ordered"></button>
                        <button class="ql-list" value="bullet"></button>
                        <button class="ql-blockquote"></button>
                    </span>

                    <span class="ql-formats">
                        <button class="ql-align" value=""></button>
                        <button class="ql-align" value="center"></button>
                        <button class="ql-align" value="right"></button>
                    </span>

                    <span class="ql-formats">
                        <button class="ql-link"></button>
                        <button class="ql-image"></button>
                        <button class="ql-clean"></button>
                    </span>
                </div>

                <div id="editor"></div>
            </div>

            <input
                type="hidden"
                name="content"
                id="content"
                value="{{ old('content') }}"
            >

            <div class="editor-info">
                Gambar yang disisipkan akan diunggah ke server dan disimpan
                dalam folder storage berita.
            </div>

            <div id="uploadStatus" class="editor-info"></div>

        </div>

        <div class="form-card">

            <div class="form-group">
                <label for="status">Status Publikasi</label>

                <select name="status" id="status" class="form-control">
                    <option
                        value="draft"
                        {{ old('status', 'draft') === 'draft' ? 'selected' : '' }}
                    >
                        Draft
                    </option>

                    <option
                        value="published"
                        {{ old('status') === 'published' ? 'selected' : '' }}
                    >
                        Terbitkan
                    </option>
                </select>
            </div>

            <div class="form-actions">
                <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

                <button type="submit" class="btn btn-primary" id="submitButton">
                    Simpan Berita
                </button>
            </div>

        </div>

    </form>

</div>

<link
    href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css"
    rel="stylesheet"
>

<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const editorElement = document.getElementById('editor');
    const contentInput = document.getElementById('content');
    const uploadStatus = document.getElementById('uploadStatus');
    const form = document.getElementById('newsForm');
    const submitButton = document.getElementById('submitButton');

    const quill = new Quill(editorElement, {
        theme: 'snow',
        placeholder: 'Mulai tulis berita Desa Manyar di sini...',
        modules: {
            toolbar: {
                container: '#toolbar',
                handlers: {
                    image: uploadImage
                }
            }
        }
    });

    // Mengembalikan isi editor jika validasi sebelumnya gagal.
    const oldContent = @json(old('content', ''));

    if (oldContent) {
        quill.root.innerHTML = oldContent;
    }

    // Upload gambar dari komputer ke server.
    function uploadImage() {

        const input = document.createElement('input');

        input.type = 'file';
        input.accept = 'image/jpeg,image/png,image/webp';

        input.click();

        input.onchange = async function () {

            const file = input.files[0];

            if (!file) return;

            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran gambar maksimal 2 MB.');
                return;
            }

            const formData = new FormData();
            formData.append('image', file);

            const token = form.querySelector('input[name="_token"]').value;

            uploadStatus.textContent = 'Mengunggah gambar...';

            try {

                const response = await fetch(
                    @json(route('admin.news.upload-image')),
                    {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json'
                        },
                        body: formData,
                        credentials: 'same-origin'
                    }
                );

                const result = await response.json();

                if (!response.ok || !result.success) {
                    throw new Error(
                        result.message || 'Gagal mengunggah gambar.'
                    );
                }

                const range = quill.getSelection(true);

                quill.insertEmbed(
                    range.index,
                    'image',
                    result.url,
                    'user'
                );

                quill.setSelection(range.index + 1);

                uploadStatus.textContent = 'Gambar berhasil ditambahkan.';

            } catch (error) {

                uploadStatus.textContent = 'Upload gambar gagal.';

                alert(error.message || 'Terjadi kesalahan saat upload gambar.');

            }
        };
    }

    // Preview gambar sampul.
    document.getElementById('featured_image').addEventListener(
        'change',
        function (event) {

            const file = event.target.files[0];
            const preview = document.getElementById('imagePreview');

            if (!file) {
                preview.style.display = 'none';
                return;
            }

            if (!file.type.startsWith('image/')) {
                alert('File harus berupa gambar.');
                event.target.value = '';
                preview.style.display = 'none';
                return;
            }

            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        }
    );

    // Simpan isi Quill ke input content sebelum form dikirim.
    form.addEventListener('submit', function (event) {

        contentInput.value = quill.root.innerHTML;

        if (!quill.getText().trim()) {
            event.preventDefault();
            alert('Isi berita tidak boleh kosong.');
            return;
        }

        submitButton.disabled = true;
        submitButton.textContent = 'Menyimpan...';

    });

});
</script>

@endsection
