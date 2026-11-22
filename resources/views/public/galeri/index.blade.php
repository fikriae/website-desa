
@extends('public.layouts.app')

@section('title', 'Galeri Desa Manyar')

@push('styles')
<style>
    .gallery-public {
        position: relative;
        max-width: 1200px;
        margin: auto;
        padding: 60px 22px 80px;
        overflow: hidden;
    }

    .gallery-public::before {
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

    .gallery-public::after {
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
    .gallery-heading {
        position: relative;
        z-index: 1;
        text-align: center;
        max-width: 720px;
        margin: 0 auto 38px;
        animation: galleryFadeUp .7s ease both;
    }

    .gallery-heading .eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        color: #a58c3d;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .gallery-heading .eyebrow::before,
    .gallery-heading .eyebrow::after {
        content: "";
        width: 25px;
        height: 1px;
        background: #b49b45;
    }

    .gallery-heading h1 {
        font-family: 'Bricolage Grotesque', sans-serif;
        color: #1e462e;
        font-size: clamp(29px, 4vw, 40px);
        font-weight: 800;
        margin: 13px 0 12px;
    }

    .gallery-heading p {
        color: #77847a;
        font-size: 15px;
        line-height: 1.8;
        margin: 0;
    }

    /* FILTER DAN PENCARIAN */
    .gallery-filter {
        position: relative;
        z-index: 1;
        display: grid;
        grid-template-columns: minmax(0, 1fr) 230px auto auto;
        align-items: center;
        gap: 12px;
        max-width: 950px;
        margin: 0 auto 38px;
        padding: 16px;
        background: #fff;
        border: 1px solid #e7eee8;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(30, 70, 46, .06);
    }

    .gallery-search {
        position: relative;
        min-width: 0;
    }

    .gallery-search svg {
        position: absolute;
        top: 50%;
        left: 15px;
        width: 17px;
        height: 17px;
        color: #91a096;
        transform: translateY(-50%);
        pointer-events: none;
    }

    .gallery-filter input,
    .gallery-filter select {
        width: 100%;
        height: 46px;
        box-sizing: border-box;
        padding: 0 14px;
        border: 1px solid #dce6dd;
        border-radius: 9px;
        background: #fff;
        font-family: inherit;
        font-size: 13px;
        color: #344a39;
        outline: none;
        transition: all .25s ease;
    }

    .gallery-filter input {
        padding-left: 42px;
    }

    .gallery-filter input::placeholder {
        color: #a0aaa2;
    }

    .gallery-filter select {
        cursor: pointer;
    }

    .gallery-filter input:focus,
    .gallery-filter select:focus {
        border-color: #78947f;
        box-shadow: 0 0 0 3px rgba(30, 70, 46, .08);
    }

    .gallery-filter button {
        height: 46px;
        padding: 0 21px;
        border: 1px solid #1e462e;
        border-radius: 9px;
        background: #1e462e;
        color: #fff;
        font-family: inherit;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        white-space: nowrap;
        transition: all .3s ease;
    }

    .gallery-filter button:hover {
        background: #12301e;
        border-color: #12301e;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(30, 70, 46, .12);
    }

    .gallery-reset {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        height: 46px;
        padding: 0 12px;
        color: #87958a;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
        white-space: nowrap;
        transition: color .25s ease;
    }

    .gallery-reset:hover {
        color: #a58c3d;
    }

    /* GRID GALERI */
    .gallery-grid-public {
        position: relative;
        z-index: 1;
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 25px;
    }

    .gallery-item {
        position: relative;
        overflow: hidden;
        background: #fff;
        border: 1px solid #e7eee8;
        border-radius: 16px;
        box-shadow: 0 7px 22px rgba(30, 70, 46, .07);
        transition: transform .35s ease, box-shadow .35s ease;
        animation: galleryFadeUp .65s ease both;
    }

    .gallery-item:hover {
        transform: translateY(-7px);
        box-shadow: 0 15px 32px rgba(30, 70, 46, .13);
    }

    .gallery-image-wrapper {
        position: relative;
        overflow: hidden;
        background: #eaf2ed;
        cursor: pointer;
    }

    .gallery-item img {
        display: block;
        width: 100%;
        height: 265px;
        object-fit: cover;
        transition: transform .55s ease;
    }

    .gallery-item:hover img {
        transform: scale(1.07);
    }

    .gallery-image-wrapper::after {
        content: "Lihat Foto";
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(18, 48, 30, .42);
        color: #fff;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: .5px;
        opacity: 0;
        transition: opacity .3s ease;
        pointer-events: none;
    }

    .gallery-item:hover .gallery-image-wrapper::after {
        opacity: 1;
    }

    .gallery-caption {
        padding: 18px 18px 19px;
        background: #fff;
    }

    .gallery-caption h3 {
        color: #1e462e;
        font-family: 'Bricolage Grotesque', sans-serif;
        font-size: 16px;
        font-weight: 800;
        line-height: 1.5;
        margin: 0 0 8px;
        overflow-wrap: anywhere;
    }

    .gallery-caption p {
        color: #7a887e;
        font-size: 13px;
        line-height: 1.7;
        margin: 0 0 13px;
    }

    .gallery-caption .gallery-album {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 11px;
        background: #eaf2ed;
        color: #1e462e;
        border: 1px solid #dce9df;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
    }

    .gallery-caption .gallery-album::before {
        content: "";
        width: 6px;
        height: 6px;
        background: #b49b45;
        border-radius: 50%;
    }

    /* BAGIKAN FOTO */
    .gallery-share {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 16px;
        margin-top: 16px;
        padding-top: 13px;
        border-top: 1px solid #edf1ed;
    }

    .gallery-share button,
    .gallery-share a {
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

    .gallery-share button:hover,
    .gallery-share a:hover {
        color: #1e462e;
    }

    .gallery-share svg {
        width: 14px;
        height: 14px;
        flex-shrink: 0;
    }

    /* EMPTY STATE */
    .gallery-empty {
        grid-column: 1 / -1;
        text-align: center;
        padding: 75px 20px;
        background: #fff;
        border: 1px dashed #cbd9ce;
        border-radius: 16px;
        color: #849188;
    }

    .gallery-empty-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 70px;
        height: 70px;
        margin: 0 auto 18px;
        background: #eaf2ed;
        border-radius: 50%;
        font-size: 29px;
    }

    .gallery-empty h3 {
        color: #1e462e;
        font-family: 'Bricolage Grotesque', sans-serif;
        font-size: 20px;
        margin: 0 0 9px;
    }

    .gallery-empty p {
        font-size: 13px;
        line-height: 1.7;
        margin: 0;
    }

    .gallery-empty a {
        display: inline-flex;
        margin-top: 18px;
        color: #1e462e;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
    }

    .gallery-empty a:hover {
        color: #a58c3d;
    }

    /* PAGINATION */
    .gallery-pagination {
        position: relative;
        z-index: 1;
        margin-top: 40px;
    }

    .gallery-pagination nav {
        display: flex;
        justify-content: center;
    }

    .gallery-pagination nav > div:first-child {
        color: #849188;
        font-size: 13px;
    }

    .gallery-pagination nav a,
    .gallery-pagination nav span {
        border-color: #e0e9e1 !important;
        color: #1e462e !important;
    }

    .gallery-pagination nav [aria-current="page"] span {
        background: #1e462e !important;
        border-color: #1e462e !important;
        color: #fff !important;
    }

    /* MODAL FOTO */
    .gallery-modal {
        display: none;
        position: fixed;
        z-index: 99999;
        inset: 0;
        background: rgba(9, 24, 14, .94);
        justify-content: center;
        align-items: center;
        padding: 55px 25px 30px;
        opacity: 0;
        backdrop-filter: blur(5px);
    }

    .gallery-modal.active {
        display: flex;
        opacity: 1;
        animation: modalFade .25s ease both;
    }

    .gallery-modal img {
        display: block;
        max-width: 90%;
        max-height: 85vh;
        object-fit: contain;
        border-radius: 10px;
        box-shadow: 0 15px 45px rgba(0, 0, 0, .3);
        animation: modalZoom .3s ease both;
    }

    /* TOMBOL X */
    .gallery-modal-close {
        position: absolute;
        top: 20px;
        right: 25px;
        z-index: 100001;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 46px;
        height: 46px;
        padding: 0;
        color: #fff;
        font-family: Arial, sans-serif;
        font-size: 32px;
        line-height: 1;
        cursor: pointer;
        background: rgba(255, 255, 255, .15);
        border: 1px solid rgba(255, 255, 255, .3);
        border-radius: 50%;
        transition: all .25s ease;
    }

    .gallery-modal-close:hover {
        background: #b49b45;
        border-color: #b49b45;
        transform: rotate(90deg);
    }

    @keyframes galleryFadeUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes modalFade {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes modalZoom {
        from {
            opacity: 0;
            transform: scale(.94);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    /* RESPONSIVE */
    @media (max-width: 900px) {
        .gallery-filter {
            grid-template-columns: minmax(0, 1fr) 210px auto;
        }

        .gallery-reset {
            grid-column: 1 / -1;
            justify-self: center;
            height: auto;
            padding: 4px 12px;
        }

        .gallery-grid-public {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .gallery-item img {
            height: 245px;
        }
    }

    @media (max-width: 600px) {
        .gallery-public {
            padding: 40px 16px 55px;
        }

        .gallery-heading {
            margin-bottom: 27px;
        }

        .gallery-heading h1 {
            font-size: 28px;
        }

        .gallery-heading p {
            font-size: 13px;
        }

        .gallery-filter {
            grid-template-columns: 1fr;
            gap: 10px;
            padding: 15px;
            margin-bottom: 27px;
        }

        .gallery-filter input,
        .gallery-filter select,
        .gallery-filter button {
            width: 100%;
        }

        .gallery-reset {
            grid-column: auto;
            justify-self: stretch;
            text-align: center;
        }

        .gallery-grid-public {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .gallery-item img {
            height: 240px;
        }

        .gallery-caption {
            padding: 16px;
        }

        .gallery-modal {
            padding: 60px 15px 20px;
        }

        .gallery-modal img {
            max-width: 100%;
            max-height: 80vh;
        }

        .gallery-modal-close {
            top: 12px;
            right: 12px;
            width: 42px;
            height: 42px;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .gallery-item,
        .gallery-heading,
        .gallery-modal img {
            animation: none;
        }

        .gallery-item,
        .gallery-item img,
        .gallery-image-wrapper::after {
            transition: none;
        }
    }
</style>
@endpush

@section('content')

<section class="gallery-public">

    {{-- HEADER --}}
    <div class="gallery-heading">
        <div class="eyebrow">Dokumentasi Desa</div>

        <h1>Galeri Desa Manyar</h1>

        <p>
            Kumpulan dokumentasi kegiatan, aktivitas masyarakat,
            dan berbagai momen di Desa Manyar.
        </p>
    </div>

    {{-- PENCARIAN DAN FILTER ALBUM --}}
    <form
        action="{{ route('public.galleries.index') }}"
        method="GET"
        class="gallery-filter"
    >

        <div class="gallery-search">
            <svg viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2"
                stroke-linecap="round">
                <circle cx="11" cy="11" r="7"></circle>
                <path d="m16 16 4 4"></path>
            </svg>

            <input
                type="text"
                name="search"
                value="{{ $search ?? '' }}"
                placeholder="Cari foto atau kegiatan..."
                aria-label="Cari foto atau kegiatan"
            >
        </div>

        <select name="album" aria-label="Pilih album">
            <option value="">Semua Album</option>

            @foreach($albums as $item)
                <option
                    value="{{ $item }}"
                    {{ ($album ?? '') == $item ? 'selected' : '' }}
                >
                    {{ $item }}
                </option>
            @endforeach
        </select>

        <button type="submit">
            Cari Foto
        </button>

        @if(!empty($search) || !empty($album))
            <a
                href="{{ route('public.galleries.index') }}"
                class="gallery-reset"
            >
                Reset Pencarian
            </a>
        @endif

    </form>

    {{-- DAFTAR FOTO --}}
    <div class="gallery-grid-public">

        @forelse($galleries as $gallery)

            <article class="gallery-item">

                {{-- GAMBAR --}}
                <div
                    class="gallery-image-wrapper"
                    onclick="openGalleryImage(
                        {{ Js::from(asset('storage/' . $gallery->image_path)) }},
                        {{ Js::from($gallery->title) }}
                    )"
                >
                    <img
                        src="{{ asset('storage/' . $gallery->image_path) }}"
                        alt="{{ $gallery->title }}"
                        loading="lazy"
                    >
                </div>

                {{-- INFORMASI FOTO --}}
                <div class="gallery-caption">

                    <h3>{{ $gallery->title }}</h3>

                    @if($gallery->description)
                        <p>{{ Str::limit($gallery->description, 100) }}</p>
                    @endif

                    @if($gallery->album)
                        <span class="gallery-album">
                            {{ $gallery->album }}
                        </span>
                    @endif

                    {{-- BAGIKAN FOTO --}}
                    <div class="gallery-share">

                        <button
                            type="button"
                            onclick="copyGalleryLink(this)"
                            data-url="{{ asset('storage/' . $gallery->image_path) }}"
                            title="Salin link foto"
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
                            href="https://wa.me/?text={{ urlencode($gallery->title . ' - Galeri Desa Manyar: ' . asset('storage/' . $gallery->image_path)) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            title="Bagikan foto melalui WhatsApp"
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

        @empty

            <div class="gallery-empty">
                <div class="gallery-empty-icon">📷</div>

                <h3>Belum Ada Foto Galeri</h3>

                <p>
                    @if(!empty($search) || !empty($album))
                        Foto yang Anda cari belum ditemukan.
                    @else
                        Dokumentasi foto Desa Manyar belum tersedia.
                    @endif
                </p>

                @if(!empty($search) || !empty($album))
                    <a href="{{ route('public.galleries.index') }}">
                        Tampilkan Semua Foto
                    </a>
                @endif
            </div>

        @endforelse

    </div>

    {{-- PAGINATION --}}
    <div class="gallery-pagination">
        {{ $galleries->appends(request()->query())->links() }}
    </div>

</section>

{{-- MODAL FOTO --}}
<div
    class="gallery-modal"
    id="galleryModal"
    onclick="closeGalleryImage()"
    aria-hidden="true"
>
    {{-- TOMBOL X --}}
    <button
        type="button"
        class="gallery-modal-close"
        onclick="event.stopPropagation(); closeGalleryImage()"
        aria-label="Tutup foto"
        title="Tutup foto"
    >
        &times;
    </button>

    <img
        id="galleryModalImage"
        src=""
        alt="Foto galeri"
        onclick="event.stopPropagation()"
    >
</div>

@endsection

@push('scripts')
<script>
    // MEMBUKA FOTO
    function openGalleryImage(imageUrl, title) {
        const modal = document.getElementById('galleryModal');
        const image = document.getElementById('galleryModalImage');

        if (!modal || !image) return;

        image.src = imageUrl;
        image.alt = title || 'Foto Galeri';

        modal.classList.add('active');
        modal.setAttribute('aria-hidden', 'false');

        document.body.style.overflow = 'hidden';
    }

    // MENUTUP FOTO
    function closeGalleryImage() {
        const modal = document.getElementById('galleryModal');
        const image = document.getElementById('galleryModalImage');

        if (!modal || !image) return;

        modal.classList.remove('active');
        modal.setAttribute('aria-hidden', 'true');

        image.src = '';

        document.body.style.overflow = '';
    }

    // TOMBOL ESCAPE UNTUK MENUTUP MODAL
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeGalleryImage();
        }
    });

    // MENYALIN LINK FOTO
    function copyGalleryLink(button) {
        const url = button.dataset.url;
        const label = button.querySelector('span');
        const originalLabel = label.textContent;

        function showCopied() {
            label.textContent = 'Tersalin!';

            setTimeout(() => {
                label.textContent = originalLabel;
            }, 1800);
        }

        function fallbackCopyGallery() {
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
                    alert('Gagal menyalin link foto.');
                }
            } catch (error) {
                alert('Gagal menyalin link foto.');
            }

            document.body.removeChild(textarea);
        }

        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(url)
                .then(showCopied)
                .catch(fallbackCopyGallery);
        } else {
            fallbackCopyGallery();
        }
    }
</script>
@endpush
