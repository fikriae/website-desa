
@extends('public.layouts.app')

@section('title', 'Agenda Kegiatan Desa Manyar')

@push('styles')
<style>
    .agenda-page {
        position: relative;
        max-width: 100%;
        padding: 75px 22px 85px;
        background: #f5f8f5;
        overflow: hidden;
        isolation: isolate;
    }

    .agenda-page::before {
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

    .agenda-page::after {
        content: "";
        position: absolute;
        bottom: -180px;
        left: -120px;
        width: 400px;
        height: 400px;
        background: rgba(217, 198, 107, .09);
        border-radius: 50%;
        z-index: -1;
    }

    .agenda-container {
        max-width: 1180px;
        margin: auto;
    }

    .agenda-heading {
        text-align: center;
        max-width: 720px;
        margin: 0 auto 38px;
    }

    .agenda-heading .eyebrow {
        display: inline-block;
        color: #1e462e;
        background: #eaf2ed;
        padding: 8px 17px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1.5px;
        margin-bottom: 16px;
    }

    .agenda-heading h1 {
        color: #12301e;
        font-family: 'Bricolage Grotesque', sans-serif;
        font-size: clamp(30px, 4vw, 43px);
        line-height: 1.2;
        margin: 0 0 15px;
        font-weight: 800;
    }

    .agenda-heading h1 span {
        color: #b49b45;
    }

    .agenda-heading p {
        max-width: 620px;
        margin: auto;
        color: #647568;
        line-height: 1.8;
        font-size: 14px;
    }

    /* SEARCH */
    .agenda-search {
        max-width: 680px;
        margin: 0 auto 42px;
        display: flex;
        gap: 10px;
        padding: 8px;
        background: #fff;
        border: 1px solid #e2eae3;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(18, 48, 30, .05);
        transition: .25s ease;
    }

    .agenda-search:focus-within {
        border-color: #78947f;
        box-shadow: 0 8px 25px rgba(30, 70, 46, .1);
    }

    .agenda-search input {
        flex: 1;
        min-width: 0;
        border: none;
        outline: none;
        padding: 11px 14px;
        font-size: 13px;
        color: #33483a;
        background: transparent;
    }

    .agenda-search input::placeholder {
        color: #9aa99e;
    }

    .agenda-search button {
        border: none;
        background: #1e462e;
        color: white;
        padding: 11px 23px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: .25s ease;
    }

    .agenda-search button:hover {
        background: #12301e;
        transform: translateY(-1px);
    }

    /* COUNT */
    .agenda-count {
        color: #718075;
        font-size: 13px;
        margin-bottom: 19px;
    }

    .agenda-count strong {
        color: #1e462e;
    }

    /* GRID */
    .agenda-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 25px;
    }

    /* CARD */
    .agenda-card {
        background: #fff;
        border: 1px solid #e5ebe5;
        border-radius: 15px;
        overflow: hidden;
        transition: .3s ease;
        display: flex;
        flex-direction: column;
        box-shadow: 0 5px 18px rgba(18, 48, 30, .035);
    }

    .agenda-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 35px rgba(18, 48, 30, .10);
        border-color: #cbd9ce;
    }

    .agenda-image-wrap {
        height: 220px;
        overflow: hidden;
        background: #eaf2ed;
        position: relative;
    }

    .agenda-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform .5s ease;
    }

    .agenda-card:hover .agenda-image {
        transform: scale(1.06);
    }

    .agenda-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #78947f;
        font-size: 43px;
        background: linear-gradient(135deg, #eaf2ed, #f5f8f5);
    }

    /* BODY */
    .agenda-body {
        padding: 22px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .agenda-date {
        color: #a58c3d;
        font-size: 11px;
        font-weight: 800;
        margin-bottom: 12px;
        letter-spacing: .35px;
        line-height: 1.7;
    }

    .agenda-body h3 {
        color: #12301e;
        font-family: 'Bricolage Grotesque', sans-serif;
        font-size: 18px;
        line-height: 1.5;
        margin: 0 0 12px;
        font-weight: 750;
    }

    .agenda-description {
        color: #718075;
        font-size: 13px;
        line-height: 1.8;
        margin-bottom: 17px;
    }

    .agenda-location {
        color: #718075;
        font-size: 12px;
        margin-bottom: 20px;
        display: flex;
        align-items: flex-start;
        gap: 7px;
        line-height: 1.6;
    }

    .agenda-location span {
        color: #1e462e;
        flex-shrink: 0;
    }

    .agenda-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #1e462e;
        font-size: 12px;
        font-weight: 800;
        text-decoration: none;
        margin-top: auto;
        transition: .25s ease;
    }

    .agenda-link span {
        transition: transform .25s ease;
    }

    .agenda-link:hover {
        color: #a58c3d;
    }

    .agenda-link:hover span {
        transform: translateX(5px);
    }

    /* SHARE AGENDA */
    .agenda-share {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 16px;
        margin-top: 17px;
        padding-top: 13px;
        border-top: 1px solid #edf1ed;
    }

    .agenda-share button,
    .agenda-share a {
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

    .agenda-share button:hover,
    .agenda-share a:hover {
        color: #1e462e;
    }

    .agenda-share .share-whatsapp:hover {
        color: #168b48;
    }

    .agenda-share svg {
        width: 15px;
        height: 15px;
        flex-shrink: 0;
    }

    /* EMPTY STATE */
    .agenda-empty {
        text-align: center;
        padding: 65px 20px;
        background: #fff;
        border: 1px dashed #cbd9ce;
        border-radius: 15px;
    }

    .agenda-empty-icon {
        width: 65px;
        height: 65px;
        margin: 0 auto 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #eaf2ed;
        color: #1e462e;
        font-size: 28px;
    }

    .agenda-empty h3 {
        color: #12301e;
        font-family: 'Bricolage Grotesque', sans-serif;
        margin: 0 0 9px;
        font-size: 20px;
    }

    .agenda-empty p {
        color: #718075;
        font-size: 13px;
        line-height: 1.7;
        margin: 0;
    }

    /* PAGINATION */
    .agenda-pagination {
        margin-top: 38px;
    }

    .agenda-pagination nav {
        display: flex;
        justify-content: center;
    }

    .agenda-pagination a,
    .agenda-pagination span[aria-current="page"] span {
        border-radius: 8px !important;
    }

    .agenda-pagination a {
        color: #1e462e !important;
    }

    .agenda-pagination span[aria-current="page"] span {
        background: #1e462e !important;
        border-color: #1e462e !important;
        color: #fff !important;
    }

    /* RESPONSIVE */
    @media (max-width: 900px) {
        .agenda-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 600px) {
        .agenda-page {
            padding: 48px 16px 60px;
        }

        .agenda-heading {
            margin-bottom: 28px;
        }

        .agenda-heading h1 {
            font-size: 29px;
        }

        .agenda-heading p {
            font-size: 13px;
        }

        .agenda-search {
            margin-bottom: 30px;
        }

        .agenda-search input {
            font-size: 12px;
            padding: 10px 8px;
        }

        .agenda-search button {
            padding: 10px 15px;
            font-size: 12px;
        }

        .agenda-grid {
            grid-template-columns: 1fr;
            gap: 19px;
        }

        .agenda-image-wrap {
            height: 210px;
        }

        .agenda-body {
            padding: 19px;
        }

        .agenda-share {
            gap: 14px;
        }
    }
</style>
@endpush

@section('content')

<div class="agenda-page">

    <div class="agenda-container">

        <div class="agenda-heading">
            <span class="eyebrow">INFORMASI DESA</span>

            <h1>
                Agenda Kegiatan <span>Desa Manyar</span>
            </h1>

            <p>
                Temukan informasi jadwal kegiatan, acara, dan berbagai aktivitas
                yang diselenggarakan oleh Pemerintah Desa Manyar.
            </p>
        </div>

        <form
            action="{{ route('public.agendas.index') }}"
            method="GET"
            class="agenda-search"
        >
            <input
                type="text"
                name="search"
                placeholder="Cari nama kegiatan, lokasi, atau informasi..."
                value="{{ $search ?? '' }}"
            >

            <button type="submit">Cari Agenda</button>
        </form>

        <div class="agenda-count">
            Menampilkan <strong>{{ $agendas->total() }}</strong> agenda kegiatan
        </div>

        @if($agendas->count())

            <div class="agenda-grid">

                @foreach($agendas as $agenda)

                    <article class="agenda-card">

                        <div class="agenda-image-wrap">
                            @if($agenda->featured_image)
                                <img
                                    src="{{ asset('storage/' . $agenda->featured_image) }}"
                                    alt="{{ $agenda->title }}"
                                    class="agenda-image"
                                >
                            @else
                                <div class="agenda-placeholder">
                                    <span>▧</span>
                                </div>
                            @endif
                        </div>

                        <div class="agenda-body">

                            <div class="agenda-date">
                                {{ $agenda->start_date->translatedFormat('l, d F Y') }}
                                · {{ $agenda->start_date->format('H:i') }} WIB
                            </div>

                            <h3>{{ $agenda->title }}</h3>

                            <div class="agenda-description">
                                {{ \Illuminate\Support\Str::limit(strip_tags($agenda->description ?? ''), 115) }}
                            </div>

                            <div class="agenda-location">
                                <span>📍</span>
                                {{ $agenda->location ?: 'Lokasi belum ditentukan' }}
                            </div>

                            <a
                                href="{{ route('public.agendas.show', $agenda->slug) }}"
                                class="agenda-link"
                            >
                                Lihat Detail <span>→</span>
                            </a>

                            {{-- SHARE AGENDA --}}
                            <div class="agenda-share">

                                {{-- SALIN LINK --}}
                                <button
                                    type="button"
                                    onclick="copyAgendaLink(this)"
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

                        </div>

                    </article>

                @endforeach

            </div>

            <div class="agenda-pagination">
                {{ $agendas->links() }}
            </div>

        @else

            <div class="agenda-empty">

                <div class="agenda-empty-icon">▧</div>

                <h3>Belum Ada Agenda Kegiatan</h3>

                <p>
                    @if(!empty($search))
                        Tidak ditemukan agenda yang sesuai dengan pencarian "{{ $search }}".
                    @else
                        Saat ini belum ada agenda kegiatan yang dipublikasikan.
                    @endif
                </p>

            </div>

        @endif

    </div>

</div>

{{-- JAVASCRIPT SALIN LINK --}}
<script>
    function copyAgendaLink(button) {
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
                .catch(() => fallbackCopy(url, showCopied));
        } else {
            fallbackCopy(url, showCopied);
        }
    }

    function fallbackCopy(text, callback) {
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
