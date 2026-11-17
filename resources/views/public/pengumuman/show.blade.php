
@extends('public.layouts.app')

@section('title', $announcement->title . ' - Desa Manyar')

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

    .detail-container {
        max-width: 1180px;
        margin: auto;
    }

    /* BREADCRUMB */
    .breadcrumb {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 10px;
        font-size: 12px;
        color: #87958a;
        margin-bottom: 27px;
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

    .breadcrumb span {
        color: #b49b45;
    }

    /* LAYOUT */
    .detail-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 310px;
        gap: 28px;
        align-items: start;
    }

    /* ARTICLE */
    .detail-article {
        min-width: 0;
        background: #fff;
        border: 1px solid #e5ebe5;
        border-radius: 16px;
        padding: 34px;
        box-shadow: 0 7px 25px rgba(18, 48, 30, .045);
    }

    .detail-date {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #a58c3d;
        background: #faf7e9;
        padding: 8px 13px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 800;
        margin-bottom: 18px;
        letter-spacing: .3px;
    }

    .detail-title {
        color: #12301e;
        font-family: 'Bricolage Grotesque', sans-serif;
        font-size: clamp(25px, 3vw, 35px);
        line-height: 1.35;
        margin: 0 0 25px;
        font-weight: 800;
        overflow-wrap: anywhere;
    }

    .detail-image {
        width: 100%;
        max-height: 460px;
        object-fit: cover;
        display: block;
        border-radius: 13px;
        margin-bottom: 28px;
        background: #eaf2ed;
    }

    /* ARTICLE CONTENT */
    .detail-content {
        color: #46564b;
        font-size: 14px;
        line-height: 1.95;
        overflow-wrap: anywhere;
    }

    .detail-content p {
        margin: 0 0 17px;
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
        text-decoration: underline;
        text-underline-offset: 3px;
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

    .detail-content h1 {
        font-size: 27px;
    }

    .detail-content h2 {
        font-size: 23px;
    }

    .detail-content h3 {
        font-size: 19px;
    }

    .detail-content ul,
    .detail-content ol {
        padding-left: 25px;
        margin-bottom: 18px;
    }

    .detail-content li {
        margin-bottom: 7px;
    }

    .detail-content blockquote {
        margin: 22px 0;
        padding: 17px 20px;
        background: #f5f8f5;
        border-left: 4px solid #b49b45;
        border-radius: 0 10px 10px 0;
        color: #52675a;
    }

    .detail-content table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    .detail-content table th,
    .detail-content table td {
        border: 1px solid #e2eae3;
        padding: 10px;
        text-align: left;
    }

    .detail-content table th {
        background: #eaf2ed;
        color: #12301e;
    }

    /* BACK LINK */
    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        margin-top: 30px;
        padding: 12px 18px;
        color: #fff;
        background: #1e462e;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
        transition: .25s ease;
    }

    .back-link:hover {
        background: #12301e;
        color: #fff;
        transform: translateY(-2px);
    }

    /* SIDEBAR */
    .detail-sidebar {
        position: sticky;
        top: 25px;
        background: #fff;
        border: 1px solid #e5ebe5;
        border-radius: 15px;
        padding: 24px;
        box-shadow: 0 7px 25px rgba(18, 48, 30, .045);
    }

    .sidebar-heading {
        display: flex;
        align-items: center;
        gap: 10px;
        padding-bottom: 17px;
        border-bottom: 1px solid #e8eee8;
        margin-bottom: 5px;
    }

    .sidebar-heading .sidebar-icon {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eaf2ed;
        color: #1e462e;
        border-radius: 9px;
        font-size: 17px;
        flex-shrink: 0;
    }

    .detail-sidebar h3 {
        color: #12301e;
        font-family: 'Bricolage Grotesque', sans-serif;
        font-size: 17px;
        margin: 0;
        font-weight: 800;
    }

    .related-item {
        padding: 16px 0;
        border-bottom: 1px solid #edf1ed;
    }

    .related-item:last-child {
        border-bottom: 0;
    }

    .related-item a {
        display: block;
        color: #34483a;
        font-size: 13px;
        font-weight: 700;
        line-height: 1.6;
        text-decoration: none;
        transition: .25s ease;
    }

    .related-item a:hover {
        color: #a58c3d;
        padding-left: 4px;
    }

    .related-date {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #9aa79d;
        font-size: 11px;
        margin-top: 8px;
    }

    .related-empty {
        color: #87958a;
        font-size: 12px;
        line-height: 1.7;
        padding: 17px 0 5px;
    }

    /* RESPONSIVE */
    @media (max-width: 900px) {
        .detail-layout {
            grid-template-columns: minmax(0, 1fr) 260px;
            gap: 20px;
        }

        .detail-article {
            padding: 25px;
        }

        .detail-sidebar {
            padding: 19px;
        }
    }

    @media (max-width: 750px) {
        .detail-layout {
            grid-template-columns: 1fr;
        }

        .detail-sidebar {
            position: static;
        }
    }

    @media (max-width: 600px) {
        .detail-page {
            padding: 38px 16px 60px;
        }

        .breadcrumb {
            margin-bottom: 20px;
            font-size: 11px;
        }

        .detail-article {
            padding: 20px;
            border-radius: 13px;
        }

        .detail-title {
            font-size: 25px;
            margin-bottom: 20px;
        }

        .detail-image {
            max-height: 280px;
            border-radius: 10px;
            margin-bottom: 22px;
        }

        .detail-content {
            font-size: 13px;
            line-height: 1.85;
        }

        .detail-sidebar {
            padding: 20px;
        }

        .back-link {
            font-size: 11px;
            padding: 11px 14px;
        }
    }
</style>
@endpush

@section('content')

<section class="detail-page">

    <div class="detail-container">

        <div class="breadcrumb">
            <a href="{{ route('home') }}">Beranda</a>
            <span>›</span>
            <a href="{{ route('public.announcements.index') }}">Pengumuman</a>
            <span>›</span>
            <span>Detail</span>
        </div>

        <div class="detail-layout">

            <article class="detail-article">

                <div class="detail-date">
                    <span>●</span>
                    {{ $announcement->published_at->translatedFormat('d F Y') }}
                </div>

                <h1 class="detail-title">
                    {{ $announcement->title }}
                </h1>

                @if ($announcement->featured_image)
                    <img
                        src="{{ asset('storage/' . $announcement->featured_image) }}"
                        alt="{{ $announcement->title }}"
                        class="detail-image"
                    >
                @endif

                <div class="detail-content">
                    {!! $announcement->content !!}
                </div>

                <a
                    href="{{ route('public.announcements.index') }}"
                    class="back-link"
                >
                    <span>←</span>
                    Kembali ke Daftar Pengumuman
                </a>

            </article>

            {{-- PENGUMUMAN LAINNYA --}}
            <aside class="detail-sidebar">

                <div class="sidebar-heading">
                    <div class="sidebar-icon">▤</div>
                    <h3>Pengumuman Lainnya</h3>
                </div>

                @forelse ($relatedAnnouncements as $related)

                    <div class="related-item">

                        <a href="{{ route('public.announcements.show', $related->slug) }}">
                            {{ $related->title }}
                        </a>

                        <div class="related-date">
                            {{ $related->published_at->translatedFormat('d F Y') }}
                        </div>

                    </div>

                @empty

                    <div class="related-empty">
                        Belum ada pengumuman lainnya.
                    </div>

                @endforelse

            </aside>

        </div>

    </div>

</section>

@endsection
