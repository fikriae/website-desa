
@extends('public.layouts.app')

@section('title', $agenda->title . ' - Agenda Desa Manyar')

@push('styles')
<style>
    .detail-page {
        position: relative;
        max-width: 100%;
        padding: 55px 22px 85px;
        background: #f5f8f5;
        overflow: hidden;
        isolation: isolate;
    }

    .detail-page::before {
        content: "";
        position: absolute;
        top: -150px;
        right: -120px;
        width: 350px;
        height: 350px;
        background: rgba(30, 70, 46, .045);
        border-radius: 50%;
        z-index: -1;
    }

    .detail-page::after {
        content: "";
        position: absolute;
        bottom: -180px;
        left: -120px;
        width: 400px;
        height: 400px;
        background: rgba(217, 198, 107, .08);
        border-radius: 50%;
        z-index: -1;
    }

    .detail-container {
        max-width: 900px;
        margin: auto;
        background: #fff;
        border: 1px solid #e5ebe5;
        border-radius: 17px;
        padding: 35px;
        box-shadow: 0 8px 28px rgba(18, 48, 30, .045);
    }

    /* BREADCRUMB */
    .breadcrumb {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 10px;
        max-width: 900px;
        margin: 0 auto 25px;
        color: #87958a;
        font-size: 12px;
    }

    .breadcrumb a {
        color: #1e462e;
        font-weight: 700;
        text-decoration: none;
        transition: .25s ease;
    }

    .breadcrumb a:hover {
        color: #a58c3d;
    }

    .breadcrumb span:nth-child(2),
    .breadcrumb span:nth-child(4) {
        color: #b49b45;
    }

    /* CATEGORY */
    .detail-category {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #eaf2ed;
        color: #1e462e;
        padding: 8px 15px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1px;
        margin-bottom: 17px;
    }

    .detail-category::before {
        content: "";
        width: 7px;
        height: 7px;
        background: #b49b45;
        border-radius: 50%;
    }

    /* TITLE */
    .detail-title {
        color: #12301e;
        font-family: 'Bricolage Grotesque', sans-serif;
        font-size: clamp(27px, 4vw, 39px);
        line-height: 1.35;
        font-weight: 800;
        margin: 0 0 20px;
        overflow-wrap: anywhere;
    }

    /* META */
    .detail-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 12px 22px;
        color: #87958a;
        font-size: 12px;
        padding-bottom: 23px;
        border-bottom: 1px solid #e8eee8;
        margin-bottom: 25px;
    }

    .detail-meta span {
        display: inline-flex;
        align-items: center;
        gap: 7px;
    }

    .detail-meta strong {
        color: #1e462e;
        font-weight: 700;
    }

    /* IMAGE */
    .detail-image {
        width: 100%;
        max-height: 480px;
        object-fit: cover;
        display: block;
        border-radius: 13px;
        margin-bottom: 28px;
        background: #eaf2ed;
    }

    .detail-placeholder {
        width: 100%;
        height: 300px;
        background: linear-gradient(135deg, #eaf2ed, #f5f8f5);
        border-radius: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #78947f;
        font-size: 50px;
        margin-bottom: 28px;
    }

    /* INFORMATION */
    .detail-info {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 15px;
        margin-bottom: 30px;
    }

    .info-card {
        background: #f8faf8;
        border: 1px solid #e5ebe5;
        border-radius: 12px;
        padding: 19px;
        transition: .25s ease;
    }

    .info-card:hover {
        border-color: #cbd9ce;
        background: #f3f7f3;
        transform: translateY(-2px);
    }

    .info-label {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #87958a;
        font-size: 11px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .info-label span {
        color: #a58c3d;
        font-size: 15px;
    }

    .info-value {
        color: #12301e;
        font-size: 14px;
        font-weight: 750;
        line-height: 1.7;
        overflow-wrap: anywhere;
    }

    .info-location {
        grid-column: 1 / -1;
    }

    /* DESCRIPTION */
    .detail-content {
        color: #46564b;
        font-size: 14px;
        line-height: 1.95;
        overflow-wrap: anywhere;
    }

    .detail-content p {
        margin: 0 0 16px;
    }

    .detail-content h1,
    .detail-content h2,
    .detail-content h3,
    .detail-content h4 {
        color: #12301e;
        font-family: 'Bricolage Grotesque', sans-serif;
        line-height: 1.4;
        margin: 25px 0 13px;
        font-weight: 800;
    }

    .detail-content h2 {
        font-size: 24px;
    }

    .detail-content h3 {
        font-size: 20px;
    }

    .detail-content img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        margin: 12px 0;
    }

    .detail-content a {
        color: #1e462e;
        font-weight: 600;
    }

    .detail-content ul,
    .detail-content ol {
        padding-left: 25px;
        margin-bottom: 18px;
    }

    .detail-content li {
        margin-bottom: 7px;
    }

    /* SHARE AGENDA */
    .detail-share {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 18px;
        margin-top: 27px;
        padding-top: 18px;
        border-top: 1px solid #e8eee8;
    }

    .detail-share button,
    .detail-share a {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 0;
        border: none;
        background: transparent;
        color: #718075;
        font-family: inherit;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
        cursor: pointer;
        transition: .2s ease;
    }

    .detail-share button:hover,
    .detail-share a:hover {
        color: #1e462e;
    }

    .detail-share .share-whatsapp:hover {
        color: #168b48;
    }

    .detail-share svg {
        width: 17px;
        height: 17px;
        flex-shrink: 0;
    }

    /* BACK BUTTON */
    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        margin-top: 32px;
        padding: 12px 19px;
        background: #1e462e;
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
        transition: .25s ease;
    }

    .back-button:hover {
        background: #12301e;
        color: white;
        transform: translateY(-2px);
    }

    .back-button span {
        transition: transform .25s ease;
    }

    .back-button:hover span {
        transform: translateX(-4px);
    }

    /* RESPONSIVE */
    @media (max-width: 600px) {
        .detail-page {
            padding: 35px 16px 60px;
        }

        .breadcrumb {
            gap: 7px;
            font-size: 11px;
            margin-bottom: 20px;
        }

        .detail-container {
            padding: 21px;
            border-radius: 13px;
        }

        .detail-title {
            font-size: 26px;
        }

        .detail-meta {
            flex-direction: column;
            gap: 10px;
        }

        .detail-image {
            max-height: 280px;
            margin-bottom: 22px;
        }

        .detail-placeholder {
            height: 210px;
            margin-bottom: 22px;
        }

        .detail-info {
            grid-template-columns: 1fr;
            gap: 11px;
        }

        .info-location {
            grid-column: auto;
        }

        .info-card {
            padding: 16px;
        }

        .detail-content {
            font-size: 13px;
            line-height: 1.85;
        }

        .detail-share {
            gap: 15px;
        }

        .detail-share button,
        .detail-share a {
            font-size: 11px;
        }

        .back-button {
            font-size: 11px;
            padding: 11px 15px;
        }
    }
</style>
@endpush

@section('content')

<div class="detail-page">

    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a>
        <span>/</span>
        <a href="{{ route('public.agendas.index') }}">Agenda</a>
        <span>/</span>
        <span>Detail Agenda</span>
    </div>

    <article class="detail-container">

        <span class="detail-category">
            AGENDA KEGIATAN DESA
        </span>

        <h1 class="detail-title">
            {{ $agenda->title }}
        </h1>

        <div class="detail-meta">
            <span>
                Dipublikasikan:
                <strong>
                    {{ $agenda->created_at->translatedFormat('d F Y') }}
                </strong>
            </span>

            <span>
                Penulis:
                <strong>
                    {{ $agenda->author->name ?? 'Admin Desa Manyar' }}
                </strong>
            </span>
        </div>

        @if($agenda->featured_image)
            <img
                src="{{ asset('storage/' . $agenda->featured_image) }}"
                alt="{{ $agenda->title }}"
                class="detail-image"
            >
        @else
            <div class="detail-placeholder">
                ▧
            </div>
        @endif

        <div class="detail-info">

            <div class="info-card">
                <span class="info-label">
                    <span>◷</span>
                    Tanggal dan Waktu Mulai
                </span>

                <div class="info-value">
                    {{ $agenda->start_date->translatedFormat('l, d F Y') }}
                    <br>
                    {{ $agenda->start_date->format('H:i') }} WIB
                </div>
            </div>

            <div class="info-card">
                <span class="info-label">
                    <span>◷</span>
                    Tanggal dan Waktu Selesai
                </span>

                <div class="info-value">
                    @if($agenda->end_date)
                        {{ $agenda->end_date->translatedFormat('l, d F Y') }}
                        <br>
                        {{ $agenda->end_date->format('H:i') }} WIB
                    @else
                        Belum ditentukan
                    @endif
                </div>
            </div>

            <div class="info-card info-location">
                <span class="info-label">
                    <span>⌖</span>
                    Lokasi Kegiatan
                </span>

                <div class="info-value">
                    {{ $agenda->location ?: 'Lokasi belum ditentukan' }}
                </div>
            </div>

        </div>

        <div class="detail-content">
            {!! nl2br(e($agenda->description ?? 'Belum ada deskripsi kegiatan.')) !!}
        </div>

        {{-- SHARE AGENDA --}}
        <div class="detail-share">

            {{-- SALIN LINK --}}
            <button
                type="button"
                onclick="copyDetailAgendaLink(this)"
                data-url="{{ route('public.agendas.show', $agenda->slug) }}"
            >
                <svg viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <rect x="8" y="8" width="13" height="13" rx="2"></rect>
                    <path d="M16 8V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h3"></path>
                </svg>
                <span>Salin Link</span>
            </button>

            {{-- BAGIKAN WHATSAPP --}}
            <a
                class="share-whatsapp"
                href="https://wa.me/?text={{ urlencode($agenda->title . ' - Agenda Kegiatan Desa Manyar: ' . route('public.agendas.show', $agenda->slug)) }}"
                target="_blank"
                rel="noopener noreferrer"
            >
                <svg viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 11.5a8.4 8.4 0 0 1-12.4 7.4L3 21l2.1-5.4A8.4 8.4 0 1 1 21 11.5Z"></path>
                    <path d="M9 9.5c.5 2 2 3.5 4 4l1.2-1.2 2 1c-.2 1.2-1.2 2-2.5 2-3.5-.5-6.5-3.5-7-7-.1-1.3.8-2.3 2-2.5l1 2L9 9.5Z"></path>
                </svg>
                <span>WhatsApp</span>
            </a>

        </div>

        <a
            href="{{ route('public.agendas.index') }}"
            class="back-button"
        >
            <span>←</span>
            Kembali ke Agenda
        </a>

    </article>

</div>

{{-- JAVASCRIPT SALIN LINK --}}
<script>
    function copyDetailAgendaLink(button) {
        const url = button.getAttribute('data-url');
        const label = button.querySelector('span');
        const originalText = label.textContent;

        function showCopied() {
            label.textContent = 'Tersalin!';

            setTimeout(() => {
                label.textContent = originalText;
            }, 1800);
        }

        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(url)
                .then(showCopied)
                .catch(() => fallbackCopyAgenda(url, showCopied));
        } else {
            fallbackCopyAgenda(url, showCopied);
        }
    }

    function fallbackCopyAgenda(text, callback) {
        const textarea = document.createElement('textarea');

        textarea.value = text;
        textarea.style.position = 'fixed';
        textarea.style.opacity = '0';
        textarea.style.left = '-9999px';

        document.body.appendChild(textarea);
        textarea.select();

        try {
            const success = document.execCommand('copy');

            if (success) {
                callback();
            } else {
                alert('Gagal menyalin link. Silakan salin secara manual.');
            }
        } catch (error) {
            alert('Gagal menyalin link. Silakan salin secara manual.');
        }

        document.body.removeChild(textarea);
    }
</script>

@endsection
