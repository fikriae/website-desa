
@extends('public.layouts.app')

@section('title', 'Beranda - Desa Manyar')

@section('content')

{{-- =====================================================
     HERO SLIDER
===================================================== --}}
<section class="manyar-hero">

    <article class="manyar-slide active">
        <div class="slide-image">
            <img src="{{ asset('images/hero-1.jpg') }}" alt="Suasana Desa Manyar">
        </div>

        <div class="slide-shade"></div>

        <div class="hero-inner">
            <div class="hero-copy">
                <span class="eyebrow">WEBSITE RESMI PEMERINTAH DESA</span>

                <h1>
                    Mengenal Desa<br>
                    <span>Manyar</span> Lebih Dekat
                </h1>

                <p>
                    Ruang informasi dan pelayanan digital untuk masyarakat
                    Desa Manyar. Temukan informasi, kegiatan, dan potensi
                    desa dalam satu tempat.
                </p>

                <div class="hero-actions">
                    <a href="#sekilas" class="primary-action">
                        Tentang Desa <span>↗</span>
                    </a>

                    <a href="#pelayanan" class="secondary-action">
                        Layanan Kami
                    </a>
                </div>
            </div>

            <div class="hero-side">
                <div class="side-caption">
                    <span class="caption-line"></span>
                    <div>
                        <small>MENJELAJAHI</small>
                        <strong>Potensi Desa</strong>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <article class="manyar-slide">
        <div class="slide-image">
            <img src="{{ asset('images/hero-2.jpg') }}" alt="Lingkungan Desa Manyar">
        </div>

        <div class="slide-shade"></div>

        <div class="hero-inner">
            <div class="hero-copy">
                <span class="eyebrow">INFORMASI DAN PELAYANAN</span>

                <h1>
                    Desa Terhubung,<br>
                    Pelayanan <span>Lebih Mudah</span>
                </h1>

                <p>
                    Akses informasi pengumuman, agenda desa, berita,
                    dan layanan administrasi secara praktis melalui
                    website resmi Desa Manyar.
                </p>

                <div class="hero-actions">
                    <a href="#pelayanan" class="primary-action">
                        Layanan Desa <span>↗</span>
                    </a>

                    <a href="{{ url('/pengumuman') }}" class="secondary-action">
                        Pengumuman
                    </a>
                </div>
            </div>

            <div class="hero-side">
                <div class="side-caption">
                    <span class="caption-line"></span>
                    <div>
                        <small>BERSAMA MEMBANGUN</small>
                        <strong>Desa yang Lebih Baik</strong>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <div class="hero-navigation">
        <button type="button" id="heroPrev" aria-label="Slide sebelumnya">←</button>

        <div class="hero-progress">
            <span id="currentSlide">01</span>
            <div class="progress-track">
                <span id="progressBar"></span>
            </div>
            <span>02</span>
        </div>

        <button type="button" id="heroNext" aria-label="Slide berikutnya">→</button>
    </div>

    <div class="hero-scroll">
        <span></span>
        GULIR UNTUK MENJELAJAHI
    </div>
</section>


{{-- =====================================================
     SEKILAS TENTANG KAMI
===================================================== --}}
<section class="village-intro" id="sekilas">

    <div class="intro-container">

        <div class="intro-logo">
            <div class="logo-decoration"></div>

            <img
                src="{{ asset('images/logo.jpeg') }}"
                alt="Logo Desa Manyar"
                loading="lazy"
            >
        </div>

        <div class="intro-content">

            <span class="intro-label">SEKILAS TENTANG KAMI</span>

            <h2>
                Desa Manyar
                <span class="title-dot"></span>
            </h2>

            <p>
                Desa Manyar adalah salah satu desa/kelurahan di Kecamatan
                Sekaran, Kabupaten Lamongan, Provinsi Jawa Timur.
                Manyar mempunyai kode wilayah menurut Kementerian Dalam
                Negeri (Kemendagri) yaitu <strong>35.24.09.2009</strong>.
                Sedangkan kode posnya adalah <strong>62261</strong>.
            </p>

            <p>
                Website ini menjadi sarana informasi dan komunikasi
                antara pemerintah desa dengan masyarakat. Melalui website
                resmi ini, masyarakat dapat memperoleh informasi mengenai
                profil desa, kegiatan, pengumuman, berita, serta pelayanan
                administrasi desa.
            </p>

            <p class="intro-highlight">
                Bersama membangun Desa Manyar yang informatif,
                maju, dan melayani masyarakat.
            </p>

        </div>

    </div>
</section>


{{-- =====================================================
     PELAYANAN KAMI
===================================================== --}}
<section class="services-section" id="pelayanan">

    <div class="services-container">

        <div class="services-heading">
            <span class="services-label">KEMUDAHAN AKSES INFORMASI</span>

            <h2>
                Pelayanan Kami
                <span class="title-dot"></span>
            </h2>

            <p>
                Jelajahi dan temukan berbagai informasi serta pelayanan
                yang tersedia di Desa Manyar.
            </p>
        </div>

        <div class="services-grid">

            {{-- PENGUMUMAN --}}
            <a href="{{ url('/pengumuman') }}" class="service-card">
                <div class="service-icon">
                    <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 44L31 32L56 57L44 69L19 44Z"
                              stroke="currentColor" stroke-width="5"
                              stroke-linejoin="round"/>
                        <path d="M31 32C38 23 53 23 63 33C72 42 73 56 65 64"
                              stroke="currentColor" stroke-width="5"
                              stroke-linecap="round"/>
                        <path d="M42 39L58 55"
                              stroke="currentColor" stroke-width="5"
                              stroke-linecap="round"/>
                        <path d="M24 66L13 79C10 83 15 89 20 86L34 76"
                              fill="currentColor"/>
                        <path d="M43 69L58 84C62 88 69 82 65 78L54 65"
                              fill="currentColor"/>
                        <path d="M73 19L78 9M84 34L94 29M76 49L88 49"
                              stroke="currentColor" stroke-width="5"
                              stroke-linecap="round"/>
                    </svg>
                </div>

                <h3>Pengumuman</h3>
                <p>Informasi dan pengumuman terbaru dari pemerintah desa.</p>
                <span class="service-link">Lihat Pengumuman <b>↗</b></span>
            </a>

            {{-- AGENDA --}}
            <a href="{{ url('/agenda') }}" class="service-card">
                <div class="service-icon">
                    <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 22H70V83H19V22Z"
                              stroke="currentColor" stroke-width="5"
                              stroke-linejoin="round"/>
                        <path d="M33 15H56V28H33V15Z" fill="currentColor"/>
                        <path d="M29 39H61M29 51H61M29 63H49"
                              stroke="currentColor" stroke-width="4"
                              stroke-linecap="round"/>
                        <circle cx="70" cy="70" r="17"
                                fill="white" stroke="currentColor" stroke-width="5"/>
                        <path d="M70 60V71L78 76"
                              stroke="currentColor" stroke-width="4"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>

                <h3>Agenda</h3>
                <p>Jadwal kegiatan dan acara di lingkungan Desa Manyar.</p>
                <span class="service-link">Lihat Agenda <b>↗</b></span>
            </a>

            {{-- BERITA --}}
            <a href="{{ route('public.news.index') }}" class="service-card">
                <div class="service-icon">
                    <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 15H77V24H27V78H17V15Z"
                              fill="currentColor"/>
                        <path d="M29 31H88V83H29V31Z"
                              stroke="currentColor" stroke-width="5"
                              stroke-linejoin="round"/>
                        <path d="M38 41H57V61H38V41Z"
                              fill="currentColor"/>
                        <path d="M64 43H80M64 53H80M38 70H80"
                              stroke="currentColor" stroke-width="4"
                              stroke-linecap="round"/>
                    </svg>
                </div>

                <h3>Berita</h3>
                <p>Informasi dan berita seputar perkembangan desa.</p>
                <span class="service-link">Baca Berita <b>↗</b></span>
            </a>

            {{-- GALERI --}}
            <a href="{{ url('/galeri') }}" class="service-card">
                <div class="service-icon">
                    <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 31L73 19L85 70L27 82L15 31Z"
                              stroke="currentColor" stroke-width="5"
                              stroke-linejoin="round"/>
                        <path d="M25 23L80 31L73 79L18 71L25 23Z"
                              fill="white" stroke="currentColor" stroke-width="5"
                              stroke-linejoin="round"/>
                        <circle cx="40" cy="42" r="5" fill="currentColor"/>
                        <path d="M25 65L42 49L54 59L64 51L75 68"
                              stroke="currentColor" stroke-width="5"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>

                <h3>Galeri</h3>
                <p>Dokumentasi foto berbagai kegiatan Desa Manyar.</p>
                <span class="service-link">Lihat Galeri <b>↗</b></span>
            </a>

            {{-- LAYANAN SURAT --}}
            <a href="{{ url('/layanan-surat') }}" class="service-card service-card-featured">
                <div class="service-icon">
                    <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24 13H61L79 31V86H24V13Z"
                              stroke="currentColor" stroke-width="5"
                              stroke-linejoin="round"/>
                        <path d="M60 14V32H78"
                              stroke="currentColor" stroke-width="5"
                              stroke-linejoin="round"/>
                        <path d="M36 46H67M36 58H67M36 70H57"
                              stroke="currentColor" stroke-width="4"
                              stroke-linecap="round"/>
                        <path d="M15 35V91H69"
                              stroke="currentColor" stroke-width="4"
                              stroke-linecap="round"/>
                    </svg>
                </div>

                <h3>Layanan Surat</h3>
                <p>Akses informasi dan pelayanan administrasi surat Desa Manyar.</p>
                <span class="service-link">Buka Layanan <b>↗</b></span>
            </a>

        </div>

    </div>
</section>


{{-- =====================================================
     PERANGKAT DESA
===================================================== --}}
<section class="leadership-section" id="perangkat-desa">

    <div class="leadership-container">

        <div class="leadership-heading">
            <span class="leadership-label">STRUKTUR PEMERINTAHAN</span>

            <h2>
                Pemimpin Beserta Jajarannya
                <span class="title-dot"></span>
            </h2>

            <p>
                Mengenal para pemimpin dan perangkat Desa Manyar
                yang berperan dalam pelayanan masyarakat.
            </p>
        </div>

        <div class="leadership-grid">

            <article class="leader-card">
                <div class="leader-photo-wrap">
                    <div class="leader-decoration"></div>

                    <div class="leader-photo">
                        @if(file_exists(public_path('images/perangkat/kepala-desa.jpg')))
                            <img src="{{ asset('images/perangkat/kepala-desa.jpg') }}"
                                 alt="Kepala Desa Manyar" loading="lazy">
                        @else
                            <div class="leader-placeholder">ED</div>
                        @endif
                    </div>
                </div>

                <div class="leader-info">
                    <h3>Ependi, SH, M.Kn</h3>
                    <p>Kepala Desa</p>
                </div>
            </article>

            <article class="leader-card">
                <div class="leader-photo-wrap">
                    <div class="leader-decoration"></div>

                    <div class="leader-photo">
                        @if(file_exists(public_path('images/perangkat/sekretaris-desa.jpg')))
                            <img src="{{ asset('images/perangkat/sekretaris-desa.jpg') }}"
                                 alt="Sekretaris Desa" loading="lazy">
                        @else
                            <div class="leader-placeholder">RS</div>
                        @endif
                    </div>
                </div>

                <div class="leader-info">
                    <h3>RIYADUS SOLIHIN</h3>
                    <p>Sekretaris Desa</p>
                </div>
            </article>

            <article class="leader-card">
                <div class="leader-photo-wrap">
                    <div class="leader-decoration"></div>

                    <div class="leader-photo">
                        @if(file_exists(public_path('images/perangkat/ketua-bpd.jpg')))
                            <img src="{{ asset('images/perangkat/ketua-bpd.jpg') }}"
                                 alt="Ketua BPD" loading="lazy">
                        @else
                            <div class="leader-placeholder">AM</div>
                        @endif
                    </div>
                </div>

                <div class="leader-info">
                    <h3>H. ABDUL MU'ID</h3>
                    <p>Ketua BPD</p>
                </div>
            </article>

        </div>
    </div>
</section>


{{-- =====================================================
     LOKASI DESA MANYAR
===================================================== --}}
<section class="location-section" id="lokasi">

    <div class="location-container">

        <div class="location-heading">
            <span class="location-label">TEMUKAN KAMI</span>

            <h2>
                Lokasi Desa Manyar
                <span class="title-dot"></span>
            </h2>

            <p>
                Temukan lokasi Desa Manyar melalui peta
                dan kunjungi kami secara langsung.
            </p>
        </div>

        <div class="location-card">

            <div class="location-map">
                <iframe
                    src="https://www.google.com/maps?q=Manyar%2C%20Kec.%20Sekaran%2C%20Kabupaten%20Lamongan%2C%20Jawa%20Timur&output=embed"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Peta Lokasi Desa Manyar">
                </iframe>
            </div>

            <div class="location-info">
                <div class="location-icon">⌖</div>

                <span class="location-subtitle">WILAYAH PEMERINTAHAN</span>

                <h3>Desa Manyar</h3>

                <p>
                    Kecamatan Sekaran,<br>
                    Kabupaten Lamongan,<br>
                    Jawa Timur.
                </p>

                <a
                    href="https://www.google.com/maps/search/?api=1&query=Manyar%2C%20Kec.%20Sekaran%2C%20Kabupaten%20Lamongan%2C%20Jawa%20Timur"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="location-button">
                    Buka Google Maps <span>↗</span>
                </a>
            </div>

        </div>
    </div>
</section>

@endsection


{{-- =====================================================
     CSS
===================================================== --}}
@push('styles')
<style>

/* DASAR */

html {
    scroll-behavior: smooth;
}

body:has(.manyar-hero) main {
    padding-top: 0 !important;
    min-height: auto;
}

body:has(.manyar-hero) .site-header {
    background: rgba(255,255,255,.97);
    border-bottom: 1px solid rgba(30,70,46,.10);
    box-shadow: 0 3px 18px rgba(0,0,0,.04);
    backdrop-filter: blur(12px);
    z-index: 99999;
}

body:has(.manyar-hero) .site-header.scrolled {
    background: rgba(255,255,255,.99);
    box-shadow: 0 5px 22px rgba(0,0,0,.09);
}

body:has(.manyar-hero) .brand img {
    display: block !important;
}

body:has(.manyar-hero) .main-nav a {
    color: #31483a;
}

body:has(.manyar-hero) .main-nav a:hover,
body:has(.manyar-hero) .main-nav a.active {
    color: #1e462e;
    background: #eaf2ed;
}

body:has(.manyar-hero) .main-nav .nav-cta {
    color: #fff;
    background: #1e462e;
}

.title-dot {
    width: 18px;
    height: 18px;
    display: inline-block;
    flex-shrink: 0;
    border-radius: 50%;
    background: #dfc331;
}


/* HERO */

.manyar-hero {
    position: relative;
    height: min(820px, 100svh);
    min-height: 650px;
    overflow: hidden;
    isolation: isolate;
    background: #12301e;
}

.manyar-slide {
    position: absolute;
    inset: 0;
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    transition: opacity 1s ease, visibility 1s ease;
}

.manyar-slide.active {
    opacity: 1;
    visibility: visible;
    pointer-events: auto;
    z-index: 1;
}

.slide-image {
    position: absolute;
    inset: 0;
    overflow: hidden;
}

.slide-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transform: scale(1.08);
    transition: transform 8s ease;
}

.manyar-slide.active .slide-image img {
    transform: scale(1);
}

.slide-shade {
    position: absolute;
    inset: 0;
    background:
        linear-gradient(90deg,
            rgba(13,39,26,.91) 0%,
            rgba(20,53,35,.77) 46%,
            rgba(20,53,35,.27) 100%),
        linear-gradient(0deg, rgba(10,30,19,.42), transparent 40%);
}

.hero-inner {
    position: relative;
    z-index: 2;
    width: min(1160px, calc(100% - 60px));
    height: 100%;
    margin: auto;
    padding: 120px 0 105px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.hero-copy {
    max-width: 710px;
    color: #fff;
    opacity: 0;
    transform: translateY(25px);
}

.manyar-slide.active .hero-copy {
    animation: copyEnter .9s .2s ease forwards;
}

.eyebrow {
    display: inline-flex;
    margin-bottom: 27px;
    padding: 10px 15px;
    border: 1px solid rgba(255,255,255,.26);
    border-radius: 30px;
    background: rgba(255,255,255,.10);
    color: #e8d6a5;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 2px;
}

.hero-copy h1 {
    margin-bottom: 25px;
    color: #fff;
    font-family: 'Bricolage Grotesque', sans-serif;
    font-size: clamp(45px, 5.5vw, 72px);
    font-weight: 800;
    line-height: 1.1;
    letter-spacing: -2.3px;
}

.hero-copy h1 span {
    color: #e5ce91;
}

.hero-copy p {
    max-width: 520px;
    margin-bottom: 35px;
    color: rgba(255,255,255,.83);
    font-size: 15px;
    line-height: 1.9;
}

.hero-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 13px;
}

.primary-action,
.secondary-action {
    min-height: 49px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
    padding: 0 22px;
    border-radius: 7px;
    font-size: 13px;
    font-weight: 700;
    transition: .3s ease;
}

.primary-action {
    color: #173b29;
    background: #e5ce91;
}

.primary-action:hover {
    color: #173b29;
    background: #fff;
    transform: translateY(-3px);
}

.secondary-action {
    color: #fff;
    border: 1px solid rgba(255,255,255,.48);
    background: rgba(255,255,255,.07);
}

.secondary-action:hover {
    color: #173b29;
    background: #fff;
}

.hero-side {
    align-self: flex-end;
    margin-bottom: 70px;
    color: #fff;
    opacity: 0;
}

.manyar-slide.active .hero-side {
    animation: sideEnter .8s .5s ease forwards;
}

.side-caption {
    display: flex;
    align-items: center;
    gap: 15px;
}

.caption-line {
    width: 45px;
    height: 1px;
    background: #e5ce91;
}

.side-caption small,
.side-caption strong {
    display: block;
}

.side-caption small {
    margin-bottom: 5px;
    color: rgba(255,255,255,.65);
    font-size: 9px;
    letter-spacing: 2px;
}

.side-caption strong {
    font-size: 15px;
}

.hero-navigation {
    position: absolute;
    z-index: 5;
    left: max(calc((100% - 1160px) / 2), 30px);
    bottom: 42px;
    display: flex;
    align-items: center;
    gap: 14px;
}

.hero-navigation button {
    width: 43px;
    height: 43px;
    border: 1px solid rgba(255,255,255,.55);
    border-radius: 50%;
    background: rgba(255,255,255,.08);
    color: #fff;
    font-size: 19px;
    cursor: pointer;
    transition: .25s ease;
}

.hero-navigation button:hover {
    color: #173b29;
    background: #e5ce91;
    border-color: #e5ce91;
}

.hero-progress {
    display: flex;
    align-items: center;
    gap: 12px;
    color: #fff;
    font-size: 11px;
    font-weight: 700;
}

.progress-track {
    width: 90px;
    height: 2px;
    overflow: hidden;
    background: rgba(255,255,255,.35);
}

.progress-track span {
    display: block;
    width: 0;
    height: 100%;
    background: #e5ce91;
}

.progress-track span.running {
    animation: progressRun 5s linear forwards;
}

.hero-scroll {
    position: absolute;
    z-index: 5;
    right: max(calc((100% - 1160px) / 2), 30px);
    bottom: 57px;
    display: flex;
    align-items: center;
    gap: 12px;
    color: rgba(255,255,255,.75);
    font-size: 9px;
    letter-spacing: 2px;
}

.hero-scroll span {
    width: 30px;
    height: 1px;
    background: #e5ce91;
}


/* SEKILAS TENTANG KAMI - SATU LAYAR */

#sekilas {
    scroll-margin-top: 80px;
}

.village-intro {
    position: relative;
    width: 100%;
    min-height: calc(100svh - 80px);
    box-sizing: border-box;
    padding: 35px 0;
    display: flex;
    align-items: center;
    overflow: hidden;
    background: #fff;
}

.intro-container {
    position: relative;
    width: min(1120px, calc(100% - 60px));
    min-height: 100%;
    margin: auto;
    display: grid;
    grid-template-columns: 1fr 1fr;
    align-items: center;
    gap: 75px;
}

.intro-logo {
    position: relative;
    min-height: 400px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.intro-logo img {
    position: relative;
    z-index: 2;
    display: block;
    width: 100%;
    max-width: 400px;
    max-height: 420px;
    object-fit: contain;
}

.logo-decoration {
    position: absolute;
    width: 300px;
    height: 300px;
    border-radius: 50%;
    background: #f8f6e9;
}

.intro-content {
    padding: 0;
}

.intro-label {
    display: inline-block;
    margin-bottom: 16px;
    color: #a28e25;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 2px;
}

.intro-content h2 {
    display: flex;
    align-items: center;
    gap: 13px;
    margin-bottom: 30px;
    color: #111;
    font-family: 'Bricolage Grotesque', sans-serif;
    font-size: clamp(30px, 3vw, 42px);
    font-weight: 800;
    line-height: 1.2;
}

.intro-content p {
    margin-bottom: 20px;
    color: #303030;
    font-size: 15px;
    line-height: 1.85;
}

.intro-content .intro-highlight {
    margin-top: 20px;
    margin-bottom: 30px;
}


/* PELAYANAN KAMI - SATU LAYAR */

#pelayanan {
    scroll-margin-top: 80px;
}

.services-section {
    position: relative;
    width: 100%;
    min-height: calc(100svh - 80px);
    box-sizing: border-box;
    padding: 35px 0 40px;
    display: flex;
    align-items: center;
    overflow: hidden;
    background: #12301e;
}

.services-section::before {
    content: "";
    position: absolute;
    width: 420px;
    height: 420px;
    top: -230px;
    right: -120px;
    border-radius: 50%;
    background: rgba(255,255,255,.045);
}

.services-section::after {
    content: "";
    position: absolute;
    width: 350px;
    height: 350px;
    bottom: -230px;
    left: -100px;
    border-radius: 50%;
    background: rgba(255,255,255,.04);
}

.services-container {
    position: relative;
    z-index: 2;
    width: min(1120px, calc(100% - 50px));
    margin: auto;
}

.services-heading {
    margin-bottom: 32px;
    text-align: center;
}

.services-label {
    display: inline-block;
    margin-bottom: 12px;
    color: #c5d9ca;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 2.5px;
}

.services-heading h2 {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    margin-bottom: 10px;
    color: #fff;
    font-family: 'Bricolage Grotesque', sans-serif;
    font-size: clamp(30px, 4vw, 42px);
    font-weight: 800;
}

.services-heading h2 .title-dot {
    width: 17px;
    height: 17px;
    background: #d9c66b;
}

.services-heading p {
    color: rgba(255,255,255,.78);
    font-size: 14px;
    line-height: 1.6;
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 22px 20px;
}

.service-card {
    min-width: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    color: #fff;
    transition: transform .3s ease;
}

.service-card:hover {
    color: #fff;
    transform: translateY(-6px);
}

.service-icon {
    width: 100%;
    height: 155px;
    margin-bottom: 13px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(255,255,255,.55);
    border-radius: 15px;
    background: #fff;
    color: #1e462e;
    transition: all .35s ease;
}

.service-icon svg {
    width: 82px;
    height: 82px;
    transition: transform .35s ease;
}

.service-card:hover .service-icon {
    background: #eaf2ed;
    border-color: #eaf2ed;
    box-shadow: 0 15px 30px rgba(0,0,0,.15);
}

.service-card:hover .service-icon svg {
    transform: scale(1.1) rotate(-3deg);
}

.service-card h3 {
    margin-bottom: 6px;
    color: #fff;
    font-family: 'Bricolage Grotesque', sans-serif;
    font-size: 17px;
    font-weight: 800;
}

.service-card p {
    min-height: 38px;
    max-width: 240px;
    margin: 0 auto 8px;
    color: rgba(255,255,255,.82);
    font-size: 12px;
    line-height: 1.55;
}

.service-link {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    color: #d9c66b;
    font-size: 11px;
    font-weight: 700;
    transition: .3s ease;
}

.service-card:hover .service-link {
    color: #fff;
}

.service-card-featured {
    grid-column: 2 / 4;
    width: calc(50% - 10px);
    justify-self: center;
}

.service-card-featured .service-icon {
    height: 140px;
}


/* PERANGKAT DESA */

.leadership-section {
    position: relative;
    padding: 85px 0 100px;
    overflow: hidden;
    background: #fff;
}

.leadership-container {
    width: min(1120px, calc(100% - 50px));
    margin: auto;
}

.leadership-heading {
    margin-bottom: 65px;
    text-align: center;
}

.leadership-label,
.location-label {
    display: inline-block;
    margin-bottom: 13px;
    color: #78917e;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 2.5px;
}

.leadership-heading h2,
.location-heading h2 {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 13px;
    color: #12301e;
    font-family: 'Bricolage Grotesque', sans-serif;
    font-size: clamp(27px, 4vw, 40px);
    font-weight: 800;
}

.leadership-heading p,
.location-heading p {
    color: #647268;
    font-size: 14px;
    line-height: 1.7;
}

.leadership-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    align-items: start;
    gap: 45px;
}

.leader-card {
    min-width: 0;
    text-align: center;
}

.leader-card:nth-child(2) {
    margin-top: 55px;
}

.leader-card:nth-child(3) {
    margin-top: 110px;
}

.leader-photo-wrap {
    position: relative;
    width: 100%;
    max-width: 250px;
    height: 235px;
    margin: 0 auto 18px;
}

.leader-decoration {
    position: absolute;
    inset: 0;
    border-radius: 25px;
    background: #1e462e;
    transform: rotate(-14deg) scale(.98);
    transition: transform .4s ease;
}

.leader-photo {
    position: absolute;
    inset: 0;
    overflow: hidden;
    border: 5px solid #d9c66b;
    border-radius: 23px;
    background: #eaf2ed;
    transition: transform .4s ease, box-shadow .4s ease;
}

.leader-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center top;
    transition: transform .5s ease;
}

.leader-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #1e462e;
    background: linear-gradient(145deg, #eaf2ed, #d6e4d9);
    font-size: 48px;
    font-weight: 800;
}

.leader-card:hover .leader-decoration {
    transform: rotate(-8deg) scale(1.04);
}

.leader-card:hover .leader-photo {
    transform: translateY(-5px);
    box-shadow: 0 18px 35px rgba(18,48,30,.13);
}

.leader-card:hover .leader-photo img {
    transform: scale(1.06);
}

.leader-info h3 {
    margin: 0 0 7px;
    color: #17251b;
    font-size: 18px;
    font-weight: 800;
}

.leader-info p {
    margin: 0;
    color: #59675e;
    font-size: 14px;
}


/* LOKASI DESA */

.location-section {
    padding: 85px 0;
    background: #f5f8f5;
}

.location-container {
    width: min(1120px, calc(100% - 50px));
    margin: auto;
}

.location-heading {
    margin-bottom: 40px;
    text-align: center;
}

.location-card {
    display: grid;
    grid-template-columns: 1.7fr .8fr;
    min-height: 410px;
    overflow: hidden;
    border-radius: 18px;
    background: #fff;
    box-shadow: 0 15px 45px rgba(18,48,30,.09);
}

.location-map {
    min-height: 410px;
    overflow: hidden;
    background: #eaf2ed;
}

.location-map iframe {
    display: block;
    width: 100%;
    height: 100%;
    min-height: 410px;
}

.location-info {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
    padding: 40px;
}

.location-icon {
    width: 52px;
    height: 52px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 25px;
    border-radius: 14px;
    color: #1e462e;
    background: #eaf2ed;
    font-size: 32px;
}

.location-subtitle {
    margin-bottom: 10px;
    color: #8b9b8e;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 2px;
}

.location-info h3 {
    margin-bottom: 12px;
    color: #12301e;
    font-size: 27px;
    font-weight: 800;
}

.location-info p {
    margin-bottom: 27px;
    color: #647268;
    font-size: 14px;
    line-height: 1.9;
}

.location-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
    padding: 13px 20px;
    border-radius: 7px;
    color: #fff;
    background: #1e462e;
    font-size: 13px;
    font-weight: 700;
    transition: .3s ease;
}

.location-button:hover {
    color: #fff;
    background: #12301e;
    transform: translateY(-3px);
}


/* ANIMASI */

@keyframes copyEnter {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes sideEnter {
    to {
        opacity: 1;
    }
}

@keyframes progressRun {
    from { width: 0; }
    to { width: 100%; }
}


/* TABLET */

@media (max-width: 1050px) {

    .hero-side {
        display: none;
    }

    .intro-container {
        gap: 40px;
    }

    .intro-logo img {
        max-width: 330px;
    }

    .services-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 20px 15px;
    }

    .service-card-featured {
        grid-column: auto;
        width: 100%;
    }

    .service-icon {
        height: 140px;
    }

    .service-card-featured .service-icon {
        height: 140px;
    }

    .leadership-grid {
        gap: 25px;
    }

    .leader-card:nth-child(2) {
        margin-top: 40px;
    }

    .leader-card:nth-child(3) {
        margin-top: 80px;
    }

    .leader-photo-wrap {
        height: 195px;
    }
}


/* LAYAR KECIL */

@media (max-width: 800px) {

    .village-intro,
    .services-section {
        min-height: auto;
    }

    .village-intro {
        padding: 55px 0;
    }

    .services-section {
        padding: 55px 0;
    }

    .location-card {
        grid-template-columns: 1fr;
    }

    .location-map,
    .location-map iframe {
        min-height: 330px;
    }

    .location-info {
        padding: 30px;
    }
}


/* HP */

@media (max-width: 750px) {

    .manyar-hero {
        height: 100svh;
        min-height: 690px;
    }

    .hero-inner {
        width: calc(100% - 40px);
        padding: 115px 0 120px;
    }

    .hero-copy h1 {
        font-size: clamp(39px, 10vw, 53px);
        letter-spacing: -1.5px;
    }

    .hero-copy p {
        font-size: 13px;
    }

    .eyebrow {
        font-size: 8px;
        letter-spacing: 1.2px;
    }

    .hero-navigation {
        left: 20px;
        bottom: 30px;
        gap: 9px;
    }

    .hero-navigation button {
        width: 37px;
        height: 37px;
    }

    .progress-track {
        width: 55px;
    }

    .hero-scroll {
        display: none;
    }

    .intro-container {
        width: calc(100% - 40px);
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .intro-logo {
        min-height: 230px;
    }

    .intro-logo img {
        max-width: 230px;
        max-height: 240px;
    }

    .logo-decoration {
        width: 190px;
        height: 190px;
    }

    .intro-content h2 {
        font-size: 30px;
        margin-bottom: 18px;
    }

    .intro-content p {
        font-size: 13px;
        line-height: 1.7;
        margin-bottom: 13px;
    }

    .intro-content .intro-highlight {
        margin-bottom: 22px;
    }

    .services-container {
        width: calc(100% - 35px);
    }

    .services-heading {
        margin-bottom: 30px;
    }

    .services-heading p {
        font-size: 13px;
    }

    .services-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 25px 13px;
    }

    .service-icon {
        height: 130px;
        margin-bottom: 12px;
    }

    .service-icon svg {
        width: 65px;
        height: 65px;
    }

    .service-card h3 {
        font-size: 15px;
    }

    .service-card p {
        min-height: 48px;
        font-size: 11px;
    }

    .service-link {
        font-size: 10px;
    }

    .service-card-featured {
        grid-column: 1 / -1;
        width: 55%;
        justify-self: center;
    }

    .leadership-section {
        padding: 65px 0 75px;
    }

    .leadership-container {
        width: calc(100% - 35px);
    }

    .leadership-heading {
        margin-bottom: 45px;
    }

    .leadership-grid {
        grid-template-columns: 1fr;
        gap: 50px;
    }

    .leader-card:nth-child(2),
    .leader-card:nth-child(3) {
        margin-top: 0;
    }

    .leader-photo-wrap {
        width: 250px;
        height: 235px;
    }

    .leader-info h3 {
        font-size: 17px;
    }

    .location-section {
        padding: 65px 0;
    }

    .location-container {
        width: calc(100% - 30px);
    }

    .location-map,
    .location-map iframe {
        min-height: 280px;
    }

    .location-info {
        padding: 25px;
    }
}


/* HP KECIL */

@media (max-width: 400px) {

    .service-icon {
        height: 115px;
    }

    .service-icon svg {
        width: 58px;
        height: 58px;
    }

    .service-card h3 {
        font-size: 14px;
    }

    .service-card p {
        font-size: 10px;
    }
}


/* AKSESIBILITAS */

@media (prefers-reduced-motion: reduce) {

    html {
        scroll-behavior: auto;
    }

    .slide-image img {
        transition: none;
    }
}

</style>
@endpush


{{-- =====================================================
     JAVASCRIPT
===================================================== --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    /* SLIDER */

    const slides = document.querySelectorAll('.manyar-slide');
    const currentLabel = document.getElementById('currentSlide');
    const progressBar = document.getElementById('progressBar');
    const nextButton = document.getElementById('heroNext');
    const prevButton = document.getElementById('heroPrev');

    if (
        slides.length &&
        currentLabel &&
        progressBar &&
        nextButton &&
        prevButton
    ) {
        let current = 0;
        let timer = null;
        const duration = 5000;

        function showSlide(index) {

            slides[current].classList.remove('active');

            current = (index + slides.length) % slides.length;

            slides[current].classList.add('active');

            currentLabel.textContent = String(current + 1).padStart(2, '0');

            progressBar.classList.remove('running');

            void progressBar.offsetWidth;

            progressBar.classList.add('running');
        }

        function restartSlider() {
            clearInterval(timer);

            timer = setInterval(function () {
                showSlide(current + 1);
            }, duration);
        }

        function startSlider() {
            clearInterval(timer);
            showSlide(current);
            restartSlider();
        }

        nextButton.addEventListener('click', function () {
            showSlide(current + 1);
            restartSlider();
        });

        prevButton.addEventListener('click', function () {
            showSlide(current - 1);
            restartSlider();
        });

        document.addEventListener('visibilitychange', function () {
            if (document.hidden) {
                clearInterval(timer);
            } else {
                startSlider();
            }
        });

        startSlider();
    }


    /* NAVIGASI KE SEKILAS DAN PELAYANAN */

    const scrollLinks = document.querySelectorAll(
        'a[href="#sekilas"], a[href="#pelayanan"]'
    );

    scrollLinks.forEach(function (link) {

        link.addEventListener('click', function (event) {

            const targetId = this.getAttribute('href');
            const target = document.querySelector(targetId);

            if (!target) return;

            event.preventDefault();

            const header = document.querySelector('.site-header');
            const headerHeight = header ? header.offsetHeight : 80;

            const targetPosition =
                target.getBoundingClientRect().top +
                window.scrollY -
                headerHeight;

            history.pushState(null, '', targetId);

            window.scrollTo({
                top: Math.max(0, targetPosition),
                behavior: 'smooth'
            });
        });
    });

});
</script>
@endpush
