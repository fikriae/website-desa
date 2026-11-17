
@extends('admin.layouts.app')

@section('title', 'Edit Dokumen')

@section('content')
<style>
    .document-form-page {
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
        line-height: 1.6;
    }

    .form-error {
        color: #dc2626;
        font-size: 12px;
        margin-top: 6px;
    }

    .current-file {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 15px;
        border: 1px solid #e2e8f0;
        background: #f8fafc;
        border-radius: 9px;
        margin-bottom: 12px;
    }

    .file-icon {
        width: 43px;
        height: 43px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 9px;
        background: #eff6ff;
        color: #1d4ed8;
        font-weight: 800;
        font-size: 12px;
        text-transform: uppercase;
        flex-shrink: 0;
    }

    .file-details {
        min-width: 0;
    }

    .file-details strong {
        display: block;
        color: #334155;
        font-size: 13px;
        overflow-wrap: anywhere;
    }

    .file-details a {
        color: #2563eb;
        font-size: 12px;
        text-decoration: none;
        display: inline-block;
        margin-top: 5px;
    }

    .file-info {
        display: none;
        margin-top: 12px;
        padding: 13px;
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        color: #166534;
        border-radius: 8px;
        font-size: 13px;
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

<div class="document-form-page">

    <div class="form-header">
        <h2>Edit Dokumen</h2>
        <p>Perbarui informasi dan file layanan administrasi Desa Manyar.</p>
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
            action="{{ route('admin.documents.update', $document) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">
                    Nama Dokumen <span style="color:red">*</span>
                </label>

                <input
                    type="text"
                    name="title"
                    id="title"
                    class="form-control"
                    value="{{ old('title', $document->title) }}"
                    placeholder="Masukkan nama dokumen"
                    required
                >

                @error('title')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Deskripsi Dokumen</label>

                <textarea
                    name="description"
                    id="description"
                    class="form-control"
                    placeholder="Jelaskan fungsi dokumen..."
                >{{ old('description', $document->description) }}</textarea>

                @error('description')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>File Saat Ini</label>

                <div class="current-file">
                    <div class="file-icon">
                        {{ $document->file_type ?: 'FILE' }}
                    </div>

                    <div class="file-details">
                        <strong>{{ basename($document->file_path) }}</strong>

                        <a
                            href="{{ asset('storage/' . $document->file_path) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            Lihat / Unduh File
                        </a>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="file">Ganti File Dokumen</label>

                <input
                    type="file"
                    name="file"
                    id="file"
                    class="form-control"
                    accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx"
                >

                <small class="form-hint">
                    Kosongkan jika tidak ingin mengganti file.
                    Format PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX.
                    Maksimal 10 MB.
                </small>

                <div class="file-info" id="fileInfo"></div>

                @error('file')
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
                    value="{{ old('sort_order', $document->sort_order) }}"
                >

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
                        {{ old('is_active', $document->is_active) ? 'checked' : '' }}
                    >

                    <label for="is_active">
                        Tampilkan dokumen di website publik
                    </label>
                </div>
            </div>

            <div class="form-actions">
                <a
                    href="{{ route('admin.documents.index') }}"
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
    document.getElementById('file').addEventListener('change', function() {
        const file = this.files[0];
        const fileInfo = document.getElementById('fileInfo');

        if (!file) {
            fileInfo.style.display = 'none';
            fileInfo.textContent = '';
            return;
        }

        const allowedExtensions = [
            'pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx'
        ];

        const extension = file.name.split('.').pop().toLowerCase();

        if (!allowedExtensions.includes(extension)) {
            alert('Format file tidak didukung.');
            this.value = '';
            fileInfo.style.display = 'none';
            return;
        }

        if (file.size > 10 * 1024 * 1024) {
            alert('Ukuran file maksimal 10 MB.');
            this.value = '';
            fileInfo.style.display = 'none';
            return;
        }

        const size = (file.size / 1024 / 1024).toFixed(2);

        fileInfo.innerHTML =
            '<strong>File baru dipilih:</strong> ' +
            file.name +
            '<br><strong>Ukuran:</strong> ' +
            size +
            ' MB';

        fileInfo.style.display = 'block';
    });
</script>
@endsection
