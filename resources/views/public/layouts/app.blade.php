
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#1e462e">

    <title>@yield('title', 'Website Resmi Desa Manyar')</title>

    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="{{ asset('images/manyar.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@400;500;600;700;800&family=Figtree:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome untuk ikon media sosial -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --green-dark: #12301e;
            --green: #1e462e;
            --green-light: #2a5c3f;
            --green-soft: #eaf2ed;
            --background: #f5f7f5;
            --white: #fff;
            --text: #26352c;
            --muted: #718078;
            --header-height: 82px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 100px;
            overflow-x: hidden;
            overscroll-behavior-y: none;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        html::-webkit-scrollbar,
        body::-webkit-scrollbar {
            display: none;
            width: 0;
            height: 0;
        }

        body {
            min-height: 100vh;
            width: 100%;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
            background: var(--background);
            color: var(--text);
            font-family: 'Figtree', sans-serif;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button {
            font-family: inherit;
        }

        /* HEADER */

        .site-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 99999;
            width: 100%;
            height: var(--header-height);
            background: rgba(255,255,255,.97);
            border-bottom: 1px solid rgba(30,70,46,.08);
            box-shadow: 0 3px 20px rgba(0,0,0,.035);
            transition: background .3s ease, box-shadow .3s ease;
        }

        .site-header.scrolled {
            background: rgba(255,255,255,.98);
            box-shadow: 0 5px 25px rgba(0,0,0,.09);
        }

        .header-container {
            width: min(1200px, calc(100% - 44px));
            height: 100%;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
        }

        .brand {
            display: flex;
            align-items: center;
            flex-shrink: 0;
        }

        .brand img {
            display: block;
            width: 155px;
            height: 53px;
            object-fit: contain;
            object-position: left center;
        }

        .brand-fallback {
            display: none;
            color: var(--green);
            font-family: 'Bricolage Grotesque', sans-serif;
            font-size: 21px;
            font-weight: 800;
        }

        .nav-wrapper {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex: 1;
        }

        .main-nav {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 5px;
            list-style: none;
        }

        .main-nav a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 13px 14px;
            border-radius: 10px;
            color: #4b5b51;
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
            transition: all .25s ease;
        }

        .main-nav a:hover,
        .main-nav a.active {
            background: var(--green-soft);
            color: var(--green);
        }

        .main-nav .nav-cta {
            margin-left: 8px;
            padding: 14px 18px;
            color: #fff;
            background: var(--green);
        }

        .main-nav .nav-cta:hover {
            color: #fff;
            background: var(--green-dark);
            transform: translateY(-2px);
        }

        /* HAMBURGER */

        .menu-toggle {
            width: 43px;
            height: 43px;
            display: none;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 6px;
            border: none;
            border-radius: 12px;
            background: var(--green-soft);
            cursor: pointer;
            flex-shrink: 0;
        }

        .menu-toggle span {
            width: 21px;
            height: 2px;
            display: block;
            background: var(--green);
            border-radius: 10px;
            transition: all .3s ease;
        }

        .menu-toggle.active span:nth-child(1) {
            transform: translateY(8px) rotate(45deg);
        }

        .menu-toggle.active span:nth-child(2) {
            opacity: 0;
        }

        .menu-toggle.active span:nth-child(3) {
            transform: translateY(-8px) rotate(-45deg);
        }

        /* MAIN */

        main {
            position: relative;
            flex: 1 0 auto;
            width: 100%;
            min-height: 65vh;
            padding-top: var(--header-height);
            overflow: visible;
        }

        /* FOOTER */

        .site-footer {
            position: relative;
            flex: 0 0 auto;
            width: 100%;
            margin-top: auto;
            overflow: hidden;
            color: #e8f0ea;
            background: var(--green-dark);
        }

        .footer-container {
            width: min(1200px, calc(100% - 44px));
            margin: auto;
            padding: 55px 0 35px;
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1fr;
            gap: 40px;
        }

        .footer-brand h3 {
            margin-bottom: 15px;
            color: #fff;
            font-family: 'Bricolage Grotesque', sans-serif;
            font-size: 25px;
            font-weight: 800;
        }

        .footer-brand p {
            max-width: 380px;
            color: rgba(255,255,255,.68);
            font-size: 14px;
            line-height: 1.9;
        }

        .footer-column h4 {
            margin-bottom: 20px;
            color: #fff;
            font-family: 'Bricolage Grotesque', sans-serif;
            font-size: 16px;
        }

        .footer-column ul {
            display: flex;
            flex-direction: column;
            gap: 13px;
            list-style: none;
        }

        .footer-column a {
            color: rgba(255,255,255,.68);
            font-size: 14px;
            transition: .25s ease;
        }

        .footer-column a:hover {
            color: #fff;
            padding-left: 5px;
        }

        /* MEDIA SOSIAL */

        .footer-social {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .footer-social h4 {
            margin-bottom: 2px;
            color: #fff;
            font-family: 'Bricolage Grotesque', sans-serif;
            font-size: 16px;
        }

        .footer-social p {
            color: rgba(255,255,255,.62);
            font-size: 13px;
            line-height: 1.7;
        }

        .social-links {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .social-links a {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255,255,255,.2);
            border-radius: 12px;
            color: #fff;
            background: rgba(255,255,255,.07);
            font-size: 17px;
            transition: all .3s ease;
        }

        .social-links a:hover {
            color: var(--green-dark);
            background: #e5ce91;
            border-color: #e5ce91;
            transform: translateY(-4px);
        }

        .footer-bottom {
            width: min(1200px, calc(100% - 44px));
            margin: auto;
            padding: 22px 0;
            border-top: 1px solid rgba(255,255,255,.12);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .footer-bottom p {
            color: rgba(255,255,255,.55);
            font-size: 12px;
        }

        /* RESPONSIVE */

        @media (max-width: 1050px) {
            :root {
                --header-height: 75px;
            }

            .header-container {
                width: calc(100% - 35px);
            }

            .brand img {
                width: 145px;
                height: 48px;
            }

            .menu-toggle {
                display: flex;
            }

            .nav-wrapper {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                width: 100%;
                max-height: calc(100vh - var(--header-height));
                display: block;
                padding: 12px 18px 20px;
                background: #fff;
                border-bottom: 1px solid rgba(30,70,46,.1);
                box-shadow: 0 15px 25px rgba(0,0,0,.08);
                opacity: 0;
                visibility: hidden;
                pointer-events: none;
                transform: translateY(-10px);
                overflow-y: auto;
                transition: .25s ease;
                scrollbar-width: none;
            }

            .nav-wrapper::-webkit-scrollbar {
                display: none;
            }

            .nav-wrapper.open {
                opacity: 1;
                visibility: visible;
                pointer-events: auto;
                transform: translateY(0);
            }

            .main-nav {
                width: 100%;
                display: flex;
                flex-direction: column;
                align-items: stretch;
                gap: 5px;
            }

            .main-nav a {
                width: 100%;
                justify-content: flex-start;
                padding: 14px 17px;
            }

            .main-nav .nav-cta {
                margin: 7px 0 0;
                justify-content: center;
            }

            .footer-container {
                grid-template-columns: 1fr 1fr;
                gap: 35px;
            }

            .footer-brand {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 600px) {
            :root {
                --header-height: 70px;
            }

            .header-container {
                width: calc(100% - 30px);
            }

            .brand img {
                width: 135px;
                height: 45px;
            }

            .footer-container {
                width: calc(100% - 36px);
                padding: 42px 0 30px;
                grid-template-columns: 1fr 1fr;
                gap: 30px 20px;
            }

            .footer-brand {
                grid-column: 1 / -1;
            }

            .footer-social {
                grid-column: 1 / -1;
            }

            .footer-bottom {
                width: calc(100% - 36px);
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

<header class="site-header" id="siteHeader">
    <div class="header-container">

        <a href="{{ route('home') }}" class="brand">
            <img
                src="{{ asset('images/manyar.png') }}"
                alt="Logo Desa Manyar"
                onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
            >
            <span class="brand-fallback">DESA MANYAR</span>
        </a>

        <button
            type="button"
            class="menu-toggle"
            id="menuToggle"
            aria-label="Buka menu navigasi"
            aria-expanded="false"
            aria-controls="mainNavigation"
        >
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="nav-wrapper" id="mainNavigation">
            <ul class="main-nav">

                <li>
                    <a href="{{ route('home') }}"
                       class="{{ request()->routeIs('home') ? 'active' : '' }}">
                        Beranda
                    </a>
                </li>

                <li>
                    <a href="{{ url('/pengumuman') }}"
                       class="{{ request()->is('pengumuman*') ? 'active' : '' }}">
                        Pengumuman
                    </a>
                </li>

                <li>
                    <a href="{{ url('/agenda') }}"
                       class="{{ request()->is('agenda*') ? 'active' : '' }}">
                        Agenda
                    </a>
                </li>

                <li>
                    <a href="{{ route('public.news.index') }}"
                       class="{{ request()->routeIs('public.news.*') ? 'active' : '' }}">
                        Berita
                    </a>
                </li>

                <li>
                    <a href="{{ url('/galeri') }}"
                       class="{{ request()->is('galeri*') ? 'active' : '' }}">
                        Galeri
                    </a>
                </li>

                <li>
                    <a href="{{ url('/kontak') }}"
                       class="{{ request()->is('kontak*') ? 'active' : '' }}">
                        Kontak
                    </a>
                </li>

                <li>
                    <a href="{{ url('/layanan-surat') }}"
                       class="nav-cta {{ request()->is('layanan-surat*') ? 'active' : '' }}">
                        Layanan Surat
                    </a>
                </li>

            </ul>
        </nav>

    </div>
</header>

<main>
    @yield('content')
</main>

<footer class="site-footer">

    <div class="footer-container">

        <div class="footer-brand">
            <h3>Desa Manyar</h3>
            <p>
                Website resmi Desa Manyar sebagai media informasi,
                publikasi kegiatan, dan pelayanan masyarakat secara
                digital.
            </p>
        </div>

        <div class="footer-column">
            <h4>Informasi</h4>
            <ul>
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li><a href="{{ url('/pengumuman') }}">Pengumuman</a></li>
                <li><a href="{{ url('/agenda') }}">Agenda Desa</a></li>
                <li><a href="{{ route('public.news.index') }}">Berita Desa</a></li>
                <li><a href="{{ url('/galeri') }}">Galeri</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h4>Layanan</h4>
            <ul>
                <li><a href="{{ url('/layanan-surat') }}">Layanan Surat</a></li>
                <li><a href="{{ url('/kontak') }}">Hubungi Kami</a></li>
            </ul>
        </div>

        <!-- MEDIA SOSIAL -->
        <div class="footer-social">
            <h4>Ikuti Media Sosial</h4>

            <p>
                Dapatkan informasi dan perkembangan terbaru
                Desa Manyar melalui media sosial kami.
            </p>

            <div class="social-links">

                <!-- INSTAGRAM -->
                <a href="https://www.instagram.com/pemdesmanyar?lqvp=ajExZWxjZjljZXJm"
                   target="_blank"
                   rel="noopener noreferrer"
                   aria-label="Instagram Desa Manyar"
                   title="Instagram">
                    <i class="fa-brands fa-instagram"></i>
                </a>

                <!-- FACEBOOK -->
                <a href="https://www.facebook.com/share/1Fja3avFK1/"
                   target="_blank"
                   rel="noopener noreferrer"
                   aria-label="Facebook Desa Manyar"
                   title="Facebook">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>

            </div>
        </div>

    </div>

    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} Pemerintah Desa Manyar. Hak Cipta Dilindungi.</p>
        <p>Website Resmi Desa Manyar</p>
    </div>

</footer>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const header = document.getElementById('siteHeader');
    const toggle = document.getElementById('menuToggle');
    const navigation = document.getElementById('mainNavigation');

    function handleScroll() {
        header.classList.toggle('scrolled', window.scrollY > 20);
    }

    function closeMenu() {
        navigation.classList.remove('open');
        toggle.classList.remove('active');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.setAttribute('aria-label', 'Buka menu navigasi');
    }

    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll();

    toggle.addEventListener('click', function () {
        const opened = navigation.classList.toggle('open');

        toggle.classList.toggle('active', opened);
        toggle.setAttribute('aria-expanded', String(opened));
        toggle.setAttribute(
            'aria-label',
            opened ? 'Tutup menu navigasi' : 'Buka menu navigasi'
        );
    });

    navigation.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', closeMenu);
    });

    document.addEventListener('click', function (event) {
        if (!header.contains(event.target)) {
            closeMenu();
        }
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') closeMenu();
    });

    window.addEventListener('resize', function () {
        if (window.innerWidth > 1050) closeMenu();
    });

});
</script>

@stack('scripts')

</body>
</html>
