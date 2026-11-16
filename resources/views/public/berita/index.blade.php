
@extends('public.layouts.app')

@section('title', 'Berita Desa Manyar')

@push('styles')
<style>
    .news-page {
        max-width: 1180px;
        margin: auto;
        padding: 55px 22px 75px;
    }

    .news-heading {
        text-align: center;
        margin-bottom: 38px;
    }

    .news-heading .eyebrow {
        color: #2563eb;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .news-heading h1 {
        color: #172554;
        font-size: 34px;
        margin: 10px 0;
        font-weight: 800;
    }

    .news-heading p {
        color: #64748b;
        margin: 0;
    }

    .news-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 25px;
    }

    .news-card {
        overflow: hidden;
        background: #fff;
        border: 1px solid #e8edf5;
        border-radius: 15px;
        transition: .2s ease;
    }

    .news-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 30px rgba(15, 23, 42, .09);
    }

    .news-image {
        width: 100%;
        height: 215px;
        object-fit: cover;
        display: block;
        background: #eff6ff;
    }

    .news-image-placeholder {
        height: 215px;
        display: grid;
        place-items: center;
        background: #eff6ff;
        color: #2563eb;
        font-size: 42px;
    }

    .news-card-body {
        padding: 21px;
    }

    .news-meta {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        color: #64748b;
        font-size: 12px;
        margin-bottom: 12px;
    }

    .news-category {
        color: #2563eb;
        font-weight: 700;
    }

    .news-card h2 {
        font-size: 18px;
        line-height: 1.5;
        margin: 0 0 10px;
        color: #172554;
    }

    .news-card h2 a {
        color: inherit;
        text-decoration: none;
    }

    .news-card h2 a:hover {
        color: #2563eb;
    }

    .news-excerpt {
        color: #64748b;
        font-size: 14px;
        line-height: 1.7;
        margin-bottom: 18px;
    }

    .news-read-more {
        color: #2563eb;
        font-weight: 700;
        font-size: 13px;
        text-decoration: none;
    }

    .news-empty {
        text-align: center;
        padding: 55px 20px;
        color: #64748b;
        background: #f8fafc;
        border-radius: 15px;
    }

    .news-pagination {
        margin-top: 35px;
    }

    .news-pagination nav {
        display: flex;
        justify-content: center;
    }

    @media (max-width: 900px) {
        .news-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 600px) {
        .news-page {
            padding: 38px 16px 55px;
        }

        .news-heading h1 {
            font-size: 27px;
        }

        .news-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<section class="news-page">

    <div class="news-heading">
        <div class="eyebrow">Informasi Desa</div>
        <h1>Berita Desa Manyar</h1>
        <p>Informasi dan kabar terbaru seputar kegiatan Desa Manyar.</p>
    </div>

    @if ($news->count())
        <div class="news-grid">
            @foreach ($news as $item)
                <article class="news-card">

                    <a href="{{ route('public.news.show', $item->slug) }}">
                        @if ($item->featured_image)
                            <img
                                class="news-image"
                                src="{{ asset('storage/' . $item->featured_image) }}"
                                alt="{{ $item->title }}"
                                loading="lazy"
                            >
                        @else
                            <div class="news-image-placeholder">▤</div>
                        @endif
                    </a>

                    <div class="news-card-body">
                        <div class="news-meta">
                            @if ($item->category)
                                <span class="news-category">
                                    {{ $item->category->name }}
                                </span>
                            @endif

                            @if ($item->published_at)
                                <span>
                                    {{ $item->published_at->translatedFormat('d F Y') }}
                                </span>
                            @endif
                        </div>

                        <h2>
                            <a href="{{ route('public.news.show', $item->slug) }}">
                                {{ $item->title }}
                            </a>
                        </h2>

                        <p class="news-excerpt">
                            {{ $item->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($item->content), 130) }}
                        </p>

                        <a
                            href="{{ route('public.news.show', $item->slug) }}"
                            class="news-read-more"
                        >
                            Baca Selengkapnya →
                        </a>
                    </div>

                </article>
            @endforeach
        </div>

        <div class="news-pagination">
            {{ $news->links() }}
        </div>
    @else
        <div class="news-empty">
            <h3>Belum Ada Berita</h3>
            <p>Berita Desa Manyar akan ditampilkan di halaman ini.</p>
        </div>
    @endif

</section>
@endsection
