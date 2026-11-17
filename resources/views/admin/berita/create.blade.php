
@extends('admin.layouts.app')

@section('title', 'Tambah Berita - Desa Manyar')

@section('content')

<style>
    .news-form {
        width: 100%;
        max-width: 1000px;
        margin: 0 auto;
    }

    .news-form-heading {
        margin-bottom: 24px;
    }

    .news-form-heading h2 {
        margin: 0 0 7px;
        color: #1e293b;
        font-size: 25px;
        font-weight: 700;
    }

    .news-form-heading p {
        margin: 0;
        color: #64748b;
        font-size: 14px;
        line-height: 1.6;
    }

    .form-card {
        background: #fff;
        padding: 25px;
        border: 1px solid #e5e7eb;
        border-radius: 13px;
        margin-bottom: 20px;
        box-shadow: 0 3px 12px rgba(15, 23, 42, .035);
    }

    .form-card h3 {
        margin: 0 0 9px;
        color: #1e293b;
        font-size: 18px;
        font-weight: 700;
    }

    .form-description {
        color: #64748b;
        font-size: 13px;
        line-height: 1.7;
        margin: 0 0 18px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group:last-child {
        margin-bottom: 0;
    }

    .form-group label {
        display: block;
        color: #334155;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .required-mark {
        color: #dc2626;
    }

    .form-control {
        display: block;
        width: 100%;
        padding: 11px 13px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        font-size: 14px;
        color: #334155;
        background: #fff;
        transition: .2s;
        box-sizing: border-box;
    }

    .form-control:focus {
        outline: none;
        border-color: #1e462e;
        box-shadow: 0 0 0 3px rgba(30, 70, 46, .09);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 95px;
        line-height: 1.6;
    }

    select.form-control {
        cursor: pointer;
    }

    .editor-wrapper {
        border: 1px solid #cbd5e1;
        border-radius: 9px;
        overflow: hidden;
        background: #fff;
    }

    #toolbar {
        display: flex;
        flex-wrap: wrap;
        gap: 3px;
        padding: 9px;
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
    }

    #toolbar .ql-formats {
        margin-right: 5px;
        margin-bottom: 3px;
    }

    #editor {
        min-height: 350px;
        background: #fff;
    }

    #editor .ql-editor {
        min-height: 350px;
        padding: 18px;
        font-size: 15px;
        line-height: 1.8;
        overflow-wrap: anywhere;
    }

    #editor .ql-editor img {
        max-width: 100%;
        height: auto;
        border-radius: 6px;
    }

    #editor .ql-editor.ql-blank::before {
        color: #94a3b8;
        font-style: normal;
    }

    .ql-toolbar.ql-snow {
        border: none;
    }

    .ql-container.ql-snow {
        border: none;
        font-family: inherit;
    }

    .image-preview {
        display: none;
        max-width: 100%;
        width: auto;
        max-height: 220px;
        margin-top: 13px;
        border-radius: 9px;
        border: 1px solid #e2e8f0;
        object-fit: contain;
    }

    .editor-info {
        display: block;
        color: #64748b;
        font-size: 12px;
        line-height: 1.7;
        margin-top: 9px;
    }

    #uploadStatus {
        min-height: 18px;
    }

    .news-form-alert {
        padding: 15px 17px;
        border-radius: 9px;
        margin-bottom: 20px;
        font-size: 13px;
        line-height: 1.7;
    }

    .news-form-alert-error {
        background: #fee2e2;
        color: #991b1b;
        border: 1px solid #fecaca;
    }

    .news-form-alert-error ul {
        margin: 7px 0 0;
        padding-left: 20px;
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        padding-top: 5px;
    }

    .btn-form {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 40px;
        padding: 10px 18px;
        border: none;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: .2s;
    }

    .btn-form-back {
        background: #f1f5f9;
        color: #334155;
    }

    .btn-form-back:hover {
        background: #e2e8f0;
        color: #1e293b;
    }

    .btn-form-submit {
        background: #1e462e;
        color: #fff;
    }

    .btn-form-submit:hover {
        background: #163723;
    }

    .btn-form-submit:disabled {
        opacity: .65;
        cursor: not-allowed;
    }

    @media (max-width: 768px) {
        .news-form-heading h2 {
            font-size: 22px;
        }

        .form-card {
            padding: 19px;
        }

        #editor,
        #editor .ql-editor {
            min-height: 300px;
        }

        #toolbar {
            padding: 7px;
        }

        .form-actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .btn-form {
            width: 100%;
        }
    }

    @media (max-width: 480px) {
        .news-form-heading h2 {
            font-size: 20px;
        }

        .news-form-heading p {
            font-size: 13px;
        }

        .form-card {
            padding: 14px;
            border-radius: 10px;
        }

        .form-card h3 {
            font-size: 16px;
        }

        .form-control {
            font-size: 13px;
        }

        #editor,
        #editor .ql-editor {
            min-height: 260px;
        }

        #editor .ql-editor {
            padding: 13px;
            font-size: 14px;
        }

        #toolbar .ql-formats {
            margin-right: 2px;
        }
    }
</style>

<div class="news-form">

    <div class="news-form-heading">
        <h2>Tambah Berita</h2>
        <p>Buat berita dan informasi terbaru Desa Manyar.</p>
    </div>

    @if ($errors->any())
        <div class="news-form-alert news-form-alert-error">
            <strong>Periksa kembali data berikut:</strong>

            <ul>
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

        {{-- INFORMASI BERITA --}}
        <div class="form-card">

            <div class="form-group">
                <label for="title">
                    Judul Berita <span class="required-mark">*</span>
                </label>

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

                <small class="editor-info">
                    Tuliskan ringkasan singkat agar pembaca mengetahui isi berita.
                </small>
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

        {{-- ISI BERITA --}}
        <div class="form-card">

            <h3>Isi Berita</h3>

            <p class="form-description">
                Tulis berita seperti menggunakan Microsoft Word.
                Gunakan toolbar untuk mengatur tulisan, membuat daftar,
                menambahkan tautan, dan menyisipkan foto di antara paragraf.
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
                        <button type="button" class="ql-bold"></button>
                        <button type="button" class="ql-italic"></button>
                        <button type="button" class="ql-underline"></button>
                        <button type="button" class="ql-strike"></button>
                    </span>

                    <span class="ql-formats">
                        <button type="button" class="ql-list" value="ordered"></button>
                        <button type="button" class="ql-list" value="bullet"></button>
                        <button type="button" class="ql-blockquote"></button>
                    </span>

                    <span class="ql-formats">
                        <button type="button" class="ql-align" value=""></button>
                        <button type="button" class="ql-align" value="center"></button>
                        <button type="button" class="ql-align" value="right"></button>
                    </span>

                    <span class="ql-formats">
                        <button type="button" class="ql-link"></button>
                        <button type="button" class="ql-image"></button>
                        <button type="button" class="ql-clean"></button>
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

            <small class="editor-info">
                Gambar yang disisipkan akan diunggah ke server dan disimpan
                dalam folder storage berita.
            </small>

            <div id="uploadStatus" class="editor-info" aria-live="polite"></div>

        </div>

        {{-- PUBLIKASI --}}
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

                <small class="editor-info">
                    Pilih Draft untuk menyimpan berita tanpa menampilkannya
                    kepada pengunjung. Pilih Terbitkan untuk menampilkan berita.
                </small>
            </div>

            <div class="form-actions">

                <a href="{{ route('admin.news.index') }}" class="btn-form btn-form-back">
                    Kembali
                </a>

                <button
                    type="submit"
                    class="btn-form btn-form-submit"
                    id="submitButton"
                >
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

            if (!file.type.match(/^image\/(jpeg|png|webp)$/)) {
                alert('Format gambar harus JPG, PNG, atau WEBP.');
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

                if (!response.ok || !result.success || !result.url) {
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
                preview.removeAttribute('src');
                return;
            }

            if (!file.type.match(/^image\/(jpeg|png|webp)$/)) {
                alert('Format gambar harus JPG, PNG, atau WEBP.');
                event.target.value = '';
                preview.style.display = 'none';
                return;
            }

            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran gambar sampul maksimal 2 MB.');
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
            quill.focus();
            return;
        }

        submitButton.disabled = true;
        submitButton.textContent = 'Menyimpan...';

    });

});
</script>

@endsection
