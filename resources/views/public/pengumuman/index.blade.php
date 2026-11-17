
@extends('public.layouts.app')

@section('title', 'Pengumuman Desa Manyar')

@push('styles')
<style>
    /* HALAMAN PENGUMUMAN */

    .announcement-page {
        position: relative;
        width: 100%;
        min-height: 75vh;
        padding: 75px 22px 90px;
        overflow: hidden;
        background: #f5f8f5;
    }

    .announcement-page::before {
        content: "";
        position: absolute;
        width: 420px;
        height: 420px;
        top: -220px;
        right: -120px;
        border-radius: 50%;
        background: rgba(30,70,46,.045);
        pointer-events: none;
    }

    .announcement-page::after {
        content: "";
        position: absolute;
        width: 350px;
        height: 350px;
        bottom: -220px;
        left: -100px;
        border-radius: 50%;
        background: rgba(30,70,46,.04);
        pointer-events: none;
    }

    .announcement-container {
        position: relative;
        z-index: 1;
        width: min(1180px, 100%);
        margin: auto;
    }

    /* HEADING */

    .announcement-heading {
        margin-bottom: 35px;
        text-align: center;
    }

    .announcement-label {
        display: inline-block;
        margin-bottom: 14px;
        color: #78917e;
        font-size: 10px;
        font-weight: 800;
        letter-spacing: 2.5px;
    }

    .announcement-heading h1 {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 12px;
        margin: 0 0 13px;
        color: #12301e;
        font-family: 'Bricolage Grotesque', sans-serif;
        font-size: clamp(30px, 4vw, 42px);
        font-weight: 800;
        line-height: 1.2;
    }

    .announcement-heading h1 span {
        width: 17px;
        height: 17px;
        display: inline-block;
        flex-shrink: 0;
        border-radius: 50%;
        background: #d9c66b;
    }

    .announcement-heading p {
        max-width: 600px;
        margin: auto;
        color: #647268;
        font-size: 14px;
        line-height: 1.8;
    }

    /* SEARCH */

    .search-form {
        display: flex;
        gap: 10px;
        max-width: 650px;
        margin: 0 auto 40px;
        padding: 7px;
        border: 1px solid #e2eae3;
        border-radius: 12px;
        background: #fff;
        box-shadow: 0 8px 25px rgba(18,48,30,.045);
    }

    .search-form input {
        flex: 1;
        min-width: 0;
        padding: 12px 15px;
        border: 0;
        border-radius: 8px;
        outline: none;
        color: #263b2c;
        background: transparent;
        font-size: 13px;
    }

    .search-form input::placeholder {
        color: #9aa79d;
    }

    .search-form input:focus {
        box-shadow: none;
    }

    .search-form button {
        min-width: 105px;
        padding: 0 22px;
        border: 0;
        border-radius: 8px;
        color: #fff;
        background: #1e462e;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: .3s ease;
    }

    .search-form button:hover {
        background: #12301e;
        transform: translateY(-2px);
    }

    /* GRID */

    .announcement-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 25px;
    }

    .announcement-card {
        min-width: 0;
        overflow: hidden;
        border: 1px solid #e5ebe5;
        border-radius: 15px;
        background: #fff;
        box-shadow: 0 8px 25px rgba(18,48,30,.045);
        transition: transform .35s ease, box-shadow .35s ease;
    }

    .announcement-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 18px 38px rgba(18,48,30,.12);
    }

    .announcement-image {
        display: block;
        width: 100%;
        height: 220px;
        object-fit: cover;
        background: #eaf2ed;
        transition: transform .5s ease;
    }

    .announcement-card:hover .announcement-image {
        transform: scale(1.04);
    }

    .announcement-image-wrap {
        height: 220px;
        overflow: hidden;
        background: #eaf2ed;
    }

    .announcement-placeholder {
        width: 100%;
        height: 220px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #1e462e;
        background: linear-gradient(145deg, #eaf2ed, #dce9df);
        font-size: 48px;
    }

    /* CONTENT */

    .announcement-content {
        padding: 23px;
    }

    .announcement-date {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 13px;
        color: #8a7825;
        font-size: 11px;
        font-weight: 800;
    }

    .announcement-date::before {
        content: "";
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #d9c66b;
    }

    .announcement-content h2 {
        margin: 0 0 12px;
        color: #12301e;
        font-family: 'Bricolage Grotesque', sans-serif;
        font-size: 18px;
        font-weight: 800;
        line-height: 1.5;
        overflow-wrap: anywhere;
    }

    .announcement-content p {
        margin: 0 0 20px;
        color: #647268;
        font-size: 13px;
        line-height: 1.8;
    }

    .read-more {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: #1e462e;
        font-size: 12px;
        font-weight: 800;
        text-decoration: none;
        transition: gap .3s ease, color .3s ease;
    }

    .read-more:hover {
        gap: 15px;
        color: #8a7825;
    }

    /* KOSONG */

    .empty-state {
        grid-column: 1 / -1;
        padding: 65px 20px;
        border: 1px solid #e5ebe5;
        border-radius: 15px;
        background: #fff;
        text-align: center;
        box-shadow: 0 8px 25px rgba(18,48,30,.04);
    }

    .empty-icon {
        width: 65px;
        height: 65px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 18px;
        border-radius: 18px;
        color: #1e462e;
        background: #eaf2ed;
        font-size: 30px;
    }

    .empty-state h3 {
        margin-bottom: 9px;
        color: #12301e;
        font-size: 20px;
        font-weight: 800;
    }

    .empty-state p {
        margin: 0;
        color: #647268;
        font-size: 13px;
        line-height: 1.7;
    }

    /* PAGINATION */

    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 40px;
    }

    .pagination nav {
        display: flex;
        justify-content: center;
    }

    .pagination nav > div:first-child {
        display: none;
    }

    .pagination nav > div:last-child {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 6px;
    }

    .pagination a,
    .pagination span[aria-current="page"] > span,
    .pagination span[aria-disabled="true"] > span {
        min-width: 38px;
        min-height: 38px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0 12px;
        border: 1px solid #e0e8e1;
        border-radius: 8px;
        color: #1e462e;
        background: #fff;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
        transition: .25s ease;
    }

    .pagination a:hover {
        color: #fff;
        border-color: #1e462e;
        background: #1e462e;
    }

    .pagination span[aria-current="page"] > span {
        color: #fff;
        border-color: #1e462e;
        background: #1e462e;
    }

    /* TABLET */

    @media (max-width: 950px) {
        .announcement-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }
    }

    /* HP */

    @media (max-width: 600px) {
        .announcement-page {
            padding: 50px 16px 65px;
        }

        .announcement-heading {
            margin-bottom: 27px;
        }

        .announcement-heading h1 {
            font-size: 29px;
        }

        .announcement-heading p {
            font-size: 13px;
        }

        .search-form {
            margin-bottom: 30px;
        }

        .search-form input {
            padding: 11px 10px;
            font-size: 12px;
        }

        .search-form button {
            min-width: 75px;
            padding: 0 13px;
            font-size: 12px;
        }

        .announcement-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .announcement-image,
        .announcement-image-wrap,
        .announcement-placeholder {
            height: 210px;
        }

        .announcement-content {
            padding: 20px;
        }

        .announcement-content h2 {
            font-size: 17px;
        }

        .empty-state {
            padding: 45px 18px;
        }
    }
</style>
@endpush

@section('content')

<section class="announcement-page">

    <div class="announcement-container">

        {{-- JUDUL HALAMAN --}}
        <div class="announcement-heading">
            <span class="announcement-label">INFORMASI DESA MANYAR</span>

            <h1>
                Pengumuman Desa Manyar
                <span></span>
            </h1>

            <p>
                Informasi dan pemberitahuan resmi dari Pemerintah Desa
                Manyar untuk seluruh masyarakat.
            </p>
        </div>

        {{-- PENCARIAN --}}
        <form action="{{ route('public.announcements.index') }}"
              method="GET"
              class="search-form">

            <input
                type="text"
                name="search"
                value="{{ $search ?? '' }}"
                placeholder="Cari pengumuman..."
            >

            <button type="submit">Cari Pengumuman</button>
        </form>

        {{-- DAFTAR PENGUMUMAN --}}
        <div class="announcement-grid">

            @forelse ($announcements as $announcement)

                <article class="announcement-card">

                    <div class="announcement-image-wrap">

                        @if ($announcement->featured_image)
                            <img
                                src="{{ asset('storage/' . $announcement->featured_image) }}"
                                alt="{{ $announcement->title }}"
                                class="announcement-image"
                                loading="lazy"
                            >
                        @else
                            <div class="announcement-placeholder">
                                ▣
                            </div>
                        @endif

                    </div>

                    <div class="announcement-content">

                        <div class="announcement-date">
                            {{ $announcement->published_at->translatedFormat('d F Y') }}
                        </div>

                        <h2>
                            {{ $announcement->title }}
                        </h2>

                        <p>
                            {{ $announcement->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($announcement->content), 120) }}
                        </p>

                        <a
                            href="{{ route('public.announcements.show', $announcement->slug) }}"
                            class="read-more"
                        >
                            Baca Selengkapnya <span>↗</span>
                        </a>

                    </div>

                </article>

            @empty

                <div class="empty-state">

                    <div class="empty-icon">▣</div>

                    <h3>Belum Ada Pengumuman</h3>

                    <p>
                        @if (!empty($search))
                            Tidak ditemukan pengumuman dengan kata kunci tersebut.
                        @else
                            Saat ini belum ada pengumuman yang dipublikasikan.
                        @endif
                    </p>

                </div>

            @endforelse

        </div>

        {{-- PAGINATION --}}
        <div class="pagination">
            {{ $announcements->links() }}
        </div>

    </div>

</section>

@endsection
