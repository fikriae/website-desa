
@extends('public.layouts.app')

@section('title', $news->title . ' - Desa Manyar')

@push('styles')
<style>
    .detail-page {
        max-width: 1100px;
        margin: auto;
        padding: 45px 22px 75px;
    }

    .breadcrumb {
        font-size: 13px;
        color: #64748b;
        margin-bottom: 28px;
    }

    .breadcrumb a {
        color: #2563eb;
        text-decoration: none;
    }

    .detail-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 280px;
        gap: 38px;
        align-items: start;
    }

    .detail-article {
        min-width: 0;
        background: #fff;
    }

    .detail-category {
        display: inline-block;
        background: #eff6ff;
        color: #2563eb;
        padding: 7px 12px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .detail-title {
        font-size: 34px;
        line-height: 1.35;
        color: #172554;
        font-weight: 800;
        margin: 0 0 18px;
    }

    .detail-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 18px;
        color: #64748b;
        font-size: 13px;
        margin-bottom: 25px;
    }

    .detail-featured-image {
        width: 100%;
        max-height: 480px;
        object-fit: cover;
        border-radius: 15px;
        margin-bottom: 28px;
    }

    .detail-content {
        color: #334155;
        font-size: 16px;
        line-height: 1.9;
        overflow-wrap: anywhere;
    }

    .detail-content h1,
    .detail-content h2,
    .detail-content h3 {
        color: #172554;
        line-height: 1.4;
        margin-top: 25px;
    }

    .detail-content p {
        margin-bottom: 17px;
    }

    .detail-content img {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
        margin: 15px 0;
    }

    .detail-content blockquote {
        border-left: 4px solid #2563eb;
        padding: 12px 18px;
        background: #f8fafc;
        margin: 20px 0;
    }

    .detail-content ul,
    .detail-content ol {
        padding-left: 25px;
    }

    .detail-sidebar {
        background: #f8fafc;
        border: 1px solid #e8edf5;
        border-radius: 15px;
        padding: 22px;
    }

    .detail-sidebar h3 {
        color: #172554;
        font-size: 17px;
        margin: 0 0 18px;
    }

    .related-item {
        padding: 14px 0;
        border-bottom: 1px solid #e2e8f0;
    }

    .related-item:last-child {
        border-bottom: none;
    }

    .related-item a {
        color: #334155;
        text-decoration: none;
        font-size: 14px;
        line-height: 1.5;
        font-weight: 600;
    }

    .related-item a:hover {
        color: #2563eb;
    }

    .related-date {
        color: #94a3b8;
        font-size: 11px;
        margin-top: 6px;
    }

    .back-link {
        display: inline-block;
        margin-top: 35px;
        color: #2563eb;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
    }

    @media (max-width: 850px) {
        .detail-layout {
            grid-template-columns: 1fr;
        }

        .detail-sidebar {
            margin-top: 5px;
        }
    }

    @media (max-width: 600px) {
        .detail-page {
            padding: 30px 16px 55px;
        }

        .detail-title {
            font-size: 26px;
        }

        .detail-content {
            font-size: 15px;
        }
    }
</style>
@endpush

@section('content')
<section class="detail-page">

    <div class="breadcrumb">
        <a href="{{ route('home') }}">Beranda</a>
        /
        <a href="{{ route('public.news.index') }}">Berita</a>
        /
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

            <a href="{{ route('public.news.index') }}" class="back-link">
                ← Kembali ke Daftar Berita
            </a>

        </article>

        <aside class="detail-sidebar">
            <h3>Berita Lainnya</h3>

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
                <p style="color:#64748b;font-size:13px;">
                    Belum ada berita lainnya.
                </p>
            @endforelse
        </aside>

    </div>
</section>
@endsection
