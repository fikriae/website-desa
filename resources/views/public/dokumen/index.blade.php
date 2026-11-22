
@extends('public.layouts.app')

@section('title', 'Layanan Surat Desa Manyar')

@push('styles')
<style>
    .service-page {
        position: relative;
        max-width: 1200px;
        margin: auto;
        padding: 60px 22px 85px;
        overflow: hidden;
    }

    .service-page::before {
        content: "";
        position: absolute;
        top: 100px;
        right: -130px;
        width: 280px;
        height: 280px;
        background: rgba(180, 155, 69, .07);
        border-radius: 50%;
        pointer-events: none;
    }

    .service-page::after {
        content: "";
        position: absolute;
        bottom: 100px;
        left: -130px;
        width: 260px;
        height: 260px;
        background: rgba(30, 70, 46, .05);
        border-radius: 50%;
        pointer-events: none;
    }

    /* HEADER */
    .service-header {
        position: relative;
        z-index: 1;
        text-align: center;
        max-width: 760px;
        margin: 0 auto 42px;
        animation: serviceFadeUp .7s ease both;
    }

    .service-label {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        color: #1e462e;
        background: #eaf2ed;
        border: 1px solid #dce9df;
        padding: 9px 17px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1.5px;
        text-transform: uppercase;
    }

    .service-label::before {
        content: "";
        width: 7px;
        height: 7px;
        background: #b49b45;
        border-radius: 50%;
    }

    .service-header h1 {
        font-family: 'Bricolage Grotesque', sans-serif;
        color: #1e462e;
        font-size: clamp(30px, 4vw, 42px);
        font-weight: 800;
        margin: 17px 0 12px;
    }

    .service-header p {
        max-width: 680px;
        margin: auto;
        color: #77847a;
        font-size: 14px;
        line-height: 1.9;
    }

    /* SEARCH */
    .service-search {
        position: relative;
        z-index: 1;
        max-width: 750px;
        margin: 0 auto 42px;
        display: flex;
        gap: 10px;
        padding: 17px;
        background: #fff;
        border: 1px solid #e7eee8;
        border-radius: 14px;
        box-shadow: 0 8px 25px rgba(30, 70, 46, .06);
    }

    .service-search input {
        flex: 1;
        min-width: 0;
        padding: 13px 16px;
        border: 1px solid #dce6dd;
        border-radius: 9px;
        background: #fff;
        font-size: 13px;
        color: #344a39;
        outline: none;
        transition: all .25s ease;
    }

    .service-search input::placeholder {
        color: #a0aaa2;
    }

    .service-search input:focus {
        border-color: #1e462e;
        box-shadow: 0 0 0 3px rgba(30, 70, 46, .08);
    }

    .service-search button {
        border: 1px solid #1e462e;
        border-radius: 9px;
        padding: 0 24px;
        background: #1e462e;
        color: #fff;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: all .3s ease;
    }

    .service-search button:hover {
        background: #fff;
        color: #1e462e;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(30, 70, 46, .12);
    }

    /* INFO */
    .service-info {
        position: relative;
        z-index: 1;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
    }

    .service-info h2 {
        font-family: 'Bricolage Grotesque', sans-serif;
        color: #1e462e;
        font-size: 20px;
        font-weight: 800;
        margin: 0;
    }

    .service-info span {
        color: #78867c;
        background: #eaf2ed;
        border: 1px solid #dce9df;
        padding: 7px 13px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 700;
    }

    /* GRID */
    .service-grid {
        position: relative;
        z-index: 1;
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 22px;
    }

    .service-card {
        display: flex;
        flex-direction: column;
        position: relative;
        padding: 26px;
        background: #fff;
        border: 1px solid #e6eee7;
        border-radius: 16px;
        box-shadow: 0 7px 22px rgba(30, 70, 46, .06);
        transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
        animation: serviceFadeUp .65s ease both;
    }

    .service-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 25px;
        width: 45px;
        height: 3px;
        background: #b49b45;
        border-radius: 0 0 5px 5px;
        transition: width .3s ease;
    }

    .service-card:hover {
        transform: translateY(-7px);
        border-color: #c6d8c9;
        box-shadow: 0 15px 32px rgba(30, 70, 46, .12);
    }

    .service-card:hover::before {
        width: 75px;
    }

    .service-icon {
        width: 58px;
        height: 58px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 13px;
        background: #eaf2ed;
        border: 1px solid #dce9df;
        color: #1e462e;
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
        margin-bottom: 21px;
        overflow: hidden;
    }

    .service-card h3 {
        color: #1e462e;
        font-family: 'Bricolage Grotesque', sans-serif;
        font-size: 17px;
        line-height: 1.5;
        font-weight: 800;
        margin: 0 0 10px;
        overflow-wrap: anywhere;
    }

    .service-card p {
        color: #7a887e;
        font-size: 13px;
        line-height: 1.8;
        margin: 0 0 22px;
        flex: 1;
        overflow-wrap: anywhere;
    }

    .service-file-type {
        display: flex;
        align-items: center;
        gap: 7px;
        color: #929e94;
        font-size: 11px;
        margin-bottom: 15px;
        text-transform: uppercase;
        font-weight: 700;
    }

    .service-file-type::before {
        content: "▤";
        color: #b49b45;
        font-size: 15px;
    }

    /* DOWNLOAD */
    .service-download {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        width: 100%;
        padding: 13px 15px;
        background: #1e462e;
        color: #fff;
        text-decoration: none;
        border: 1px solid #1e462e;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 700;
        transition: all .25s ease;
        box-sizing: border-box;
    }

    .service-download:hover {
        background: #fff;
        color: #1e462e;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(30, 70, 46, .10);
    }

    .service-download span {
        font-size: 17px;
        line-height: 1;
    }

    /* BAGIKAN DOKUMEN */
    .service-share {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 16px;
        margin-top: 15px;
        padding-top: 13px;
        border-top: 1px solid #edf1ed;
    }

    .service-share button,
    .service-share a {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 0;
        border: none;
        background: transparent;
        color: #718075;
        font-family: inherit;
        font-size: 11px;
        font-weight: 700;
        text-decoration: none;
        cursor: pointer;
        transition: color .2s ease;
    }

    .service-share button:hover,
    .service-share a:hover {
        color: #1e462e;
    }

    .service-share svg {
        width: 15px;
        height: 15px;
        flex-shrink: 0;
    }

    /* EMPTY STATE */
    .service-empty {
        grid-column: 1 / -1;
        text-align: center;
        padding: 70px 20px;
        background: #fff;
        border: 1px dashed #cbd9ce;
        border-radius: 16px;
    }

    .service-empty-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 68px;
        height: 68px;
        margin: 0 auto 18px;
        background: #eaf2ed;
        border-radius: 50%;
        font-size: 28px;
    }

    .service-empty h3 {
        color: #1e462e;
        font-family: 'Bricolage Grotesque', sans-serif;
        font-size: 19px;
        margin: 0 0 9px;
    }

    .service-empty p {
        color: #849188;
        font-size: 13px;
        line-height: 1.7;
        margin: 0;
    }

    /* PAGINATION */
    .service-pagination {
        position: relative;
        z-index: 1;
        margin-top: 38px;
    }

    .service-pagination nav {
        display: flex;
        justify-content: center;
    }

    .service-pagination nav a,
    .service-pagination nav span {
        border-color: #e0e9e1 !important;
        color: #1e462e !important;
    }

    .service-pagination nav [aria-current="page"] span {
        background: #1e462e !important;
        border-color: #1e462e !important;
        color: #fff !important;
    }

    /* HELP */
    .service-help {
        position: relative;
        z-index: 1;
        margin-top: 50px;
        padding: 28px 30px;
        background: linear-gradient(120deg, #eaf2ed, #f5f8f5);
        border: 1px solid #dce9df;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 22px;
        overflow: hidden;
    }

    .service-help::after {
        content: "?";
        position: absolute;
        right: 190px;
        top: -38px;
        color: rgba(30, 70, 46, .05);
        font-family: 'Bricolage Grotesque', sans-serif;
        font-size: 180px;
        font-weight: 800;
        line-height: 1;
        pointer-events: none;
    }

    .service-help-content {
        position: relative;
        z-index: 1;
    }

    .service-help h3 {
        color: #1e462e;
        font-family: 'Bricolage Grotesque', sans-serif;
        font-size: 19px;
        font-weight: 800;
        margin: 0 0 8px;
    }

    .service-help p {
        color: #718076;
        font-size: 13px;
        line-height: 1.8;
        margin: 0;
    }

    .service-help a {
        position: relative;
        z-index: 1;
        flex-shrink: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 19px;
        border: 1px solid #1e462e;
        border-radius: 9px;
        background: #1e462e;
        color: #fff;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
        transition: all .3s ease;
    }

    .service-help a:hover {
        background: #fff;
        color: #1e462e;
        transform: translateY(-3px);
        box-shadow: 0 7px 17px rgba(30, 70, 46, .12);
    }

    @keyframes serviceFadeUp {
        from {
            opacity: 0;
            transform: translateY(18px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 900px) {
        .service-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 600px) {
        .service-page {
            padding: 42px 16px 60px;
        }

        .service-header {
            margin-bottom: 30px;
        }

        .service-header h1 {
            font-size: 29px;
        }

        .service-header p {
            font-size: 13px;
        }

        .service-search {
            flex-direction: column;
            padding: 14px;
            margin-bottom: 30px;
        }

        .service-search input {
            width: 100%;
            box-sizing: border-box;
        }

        .service-search button {
            min-height: 44px;
        }

        .service-info {
            align-items: flex-start;
            flex-direction: column;
            gap: 9px;
        }

        .service-grid {
            grid-template-columns: 1fr;
            gap: 17px;
        }

        .service-card {
            padding: 23px;
        }

        .service-help {
            flex-direction: column;
            align-items: flex-start;
            padding: 23px;
        }

        .service-help a {
            width: 100%;
            box-sizing: border-box;
        }

        .service-help::after {
            right: 15px;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .service-header,
        .service-card {
            animation: none;
        }

        .service-card,
        .service-card::before,
        .service-download,
        .service-help a {
            transition: none;
        }
    }
</style>
@endpush

@section('content')
<div class="service-page">

    <div class="service-header">
        <span class="service-label">Pelayanan Pemerintah Desa</span>

        <h1>Layanan Surat</h1>

        <p>
            Pemerintah Desa Manyar menyediakan berbagai formulir dan dokumen
            administrasi yang dapat diunduh secara langsung oleh masyarakat.
            Silakan pilih dokumen sesuai kebutuhan Anda.
        </p>
    </div>

    {{-- PENCARIAN --}}
    <form
        action="{{ route('public.documents.index') }}"
        method="GET"
        class="service-search"
    >
        <input
            type="search"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari nama formulir atau dokumen..."
        >

        <button type="submit">Cari Dokumen</button>
    </form>

    {{-- INFORMASI DOKUMEN --}}
    <div class="service-info">
        <h2>Daftar Dokumen</h2>

        <span>
            {{ $documents->total() }} dokumen tersedia
        </span>
    </div>

    {{-- DAFTAR DOKUMEN --}}
    <div class="service-grid">

        @forelse($documents as $document)

            @php
                $downloadUrl = route('public.documents.download', $document);
                $shareText = $document->title . ' - Layanan Surat Desa Manyar: ' . $downloadUrl;
            @endphp

            <article class="service-card">

                <div class="service-icon">
                    {{ $document->file_type ?: 'FILE' }}
                </div>

                <h3>{{ $document->title }}</h3>

                <p>
                    {{ $document->description ?: 'Dokumen administrasi resmi Desa Manyar.' }}
                </p>

                <div class="service-file-type">
                    Format: {{ $document->file_type ?: 'Dokumen' }}
                </div>

                {{-- UNDUH DOKUMEN --}}
                <a
                    href="{{ $downloadUrl }}"
                    class="service-download"
                >
                    <span>↓</span>
                    Unduh Dokumen
                </a>

                {{-- BAGIKAN DOKUMEN --}}
                <div class="service-share">

                    {{-- SALIN LINK --}}
                    <button
                        type="button"
                        onclick="copyDocumentLink(this)"
                        data-url="{{ $downloadUrl }}"
                        title="Salin link dokumen"
                    >
                        <svg viewBox="0 0 24 24" fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round">
                            <rect x="8" y="8" width="13" height="13" rx="2"></rect>
                            <path d="M16 8V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h3"></path>
                        </svg>
                        <span>Salin Link</span>
                    </button>

                    {{-- WHATSAPP --}}
                    <a
                        href="https://wa.me/?text={{ urlencode($shareText) }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        title="Bagikan melalui WhatsApp"
                    >
                        <svg viewBox="0 0 24 24" fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M21 11.5a8.4 8.4 0 0 1-12.4 7.4L3 20l1.1-5.3A8.4 8.4 0 1 1 21 11.5Z"></path>
                            <path d="M8.5 9.5c.5 2 2 3.5 4 4l1-1 2 1c-.3 1-1 1.5-2 1.5-3 0-6.5-3.5-6.5-6.5 0-1 .5-1.7 1.5-2l1 2-1 1Z"></path>
                        </svg>
                        <span>WhatsApp</span>
                    </a>

                </div>

            </article>

        @empty

            <div class="service-empty">
                <div class="service-empty-icon">📄</div>

                <h3>Dokumen Belum Tersedia</h3>

                <p>
                    @if(request('search'))
                        Tidak ditemukan dokumen dengan kata kunci
                        "{{ request('search') }}".
                    @else
                        Belum ada dokumen layanan surat yang dipublikasikan.
                    @endif
                </p>
            </div>

        @endforelse

    </div>

    {{-- PAGINATION --}}
    @if($documents->hasPages())
        <div class="service-pagination">
            {{ $documents->appends(request()->query())->links() }}
        </div>
    @endif

    {{-- BANTUAN --}}
    <div class="service-help">
        <div class="service-help-content">
            <h3>Butuh Informasi Lebih Lanjut?</h3>
            <p>
                Hubungi Pemerintah Desa Manyar jika Anda membutuhkan
                informasi mengenai persyaratan atau penggunaan dokumen.
            </p>
        </div>

        <a href="{{ route('public.contact') }}">
            Hubungi Kami
            <span>→</span>
        </a>
    </div>

</div>
@endsection

@push('scripts')
<script>
    // MENYALIN LINK DOKUMEN
    function copyDocumentLink(button) {
        const url = button.dataset.url;
        const label = button.querySelector('span');
        const originalLabel = label.textContent;

        function showCopied() {
            label.textContent = 'Tersalin!';

            setTimeout(() => {
                label.textContent = originalLabel;
            }, 1800);
        }

        function fallbackCopyDocument() {
            const textarea = document.createElement('textarea');

            textarea.value = url;
            textarea.style.position = 'fixed';
            textarea.style.opacity = '0';

            document.body.appendChild(textarea);
            textarea.select();

            try {
                const success = document.execCommand('copy');

                if (success) {
                    showCopied();
                } else {
                    alert('Gagal menyalin link dokumen.');
                }
            } catch (error) {
                alert('Gagal menyalin link dokumen.');
            }

            document.body.removeChild(textarea);
        }

        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(url)
                .then(showCopied)
                .catch(fallbackCopyDocument);
        } else {
            fallbackCopyDocument();
        }
    }
</script>
@endpush
