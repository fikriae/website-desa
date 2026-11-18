
@extends('admin.layouts.app')

@section('title', 'Edit Berita - Desa Manyar')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">

<style>
    .form-container {
        width: 100%;
        max-width: 1000px;
        margin: 0 auto;
    }

    .form-heading {
        margin-bottom: 24px;
    }

    .form-title {
        font-size: 25px;
        font-weight: 700;
        color: #1e293b;
        margin: 0 0 7px;
    }

    .form-subtitle {
        color: #64748b;
        font-size: 14px;
        line-height: 1.6;
        margin: 0;
    }

    .form-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 13px;
        padding: 25px;
        margin-bottom: 20px;
        box-shadow: 0 3px 12px rgba(15, 23, 42, .035);
    }

    .form-card h3 {
        color: #1e293b;
        font-size: 18px;
        font-weight: 700;
        margin: 0 0 10px;
    }

    .form-description {
        color: #64748b;
        font-size: 13px;
        line-height: 1.7;
        margin: 0 0 18px;
    }

    .form-group {
        margin-bottom: 21px;
    }

    .form-group:last-child {
        margin-bottom: 0;
    }

    .form-label {
        display: block;
        font-weight: 700;
        color: #334155;
        margin-bottom: 8px;
        font-size: 13px;
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
        box-sizing: border-box;
        transition: .2s;
    }

    .form-control:focus {
        outline: none;
        border-color: #1e462e;
        box-shadow: 0 0 0 3px rgba(30, 70, 46, .09);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
        line-height: 1.6;
    }

    .form-help {
        display: block;
        color: #64748b;
        font-size: 12px;
        line-height: 1.7;
        margin-top: 8px;
    }

    .error-message {
        color: #dc2626;
        font-size: 12px;
        margin-top: 6px;
    }

    .form-alert {
        background: #fee2e2;
        color: #991b1b;
        border: 1px solid #fecaca;
        padding: 14px 16px;
        border-radius: 9px;
        margin-bottom: 20px;
        font-size: 13px;
        line-height: 1.7;
    }

    .form-alert ul {
        margin: 7px 0 0;
        padding-left: 20px;
    }

    /* KATEGORI */
    .category-select-wrapper {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .btn-add-category {
        width: 43px;
        min-width: 43px;
        height: 43px;
        border: none;
        border-radius: 8px;
        background: #1e462e;
        color: #fff;
        font-size: 25px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: .2s;
    }

    .btn-add-category:hover {
        background: #163723;
    }

    /* MODAL KATEGORI */
    .category-modal {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 9999;
        background: rgba(15, 23, 42, .55);
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .category-modal.show {
        display: flex;
    }

    .category-modal-content {
        width: 100%;
        max-width: 420px;
        background: #fff;
        border-radius: 13px;
        padding: 24px;
        box-shadow: 0 15px 45px rgba(0, 0, 0, .18);
    }

    .category-modal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .category-modal-header h3 {
        margin: 0;
        color: #1e293b;
        font-size: 18px;
    }

    .category-modal-close {
        border: none;
        background: transparent;
        color: #64748b;
        font-size: 25px;
        cursor: pointer;
    }

    .category-modal-actions {
        display: flex;
        justify-content: flex-end;
        gap: 9px;
        margin-top: 20px;
    }

    .category-message {
        display: none;
        font-size: 13px;
        margin-top: 10px;
        line-height: 1.5;
    }

    /* EDITOR QUILL */
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

    /* PREVIEW GAMBAR */
    .image-preview {
        display: none;
        width: fit-content;
        max-width: 100%;
        margin-top: 13px;
        padding: 5px;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        background: #fff;
    }

    .image-preview img {
        display: block;
        max-width: 100%;
        width: auto;
        max-height: 230px;
        border-radius: 6px;
        object-fit: contain;
    }

    .current-image-label {
        display: inline-block;
        margin-top: 12px;
        padding: 5px 9px;
        background: #eaf2ed;
        color: #1e462e;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 700;
    }

    .upload-status {
        color: #64748b;
        font-size: 12px;
        margin-top: 8px;
        min-height: 18px;
    }

    /* TOMBOL */
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
        .form-title {
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
        .form-title {
            font-size: 20px;
        }

        .form-subtitle {
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
@endpush

@section('content')

<div class="form-container">

    <div class="form-heading">
        <h2 class="form-title">Edit Berita</h2>
        <p class="form-subtitle">
            Perbarui informasi dan konten berita Desa Manyar.
        </p>
    </div>

    @if ($errors->any())
        <div class="form-alert">
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
        action="{{ route('admin.news.update', $news->id) }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        {{-- INFORMASI BERITA --}}
        <div class="form-card">

            <div class="form-group">
                <label for="title" class="form-label">
                    Judul Berita <span class="required-mark">*</span>
                </label>

                <input
                    type="text"
                    name="title"
                    id="title"
                    class="form-control"
                    value="{{ old('title', $news->title) }}"
                    placeholder="Masukkan judul berita"
                    required
                >

                @error('title')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            {{-- KATEGORI BERITA --}}
            <div class="form-group">
                <label for="category_id" class="form-label">
                    Kategori Berita
                </label>

                <div class="category-select-wrapper">
                    <select
                        name="category_id"
                        id="category_id"
                        class="form-control"
                        style="flex: 1;"
                    >
                        <option value="">Pilih kategori</option>

                        @foreach ($categories as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ (string) old('category_id', $news->category_id) === (string) $category->id ? 'selected' : '' }}
                            >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    <button
                        type="button"
                        class="btn-add-category"
                        id="openCategoryModal"
                        title="Tambah kategori"
                    >
                        +
                    </button>
                </div>

                @error('category_id')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="excerpt" class="form-label">
                    Ringkasan Berita
                </label>

                <textarea
                    name="excerpt"
                    id="excerpt"
                    class="form-control"
                    rows="4"
                    placeholder="Tuliskan ringkasan singkat berita..."
                >{{ old('excerpt', $news->excerpt) }}</textarea>

                @error('excerpt')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="featuredImage" class="form-label">
                    Gambar Utama Berita
                </label>

                <input
                    type="file"
                    name="featured_image"
                    id="featuredImage"
                    class="form-control"
                    accept="image/jpeg,image/png,image/webp"
                >

                <small class="form-help">
                    Kosongkan jika tidak ingin mengganti gambar utama.
                    Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                </small>

                @if ($news->featured_image)
                    <span class="current-image-label">
                        GAMBAR SAAT INI
                    </span>
                @endif

                <div
                    class="image-preview"
                    id="imagePreview"
                    style="{{ $news->featured_image ? 'display:block;' : 'display:none;' }}"
                >
                    <img
                        src="{{ $news->featured_image ? asset('storage/' . $news->featured_image) : '' }}"
                        alt="Preview gambar utama berita"
                        id="previewImage"
                    >
                </div>

                @error('featured_image')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

        </div>

        {{-- ISI BERITA --}}
        <div class="form-card">

            <h3>Isi Berita</h3>

            <p class="form-description">
                Gunakan toolbar untuk mengatur tulisan, membuat daftar,
                menambahkan tautan, dan memasukkan gambar ke dalam berita.
            </p>

            <div class="editor-wrapper">

                <div id="toolbar">

                    <span class="ql-formats">
                        <select class="ql-header">
                            <option value="1">Judul 1</option>
                            <option value="2">Judul 2</option>
                            <option value="3">Judul 3</option>
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
                        <button type="button" class="ql-align" value="justify"></button>
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
                value="{{ old('content', $news->content) }}"
            >

            <small class="form-help">
                Gambar yang disisipkan akan diunggah ke server dan disimpan
                dalam folder storage berita.
            </small>

            <div id="uploadStatus" class="upload-status" aria-live="polite"></div>

            @error('content')
                <div class="error-message">{{ $message }}</div>
            @enderror

        </div>

        {{-- STATUS PUBLIKASI --}}
        <div class="form-card">

            <div class="form-group">
                <label for="status" class="form-label">
                    Status Berita <span class="required-mark">*</span>
                </label>

                <select
                    name="status"
                    id="status"
                    class="form-control"
                    required
                >
                    <option
                        value="draft"
                        {{ old('status', $news->status) === 'draft' ? 'selected' : '' }}
                    >
                        Draft
                    </option>

                    <option
                        value="published"
                        {{ old('status', $news->status) === 'published' ? 'selected' : '' }}
                    >
                        Dipublikasikan
                    </option>
                </select>

                @error('status')
                    <div class="error-message">{{ $message }}</div>
                @enderror

                <small class="form-help">
                    Pilih Draft untuk menyimpan tanpa menampilkan berita
                    kepada pengunjung. Pilih Dipublikasikan untuk menerbitkan berita.
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
                    Simpan Perubahan
                </button>

            </div>

        </div>

    </form>

</div>

{{-- MODAL TAMBAH KATEGORI --}}
<div class="category-modal" id="categoryModal">

    <div class="category-modal-content">

        <div class="category-modal-header">
            <h3>Tambah Kategori Berita</h3>

            <button
                type="button"
                class="category-modal-close"
                id="closeCategoryModal"
            >
                &times;
            </button>
        </div>

        <form id="categoryForm">

            <div class="form-group">
                <label for="newCategoryName" class="form-label">
                    Nama Kategori
                </label>

                <input
                    type="text"
                    id="newCategoryName"
                    class="form-control"
                    placeholder="Contoh: Kegiatan Desa"
                    maxlength="100"
                    required
                >
            </div>

            <div
                id="categoryMessage"
                class="category-message"
                role="alert"
            ></div>

            <div class="category-modal-actions">

                <button
                    type="button"
                    class="btn-form btn-form-back"
                    id="cancelCategory"
                >
                    Batal
                </button>

                <button
                    type="submit"
                    class="btn-form btn-form-submit"
                    id="saveCategoryButton"
                >
                    Simpan Kategori
                </button>

            </div>

        </form>

    </div>

</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const contentInput = document.getElementById('content');
    const form = document.getElementById('newsForm');
    const submitButton = document.getElementById('submitButton');
    const uploadStatus = document.getElementById('uploadStatus');

    const categoryModal = document.getElementById('categoryModal');
    const categoryForm = document.getElementById('categoryForm');
    const categorySelect = document.getElementById('category_id');
    const categoryMessage = document.getElementById('categoryMessage');
    const saveCategoryButton = document.getElementById('saveCategoryButton');

    // EDITOR QUILL
    const quill = new Quill('#editor', {
        theme: 'snow',
        placeholder: 'Tuliskan isi berita Desa Manyar di sini...',
        modules: {
            toolbar: {
                container: '#toolbar',

                handlers: {
                    image: function () {
                        selectImage();
                    }
                }
            }
        }
    });

    // Memuat isi berita yang sudah tersimpan.
    const savedContent = @json(old('content', $news->content ?? ''));

    if (savedContent) {
        quill.root.innerHTML = savedContent;
    }

    // MODAL TAMBAH KATEGORI
    function openCategoryModal() {
        categoryModal.classList.add('show');
        categoryMessage.style.display = 'none';
        document.getElementById('newCategoryName').focus();
    }

    function closeCategoryModal() {
        categoryModal.classList.remove('show');
        categoryForm.reset();
        categoryMessage.style.display = 'none';
    }

    document.getElementById('openCategoryModal')
        .addEventListener('click', openCategoryModal);

    document.getElementById('closeCategoryModal')
        .addEventListener('click', closeCategoryModal);

    document.getElementById('cancelCategory')
        .addEventListener('click', closeCategoryModal);

    categoryModal.addEventListener('click', function (event) {
        if (event.target === categoryModal) {
            closeCategoryModal();
        }
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && categoryModal.classList.contains('show')) {
            closeCategoryModal();
        }
    });

    // SIMPAN KATEGORI BARU
    categoryForm.addEventListener('submit', async function (event) {

        event.preventDefault();

        const name = document.getElementById('newCategoryName')
            .value.trim();

        if (!name) {
            return;
        }

        const token = form.querySelector('input[name="_token"]').value;

        saveCategoryButton.disabled = true;
        saveCategoryButton.textContent = 'Menyimpan...';

        categoryMessage.style.display = 'none';

        try {

            const response = await fetch(
                @json(route('admin.categories.store')),
                {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        name: name
                    }),
                    credentials: 'same-origin'
                }
            );

            const result = await response.json();

            if (!response.ok || !result.success || !result.category) {
                throw new Error(
                    result.message || 'Gagal menyimpan kategori.'
                );
            }

            const category = result.category;

            const option = document.createElement('option');
            option.value = category.id;
            option.textContent = category.name;

            categorySelect.appendChild(option);

            // Langsung memilih kategori baru.
            categorySelect.value = category.id;

            closeCategoryModal();

            alert('Kategori berhasil ditambahkan.');

        } catch (error) {

            categoryMessage.textContent =
                error.message || 'Terjadi kesalahan saat menyimpan kategori.';

            categoryMessage.style.display = 'block';
            categoryMessage.style.color = '#dc2626';

        } finally {

            saveCategoryButton.disabled = false;
            saveCategoryButton.textContent = 'Simpan Kategori';

        }

    });

    // MEMILIH DAN MENGUNGGAH GAMBAR KE SERVER.
    function selectImage() {

        const input = document.createElement('input');

        input.type = 'file';
        input.accept = 'image/jpeg,image/png,image/webp';

        input.click();

        input.onchange = async function () {

            const file = input.files[0];

            if (!file) return;

            const allowedTypes = [
                'image/jpeg',
                'image/png',
                'image/webp'
            ];

            if (!allowedTypes.includes(file.type)) {
                alert('Format gambar harus JPG, PNG, atau WEBP.');
                return;
            }

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

                alert(
                    error.message ||
                    'Terjadi kesalahan saat mengunggah gambar.'
                );

            }
        };
    }

    // PREVIEW GAMBAR UTAMA.
    const featuredImage = document.getElementById('featuredImage');
    const previewImage = document.getElementById('previewImage');
    const imagePreview = document.getElementById('imagePreview');

    featuredImage.addEventListener('change', function () {

        const file = this.files[0];

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

        const reader = new FileReader();

        reader.onload = function (event) {
            previewImage.src = event.target.result;
            imagePreview.style.display = 'block';
        };

        reader.readAsDataURL(file);
    });

    // SINKRONISASI EDITOR SEBELUM FORM DIKIRIM.
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
@endpush
