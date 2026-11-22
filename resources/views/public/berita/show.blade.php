
@extends('public.layouts.app')

@section('title', $news->title . ' - Desa Manyar')

@push('styles')
<style>
    .detail-page {
        position: relative;
        max-width: 1200px;
        margin: auto;
        padding: 55px 22px 80px;
        overflow: hidden;
    }

    .detail-page::before {
        content: "";
        position: absolute;
        top: 120px;
        right: -130px;
        width: 280px;
        height: 280px;
        background: rgba(180, 155, 69, .07);
        border-radius: 50%;
        pointer-events: none;
    }

    .detail-page::after {
        content: "";
        position: absolute;
        bottom: 80px;
        left: -130px;
        width: 250px;
        height: 250px;
        background: rgba(30, 70, 46, .05);
        border-radius: 50%;
        pointer-events: none;
    }

    .breadcrumb {
        position: relative;
        z-index: 1;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 9px;
        color: #849188;
        font-size: 13px;
        margin-bottom: 30px;
    }

    .breadcrumb a {
        color: #1e462e;
        font-weight: 600;
        text-decoration: none;
        transition: color .25s ease;
    }

    .breadcrumb a:hover {
        color: #b49b45;
    }

    .breadcrumb span {
        color: #78847b;
    }

    .detail-layout {
        position: relative;
        z-index: 1;
        display: grid;
        grid-template-columns: minmax(0, 1fr) 300px;
        gap: 32px;
        align-items: start;
    }

    .detail-article {
        min-width: 0;
        background: #fff;
        padding: 38px;
        border: 1px solid #e8eee9;
        border-radius: 20px;
        box-shadow: 0 12px 35px rgba(30, 70, 46, .07);
        animation: detailFadeIn .65s ease both;
    }

    .detail-category {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: #eaf2ed;
        color: #1e462e;
        padding: 8px 15px;
        border: 1px solid #dce9df;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 18px;
    }

    .detail-category::before {
        content: "";
        width: 7px;
        height: 7px;
        background: #b49b45;
        border-radius: 50%;
    }

    .detail-title {
        font-family: 'Bricolage Grotesque', sans-serif;
        font-size: clamp(27px, 3.2vw, 38px);
        line-height: 1.3;
        color: #1e462e;
        font-weight: 800;
        margin: 0 0 20px;
        overflow-wrap: anywhere;
    }

    .detail-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 12px 22px;
        color: #7b887e;
        font-size: 13px;
        margin-bottom: 28px;
        padding-bottom: 22px;
        border-bottom: 1px solid #edf1ed;
    }

    .detail-meta span {
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .detail-featured-image {
        display: block;
        width: 100%;
        max-height: 490px;
        object-fit: cover;
        border-radius: 15px;
        margin-bottom: 30px;
        box-shadow: 0 8px 22px rgba(18, 48, 30, .10);
    }

    .detail-content {
        color: #4d5c51;
        font-size: 15px;
        line-height: 1.9;
        overflow-wrap: anywhere;
    }

    .detail-content h1,
    .detail-content h2,
    .detail-content h3,
    .detail-content h4 {
        font-family: 'Bricolage Grotesque', sans-serif;
        color: #1e462e;
        line-height: 1.4;
        margin-top: 28px;
        margin-bottom: 14px;
        font-weight: 700;
    }

    .detail-content h1 {
        font-size: 29px;
    }

    .detail-content h2 {
        font-size: 25px;
    }

    .detail-content h3 {
        font-size: 21px;
    }

    .detail-content p {
        margin-bottom: 17px;
    }

    .detail-content a {
        color: #1e462e;
        font-weight: 600;
        text-decoration: underline;
        text-decoration-color: #b49b45;
        text-underline-offset: 3px;
    }

    .detail-content a:hover {
        color: #b49b45;
    }

    .detail-content img {
        max-width: 100%;
        height: auto;
        border-radius: 13px;
        margin: 16px 0;
    }

    .detail-content figure {
        max-width: 100%;
        margin: 20px 0;
    }

    .detail-content blockquote {
        border-left: 4px solid #b49b45;
        padding: 15px 20px;
        background: #f5f8f5;
        color: #526457;
        border-radius: 0 12px 12px 0;
        margin: 22px 0;
    }

    .detail-content ul,
    .detail-content ol {
        padding-left: 25px;
        margin-bottom: 18px;
    }

    .detail-content li {
        margin-bottom: 7px;
    }

    .detail-content table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    .detail-content th,
    .detail-content td {
        padding: 10px 12px;
        border: 1px solid #e2eae3;
        text-align: left;
    }

    .detail-content th {
        background: #eaf2ed;
        color: #1e462e;
    }

    .detail-content iframe {
        max-width: 100%;
    }

    /* BAGIKAN BERITA */
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

    .detail-share svg {
        width: 16px;
        height: 16px;
        flex-shrink: 0;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        margin-top: 35px;
        padding: 12px 19px;
        color: #fff;
        background: #1e462e;
        border: 1px solid #1e462e;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        transition: all .3s ease;
    }

    .back-link:hover {
        color: #1e462e;
        background: #fff;
        border-color: #1e462e;
        transform: translateY(-3px);
        box-shadow: 0 7px 18px rgba(30, 70, 46, .12);
    }

    /* SIDEBAR */
    .detail-sidebar {
        position: sticky;
        top: 25px;
        background: #fff;
        border: 1px solid #e8eee9;
        border-radius: 18px;
        padding: 25px;
        box-shadow: 0 10px 30px rgba(30, 70, 46, .06);
        animation: detailFadeIn .8s ease both;
    }

    .sidebar-heading {
        display: flex;
        align-items: center;
        gap: 11px;
        padding-bottom: 18px;
        border-bottom: 1px solid #edf1ed;
        margin-bottom: 5px;
    }

    .sidebar-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 38px;
        height: 38px;
        color: #1e462e;
        background: #eaf2ed;
        border-radius: 11px;
        font-size: 17px;
    }

    .detail-sidebar h3 {
        font-family: 'Bricolage Grotesque', sans-serif;
        color: #1e462e;
        font-size: 18px;
        font-weight: 800;
        margin: 0;
    }

    .related-item {
        padding: 16px 0;
        border-bottom: 1px solid #edf1ed;
        transition: padding .25s ease;
    }

    .related-item:last-child {
        border-bottom: none;
    }

    .related-item a {
        display: block;
        color: #344a39;
        text-decoration: none;
        font-size: 14px;
        line-height: 1.6;
        font-weight: 700;
        transition: color .25s ease;
    }

    .related-item a:hover {
        color: #a58c3d;
    }

    .related-date {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #9aa59c;
        font-size: 11px;
        margin-top: 8px;
    }

    .related-date::before {
        content: "◷";
        color: #b49b45;
        font-size: 13px;
    }

    .sidebar-empty {
        color: #849188;
        font-size: 13px;
        line-height: 1.7;
        padding: 15px 0 5px;
    }

    @keyframes detailFadeIn {
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
        .detail-layout {
            grid-template-columns: 1fr;
            gap: 25px;
        }

        .detail-sidebar {
            position: relative;
            top: auto;
        }
    }

    @media (max-width: 600px) {
        .detail-page {
            padding: 32px 16px 55px;
        }

        .breadcrumb {
            font-size: 12px;
            margin-bottom: 22px;
        }

        .detail-article {
            padding: 23px 19px;
            border-radius: 15px;
        }

        .detail-title {
            font-size: 26px;
        }

        .detail-meta {
            gap: 10px 15px;
            font-size: 12px;
        }

        .detail-featured-image {
            border-radius: 11px;
            margin-bottom: 22px;
        }

        .detail-content {
            font-size: 14px;
        }

        .detail-sidebar {
            padding: 21px;
        }
    }
</style>
@endpush

@section('content')
<section class="detail-page">

    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a>
        <span>/</span>
        <a href="{{ route('public.news.index') }}">Berita</a>
        <span>/</span>
        <span>{{ \Illuminate\Support\Str::limit($news->title, 45) }}</span>
    </div>

    <div class="detail-layout">

        <article class="detail-article">

            @if ($news->category)
                <span class="detail-category">
                    {{ $news->category->name }}
                </span>
            @endif

            <h1 class="detail-title">{{ $news->title }}</h1>

            <div class="detail-meta">
                <span>
                    📅 {{ $news->published_at?->translatedFormat('d F Y') }}
                </span>

                @if ($news->author)
                    <span>✍ {{ $news->author->name }}</span>
                @endif
            </div>

            @if ($news->featured_image)
                <img
                    class="detail-featured-image"
                    src="{{ asset('storage/' . $news->featured_image) }}"
                    alt="{{ $news->title }}"
                >
            @endif

            <div class="detail-content">
                {!! $news->content !!}
            </div>

            {{-- BAGIKAN BERITA --}}
            <div class="detail-share">

                <button
                    type="button"
                    onclick="copyDetailNewsLink(this)"
                    data-url="{{ route('public.news.show', $news->slug) }}"
                    title="Salin link berita"
                >
                    <svg viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <rect x="8" y="8" width="13" height="13" rx="2"></rect>
                        <path d="M16 8V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h3"></path>
                    </svg>
                    <span>Salin Link</span>
                </button>

                <a
                    href="https://wa.me/?text={{ urlencode($news->title . ' - Berita Desa Manyar: ' . route('public.news.show', $news->slug)) }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    title="Bagikan melalui WhatsApp"
                >
                    <svg viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 11.5a8.4 8.4 0 0 1-12.4 7.4L3 20l1.1-5.3A8.4 8.4 0 1 1 21 11.5Z"></path>
                        <path d="M8.5 9.5c.5 2 2 3.5 4 4l1-1 2 1c-.3 1-1 1.5-2 1.5-3 0-6.5-3.5-6.5-6.5 0-1 .5-1.7 1.5-2l1 2-1 1Z"></path>
                    </svg>
                    <span>WhatsApp</span>
                </a>

            </div>

            {{-- KEMBALI KE DAFTAR BERITA --}}
            <a href="{{ route('public.news.index') }}" class="back-link">
                <span>←</span>
                Kembali ke Daftar Berita
            </a>

        </article>

        <aside class="detail-sidebar">

            <div class="sidebar-heading">
                <div class="sidebar-icon">📰</div>
                <h3>Berita Lainnya</h3>
            </div>

            @forelse ($relatedNews as $item)
                <div class="related-item">
                    <a href="{{ route('public.news.show', $item->slug) }}">
                        {{ $item->title }}
                    </a>

                    <div class="related-date">
                        {{ $item->published_at?->translatedFormat('d F Y') }}
                    </div>
                </div>
            @empty
                <p class="sidebar-empty">
                    Belum ada berita lainnya.
                </p>
            @endforelse

        </aside>

    </div>
</section>

<script>
    function copyDetailNewsLink(button) {
        const url = button.dataset.url;
        const label = button.querySelector('span');
        const originalLabel = label.textContent;

        function showCopied() {
            label.textContent = 'Tersalin!';

            setTimeout(() => {
                label.textContent = originalLabel;
            }, 1800);
        }

        function fallbackCopyNews() {
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
                    alert('Gagal menyalin link berita.');
                }
            } catch (error) {
                alert('Gagal menyalin link berita.');
            }

            document.body.removeChild(textarea);
        }

        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(url)
                .then(showCopied)
                .catch(fallbackCopyNews);
        } else {
            fallbackCopyNews();
        }
    }
</script>
@endsection
