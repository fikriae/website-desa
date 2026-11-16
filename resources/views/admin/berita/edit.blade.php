
@extends('admin.layouts.app')

@section('title', 'Edit Berita - Desa Manyar')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">

    <style>
        .form-container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .form-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 28px;
            margin-bottom: 22px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, .04);
        }

        .form-title {
            font-size: 23px;
            font-weight: 700;
            color: #172554;
            margin-bottom: 6px;
        }

        .form-subtitle {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #334155;
            margin-bottom: 9px;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            font-size: 14px;
            color: #1e293b;
            background: #fff;
            box-sizing: border-box;
        }

        .form-control:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        #editor {
            min-height: 350px;
            font-size: 15px;
        }

        .ql-toolbar.ql-snow {
            border-radius: 9px 9px 0 0;
            border-color: #cbd5e1;
            background: #f8fafc;
        }

        .ql-container.ql-snow {
            border-radius: 0 0 9px 9px;
            border-color: #cbd5e1;
            min-height: 350px;
        }

        .image-preview {
            margin-top: 12px;
            max-width: 300px;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            overflow: hidden;
        }

        .image-preview img {
            width: 100%;
            display: block;
        }

        .form-help {
            color: #64748b;
            font-size: 12px;
            margin-top: 7px;
        }

        .error-message {
            color: #dc2626;
            font-size: 12px;
            margin-top: 6px;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
            border: none;
            padding: 12px 22px;
            border-radius: 9px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            display: inline-block;
            background: #f1f5f9;
            color: #334155;
            padding: 12px 20px;
            border-radius: 9px;
            text-decoration: none;
            font-weight: 600;
        }

        .btn-secondary:hover {
            background: #e2e8f0;
        }

        @media (max-width: 640px) {
            .form-card {
                padding: 18px;
            }

            .form-title {
                font-size: 20px;
            }

            #editor,
            .ql-container.ql-snow {
                min-height: 280px;
            }
        }
    </style>
@endpush

@section('content')
<div class="form-container">

    <div style="margin-bottom: 24px;">
        <h2 class="form-title">Edit Berita</h2>
        <p class="form-subtitle">
            Perbarui informasi dan konten berita Desa Manyar.
        </p>
    </div>

    @if ($errors->any())
        <div class="alert" style="background:#fef2f2;color:#b91c1c;border:1px solid #fecaca;padding:15px;border-radius:10px;margin-bottom:20px;">
            <strong>Periksa kembali data berikut:</strong>
            <ul style="margin:8px 0 0 20px;">
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

        <div class="form-card">

            <div class="form-group">
                <label class="form-label">Judul Berita *</label>
                <input
                    type="text"
                    name="title"
                    class="form-control"
                    value="{{ old('title', $news->title) }}"
                    placeholder="Masukkan judul berita"
                    required
                >
                @error('title')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Kategori Berita</label>
                <select name="category_id" class="form-control">
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
                @error('category_id')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Ringkasan Berita</label>
                <textarea
                    name="excerpt"
                    class="form-control"
                    rows="4"
                    placeholder="Tuliskan ringkasan singkat berita..."
                >{{ old('excerpt', $news->excerpt) }}</textarea>
                @error('excerpt')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Gambar Utama Berita</label>

                <input
                    type="file"
                    name="featured_image"
                    id="featuredImage"
                    class="form-control"
                    accept="image/jpeg,image/png,image/webp"
                >

                <p class="form-help">
                    Kosongkan jika tidak ingin mengganti gambar utama. Format JPG, PNG, atau WEBP. Maksimal 2 MB.
                </p>

                <div class="image-preview" id="imagePreview">
                    @if ($news->featured_image)
                        <img
                            src="{{ asset('storage/' . $news->featured_image) }}"
                            alt="Gambar utama berita"
                            id="previewImage"
                        >
                    @else
                        <img
                            src=""
                            alt="Preview gambar"
                            id="previewImage"
                            style="display:none;"
                        >
                    @endif
                </div>

                @error('featured_image')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="form-card">

            <div class="form-group">
                <label class="form-label">Isi Berita *</label>

                <div id="editor"></div>

                <input
                    type="hidden"
                    name="content"
                    id="content"
                    value="{{ old('content', $news->content) }}"
                >

                <p class="form-help">
                    Gunakan toolbar untuk mengatur tulisan, membuat daftar, menambahkan tautan, dan memasukkan gambar.
                </p>

                @error('content')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="form-card">

            <div class="form-group">
                <label class="form-label">Status Berita *</label>

                <select name="status" class="form-control" required>
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
            </div>

            <div class="form-actions">
                <a href="{{ route('admin.news.index') }}" class="btn-secondary">
                    Kembali
                </a>

                <button type="submit" class="btn-primary" id="submitButton">
                    Simpan Perubahan
                </button>
            </div>

        </div>

    </form>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const editorElement = document.getElementById('editor');
            const contentInput = document.getElementById('content');
            const form = document.getElementById('newsForm');
            const submitButton = document.getElementById('submitButton');

            const quill = new Quill('#editor', {
                theme: 'snow',
                placeholder: 'Tuliskan isi berita Desa Manyar di sini...',
                modules: {
                    toolbar: {
                        container: [
                            [{ header: [1, 2, 3, false] }],
                            ['bold', 'italic', 'underline', 'strike'],
                            [{ list: 'ordered' }, { list: 'bullet' }],
                            ['blockquote'],
                            [{ align: [] }],
                            ['link', 'image'],
                            ['clean']
                        ],

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

            // Memilih gambar untuk dimasukkan ke isi berita.
            function selectImage() {
                const input = document.createElement('input');

                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/jpeg,image/png,image/webp');
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

                    try {
                        const response = await fetch(
                            @json(route('admin.news.upload-image')),
                            {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                    'Accept': 'application/json'
                                },
                                credentials: 'same-origin',
                                body: formData
                            }
                        );

                        const result = await response.json();

                        if (!response.ok || !result.success) {
                            throw new Error(result.message || 'Gagal mengunggah gambar.');
                        }

                        const range = quill.getSelection(true);

                        quill.insertEmbed(range.index, 'image', result.url);
                        quill.setSelection(range.index + 1);

                    } catch (error) {
                        alert(error.message || 'Terjadi kesalahan saat mengunggah gambar.');
                    }
                };
            }

            // Preview gambar utama ketika memilih gambar baru.
            const featuredImage = document.getElementById('featuredImage');
            const previewImage = document.getElementById('previewImage');

            featuredImage.addEventListener('change', function () {
                const file = this.files[0];

                if (!file) return;

                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran gambar maksimal 2 MB.');
                    this.value = '';
                    return;
                }

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

                const reader = new FileReader();

                reader.onload = function (event) {
                    previewImage.src = event.target.result;
                    previewImage.style.display = 'block';
                };

                reader.readAsDataURL(file);
            });

            // Sinkronisasi editor dengan input content sebelum submit.
            form.addEventListener('submit', function () {
                contentInput.value = quill.root.innerHTML;

                submitButton.disabled = true;
                submitButton.textContent = 'Menyimpan...';
            });

        });
    </script>
@endpush
