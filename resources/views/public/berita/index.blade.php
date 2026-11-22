
@extends('public.layouts.app')

@section('title', 'Berita Desa Manyar')

@push('styles')
<style>
    .news-page {
        position: relative;
        max-width: 100%;
        padding: 75px 22px 85px;
        background: #f5f8f5;
        overflow: hidden;
        isolation: isolate;
    }

    .news-page::before {
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

    .news-page::after {
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

    .news-container {
        max-width: 1180px;
        margin: auto;
    }

    /* HEADER */
    .news-heading {
        text-align: center;
        max-width: 720px;
        margin: 0 auto 38px;
    }

    .news-heading .eyebrow {
        display: inline-block;
        color: #1e462e;
        background: #eaf2ed;
        padding: 8px 17px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 15px;
    }

    .news-heading h1 {
        color: #12301e;
        font-family: 'Bricolage Grotesque', sans-serif;
        font-size: clamp(30px, 4vw, 43px);
        line-height: 1.2;
        margin: 0 0 14px;
        font-weight: 800;
    }

    .news-heading h1 span {
        color: #b49b45;
    }

    .news-heading p {
        color: #718075;
        margin: 0;
        font-size: 14px;
        line-height: 1.8;
    }

    /* SEARCH DAN FILTER */
    .news-filter {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 23px;
        padding: 12px;
        background: #fff;
        border: 1px solid #e5ebe5;
        border-radius: 13px;
        box-shadow: 0 6px 22px rgba(18, 48, 30, .045);
    }

    .news-search {
        flex: 1;
        min-width: 0;
    }

    .news-search input {
        width: 100%;
        height: 46px;
        padding: 0 15px;
        border: 1px solid #e2eae3;
        border-radius: 8px;
        background: #fff;
        color: #33483a;
        font-size: 13px;
        outline: none;
        box-sizing: border-box;
        transition: .25s ease;
    }

    .news-search input::placeholder {
        color: #9aa99e;
    }

    .news-filter select {
        width: 210px;
        height: 46px;
        padding: 0 12px;
        border: 1px solid #e2eae3;
        border-radius: 8px;
        background: #fff;
        color: #46564b;
        font-size: 13px;
        outline: none;
        cursor: pointer;
        transition: .25s ease;
    }

    .news-search input:focus,
    .news-filter select:focus {
        border-color: #78947f;
        box-shadow: 0 0 0 3px rgba(30, 70, 46, .07);
    }

    .news-filter button {
        height: 46px;
        padding: 0 23px;
        border: none;
        border-radius: 8px;
        background: #1e462e;
        color: #fff;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: .25s ease;
        white-space: nowrap;
    }

    .news-filter button:hover {
        background: #12301e;
        transform: translateY(-1px);
    }

    .news-reset {
        color: #87958a;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
        white-space: nowrap;
        padding: 0 8px;
        transition: .25s ease;
    }

    .news-reset:hover {
        color: #a58c3d;
    }

    /* RESULT */
    .news-result {
        color: #87958a;
        font-size: 13px;
        margin-bottom: 20px;
    }

    .news-result strong {
        color: #1e462e;
    }

    /* GRID BERITA */
    .news-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 25px;
    }

    .news-card {
        overflow: hidden;
        background: #fff;
        border: 1px solid #e5ebe5;
        border-radius: 15px;
        transition: .3s ease;
        box-shadow: 0 5px 18px rgba(18, 48, 30, .035);
        display: flex;
        flex-direction: column;
    }

    .news-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 35px rgba(18, 48, 30, .10);
        border-color: #cbd9ce;
    }

    .news-card-image-link {
        display: block;
        overflow: hidden;
        background: #eaf2ed;
    }

    .news-image {
        width: 100%;
        height: 220px;
        object-fit: cover;
        display: block;
        background: #eaf2ed;
        transition: transform .5s ease;
    }

    .news-card:hover .news-image {
        transform: scale(1.06);
    }

    .news-image-placeholder {
        height: 220px;
        display: grid;
        place-items: center;
        background: linear-gradient(135deg, #eaf2ed, #f5f8f5);
        color: #78947f;
        font-size: 42px;
    }

    .news-card-body {
        padding: 22px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    /* META */
    .news-meta {
        display: flex;
        align-items: center;
        gap: 9px;
        flex-wrap: wrap;
        color: #87958a;
        font-size: 11px;
        margin-bottom: 13px;
    }

    .news-category {
        color: #1e462e;
        background: #eaf2ed;
        padding: 5px 10px;
        border-radius: 30px;
        font-size: 10px;
        font-weight: 800;
    }

    /* TITLE */
    .news-card h2 {
        font-family: 'Bricolage Grotesque', sans-serif;
        font-size: 18px;
        line-height: 1.5;
        margin: 0 0 11px;
        color: #12301e;
        font-weight: 750;
        overflow-wrap: anywhere;
    }

    .news-card h2 a {
        color: inherit;
        text-decoration: none;
        transition: .25s ease;
    }

    .news-card h2 a:hover {
        color: #a58c3d;
    }

    .news-excerpt {
        color: #718075;
        font-size: 13px;
        line-height: 1.8;
        margin: 0 0 19px;
    }

    .news-read-more {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: #1e462e;
        font-weight: 800;
        font-size: 12px;
        text-decoration: none;
        margin-top: auto;
        transition: .25s ease;
    }

    .news-read-more span {
        transition: transform .25s ease;
    }

    .news-read-more:hover {
        color: #a58c3d;
    }

    .news-read-more:hover span {
        transform: translateX(5px);
    }

    /* BAGIKAN BERITA */
    .news-share {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 16px;
        margin-top: 17px;
        padding-top: 13px;
        border-top: 1px solid #edf1ed;
    }

    .news-share button,
    .news-share a {
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
        transition: .2s ease;
    }

    .news-share button:hover,
    .news-share a:hover {
        color: #1e462e;
    }

    .news-share svg {
        width: 14px;
        height: 14px;
        flex-shrink: 0;
    }

    /* BERITA KOSONG */
    .news-empty {
        text-align: center;
        padding: 65px 20px;
        color: #718075;
        background: #fff;
        border: 1px dashed #cbd9ce;
        border-radius: 15px;
    }

    .news-empty-icon {
        width: 65px;
        height: 65px;
        display: grid;
        place-items: center;
        margin: 0 auto 18px;
        border-radius: 50%;
        background: #eaf2ed;
        color: #1e462e;
        font-size: 28px;
    }

    .news-empty h3 {
        color: #12301e;
        font-family: 'Bricolage Grotesque', sans-serif;
        font-size: 20px;
        margin: 0 0 10px;
    }

    .news-empty p {
        font-size: 13px;
        margin: 0;
        line-height: 1.8;
    }

    .news-empty a {
        display: inline-flex;
        margin-top: 20px;
    }

    /* PAGINATION */
    .news-pagination {
        margin-top: 38px;
    }

    .news-pagination nav {
        display: flex;
        justify-content: center;
    }

    .news-pagination a {
        color: #1e462e !important;
    }

    .news-pagination span[aria-current="page"] span {
        background: #1e462e !important;
        border-color: #1e462e !important;
        color: #fff !important;
    }

    /* RESPONSIVE */
    @media (max-width: 900px) {
        .news-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 600px) {
        .news-page {
            padding: 48px 16px 60px;
        }

        .news-heading {
            margin-bottom: 28px;
        }

        .news-heading h1 {
            font-size: 29px;
        }

        .news-heading p {
            font-size: 13px;
        }

        .news-filter {
            flex-direction: column;
            align-items: stretch;
            padding: 14px;
            gap: 10px;
        }

        .news-search input {
            font-size: 12px;
        }

        .news-filter select {
            width: 100%;
        }

        .news-filter button {
            width: 100%;
        }

        .news-reset {
            text-align: center;
            padding: 7px;
        }

        .news-grid {
            grid-template-columns: 1fr;
            gap: 19px;
        }

        .news-image,
        .news-image-placeholder {
            height: 210px;
        }

        .news-card-body {
            padding: 19px;
        }
    }
</style>
@endpush

@section('content')
<section class="news-page">

    <div class="news-container">

        {{-- JUDUL HALAMAN --}}
        <div class="news-heading">
            <div class="eyebrow">INFORMASI DESA</div>

            <h1>
                Berita <span>Desa Manyar</span>
            </h1>

            <p>
                Informasi dan kabar terbaru seputar kegiatan Desa Manyar.
                Dapatkan berita dan perkembangan terkini dari lingkungan desa.
            </p>
        </div>

        {{-- PENCARIAN DAN FILTER KATEGORI --}}
        <form
            action="{{ route('public.news.index') }}"
            method="GET"
            class="news-filter"
        >
            <div class="news-search">
                <input
                    type="text"
                    name="search"
                    value="{{ $search ?? '' }}"
                    placeholder="Cari berita berdasarkan judul atau isi..."
                >
            </div>

            <select name="category">
                <option value="">Semua Kategori</option>

                @foreach ($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ (string) ($categoryId ?? '') === (string) $category->id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit">
                Cari Berita
            </button>

            @if (!empty($search) || !empty($categoryId))
                <a
                    href="{{ route('public.news.index') }}"
                    class="news-reset"
                >
                    Reset
                </a>
            @endif
        </form>

        {{-- JUMLAH HASIL PENCARIAN --}}
        <div class="news-result">
            Menampilkan <strong>{{ $news->total() }}</strong> berita

            @if (!empty($search))
                untuk pencarian "{{ $search }}"
            @endif
        </div>

        {{-- DAFTAR BERITA --}}
        @if ($news->count() > 0)

            <div class="news-grid">

                @foreach ($news as $item)

                    <article class="news-card">

                        {{-- GAMBAR BERITA --}}
                        <a
                            href="{{ route('public.news.show', $item->slug) }}"
                            class="news-card-image-link"
                        >
                            @if ($item->featured_image)

                                <img
                                    class="news-image"
                                    src="{{ asset('storage/' . $item->featured_image) }}"
                                    alt="{{ $item->title }}"
                                    loading="lazy"
                                >

                            @else

                                <div class="news-image-placeholder">
                                    ▤
                                </div>

                            @endif
                        </a>

                        {{-- KONTEN BERITA --}}
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

                            {{-- BACA SELENGKAPNYA --}}
                            <a
                                href="{{ route('public.news.show', $item->slug) }}"
                                class="news-read-more"
                            >
                                Baca Selengkapnya <span>→</span>
                            </a>

                            {{-- BAGIKAN BERITA --}}
                            <div class="news-share">

                                <button
                                    type="button"
                                    onclick="copyNewsLink(this)"
                                    data-url="{{ route('public.news.show', $item->slug) }}"
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
                                    href="https://wa.me/?text={{ urlencode($item->title . ' - Berita Desa Manyar: ' . route('public.news.show', $item->slug)) }}"
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

                        </div>

                    </article>

                @endforeach

            </div>

            {{-- PAGINATION --}}
            <div class="news-pagination">
                {{ $news->links() }}
            </div>

        @else

            {{-- JIKA BERITA TIDAK DITEMUKAN --}}
            <div class="news-empty">

                <div class="news-empty-icon">
                    ▤
                </div>

                <h3>Berita Tidak Ditemukan</h3>

                <p>
                    Maaf, berita yang kamu cari belum tersedia.
                    Silakan gunakan kata kunci atau kategori lainnya.
                </p>

                <a
                    href="{{ route('public.news.index') }}"
                    class="news-read-more"
                >
                    Tampilkan Semua Berita <span>→</span>
                </a>

            </div>

        @endif

    </div>

</section>

<script>
    function copyNewsLink(button) {
        const url = button.dataset.url;
        const originalText = button.querySelector('span');
        const originalLabel = originalText.textContent;

        function showCopied() {
            originalText.textContent = 'Tersalin!';

            setTimeout(() => {
                originalText.textContent = originalLabel;
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
