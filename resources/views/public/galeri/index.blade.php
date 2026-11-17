
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

    /* FILTER */
    .gallery-filter {
        position: relative;
        z-index: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 11px;
        flex-wrap: wrap;
        max-width: 850px;
        margin: 0 auto 38px;
        padding: 19px;
        background: #fff;
        border: 1px solid #e7eee8;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(30, 70, 46, .06);
    }

    .gallery-filter input,
    .gallery-filter select {
        min-height: 45px;
        padding: 11px 14px;
        border: 1px solid #dce6dd;
        border-radius: 9px;
        background: #fff;
        font-size: 13px;
        color: #344a39;
        outline: none;
        transition: all .25s ease;
    }

    .gallery-filter input {
        width: 290px;
    }

    .gallery-filter select {
        min-width: 190px;
        cursor: pointer;
    }

    .gallery-filter input:focus,
    .gallery-filter select:focus {
        border-color: #1e462e;
        box-shadow: 0 0 0 3px rgba(30, 70, 46, .08);
    }

    .gallery-filter input::placeholder {
        color: #a0aaa2;
    }

    .gallery-filter button {
        min-height: 45px;
        padding: 11px 23px;
        border: 1px solid #1e462e;
        border-radius: 9px;
        background: #1e462e;
        color: #fff;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: all .3s ease;
    }

    .gallery-filter button:hover {
        background: #fff;
        color: #1e462e;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(30, 70, 46, .12);
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
        cursor: pointer;
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

    .gallery-caption span {
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

    .gallery-caption span::before {
        content: "";
        width: 6px;
        height: 6px;
        background: #b49b45;
        border-radius: 50%;
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
        z-index: 9999;
        inset: 0;
        background: rgba(9, 24, 14, .94);
        justify-content: center;
        align-items: center;
        padding: 35px;
        opacity: 0;
        transition: opacity .3s ease;
        backdrop-filter: blur(5px);
    }

    .gallery-modal.active {
        display: flex;
        opacity: 1;
        animation: modalFade .25s ease both;
    }

    .gallery-modal img {
        max-width: 90%;
        max-height: 85vh;
        object-fit: contain;
        border-radius: 10px;
        box-shadow: 0 15px 45px rgba(0, 0, 0, .3);
        animation: modalZoom .3s ease both;
    }

    .gallery-modal-close {
        position: absolute;
        top: 20px;
        right: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 43px;
        height: 43px;
        color: #fff;
        font-size: 30px;
        cursor: pointer;
        background: rgba(255, 255, 255, .12);
        border: 1px solid rgba(255, 255, 255, .2);
        border-radius: 50%;
        transition: all .25s ease;
    }

    .gallery-modal-close:hover {
        background: #b49b45;
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

    @media (max-width: 900px) {
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
            flex-direction: column;
            align-items: stretch;
            padding: 15px;
            margin-bottom: 27px;
        }

        .gallery-filter input,
        .gallery-filter select,
        .gallery-filter button {
            width: 100%;
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
            padding: 15px;
        }

        .gallery-modal img {
            max-width: 100%;
            max-height: 80vh;
        }

        .gallery-modal-close {
            top: 12px;
            right: 12px;
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

    <div class="gallery-heading">
        <div class="eyebrow">Dokumentasi Desa</div>

        <h1>Galeri Desa Manyar</h1>

        <p>
            Kumpulan dokumentasi kegiatan, aktivitas masyarakat,
            dan berbagai momen di Desa Manyar.
        </p>
    </div>

    {{-- Pencarian dan filter album --}}
    <form action="{{ route('public.galleries.index') }}"
          method="GET"
          class="gallery-filter">

        <input
            type="text"
            name="search"
            value="{{ $search }}"
            placeholder="Cari foto atau kegiatan..."
        >

        <select name="album">
            <option value="">Semua Album</option>

            @foreach($albums as $item)
                <option value="{{ $item }}"
                    {{ $album == $item ? 'selected' : '' }}>
                    {{ $item }}
                </option>
            @endforeach
        </select>

        <button type="submit">Cari Foto</button>

    </form>

    {{-- Daftar foto --}}
    <div class="gallery-grid-public">

        @forelse($galleries as $gallery)

            <article class="gallery-item"
                onclick="openGalleryImage(
                    {{ Js::from(asset('storage/' . $gallery->image_path)) }},
                    {{ Js::from($gallery->title) }}
                )">

                <div class="gallery-image-wrapper">
                    <img
                        src="{{ asset('storage/' . $gallery->image_path) }}"
                        alt="{{ $gallery->title }}"
                        loading="lazy"
                    >
                </div>

                <div class="gallery-caption">

                    <h3>{{ $gallery->title }}</h3>

                    @if($gallery->description)
                        <p>{{ Str::limit($gallery->description, 100) }}</p>
                    @endif

                    @if($gallery->album)
                        <span>{{ $gallery->album }}</span>
                    @endif

                </div>

            </article>

        @empty

            <div class="gallery-empty">
                <div class="gallery-empty-icon">📷</div>

                <h3>Belum Ada Foto Galeri</h3>

                <p>
                    @if($search || $album)
                        Foto yang Anda cari belum ditemukan.
                    @else
                        Dokumentasi foto Desa Manyar belum tersedia.
                    @endif
                </p>
            </div>

        @endforelse

    </div>

    <div class="gallery-pagination">
        {{ $galleries->links() }}
    </div>

</section>

{{-- Modal foto --}}
<div class="gallery-modal" id="galleryModal"
     onclick="closeGalleryImage()">

    <button type="button"
            class="gallery-modal-close"
            onclick="event.stopPropagation(); closeGalleryImage()"
            aria-label="Tutup foto">
        &times;
    </button>

    <img id="galleryModalImage" src="" alt="Foto galeri"
         onclick="event.stopPropagation()">

</div>

@endsection

@push('scripts')
<script>
    function openGalleryImage(imageUrl, title) {
        const modal = document.getElementById('galleryModal');
        const image = document.getElementById('galleryModalImage');

        image.src = imageUrl;
        image.alt = title;

        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeGalleryImage() {
        const modal = document.getElementById('galleryModal');
        const image = document.getElementById('galleryModalImage');

        modal.classList.remove('active');
        image.src = '';

        document.body.style.overflow = '';
    }

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeGalleryImage();
        }
    });
</script>
@endpush
