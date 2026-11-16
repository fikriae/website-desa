
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Website Resmi Desa Manyar')</title>

    <meta name="description" content="Website resmi Pemerintah Desa Manyar. Informasi berita, pengumuman, agenda, profil, dan layanan masyarakat.">

    <meta name="theme-color" content="#ffffff">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 120px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f8fafc;
            color: #1e293b;
            line-height: 1.6;
        }

        a {
            -webkit-tap-highlight-color: transparent;
        }

        .container {
            width: 88%;
            max-width: 1200px;
            margin: auto;
        }

        /* HEADER */

        header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, .97);
            border-bottom: 1px solid #e5eaf2;
            box-shadow: 0 3px 15px rgba(15, 23, 42, .04);
            backdrop-filter: blur(12px);
        }

        .header-top {
            min-height: 88px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .brand-logo {
            width: 53px;
            height: 53px;
            flex-shrink: 0;
            object-fit: contain;
        }

        .brand {
            color: #1e40af;
            font-size: 23px;
            font-weight: 800;
            letter-spacing: .5px;
            line-height: 1.3;
        }

        .brand-subtitle {
            color: #64748b;
            font-size: 12px;
            margin-top: 3px;
        }

        /* NAVIGATION */

        .nav-wrapper {
            border-top: 1px solid #f1f5f9;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 30px;
            min-height: 53px;
        }

        nav a {
            position: relative;
            display: flex;
            align-items: center;
            min-height: 53px;
            color: #475569;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
            transition: color .2s ease;
        }

        nav a::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 3px;
            background: #2563eb;
            border-radius: 5px 5px 0 0;
            transform: scaleX(0);
            transition: transform .2s ease;
        }

        nav a:hover,
        nav a.active {
            color: #2563eb;
        }

        nav a:hover::after,
        nav a.active::after {
            transform: scaleX(1);
        }

        /* MAIN CONTENT */

        main {
            min-height: 65vh;
        }

        /* FOOTER */

        footer {
            background: #10213f;
            color: #fff;
            padding: 45px 0 20px;
            margin-top: 35px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 40px;
            padding-bottom: 30px;
        }

        .footer-brand {
            font-size: 19px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .footer-description {
            color: #cbd5e1;
            font-size: 13px;
            line-height: 1.8;
            max-width: 430px;
        }

        .footer-heading {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .footer-links {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .footer-links a {
            color: #cbd5e1;
            font-size: 13px;
            text-decoration: none;
        }

        .footer-links a:hover {
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,.12);
            padding-top: 18px;
            color: #94a3b8;
            font-size: 12px;
            text-align: center;
        }

        /* RESPONSIVE */

        @media (max-width: 768px) {
            .container {
                width: 92%;
            }

            .header-top {
                min-height: 75px;
            }

            .brand-logo {
                width: 45px;
                height: 45px;
            }

            .brand {
                font-size: 19px;
            }

            .brand-subtitle {
                font-size: 10px;
            }

            .nav-wrapper {
                overflow-x: auto;
                scrollbar-width: none;
            }

            .nav-wrapper::-webkit-scrollbar {
                display: none;
            }

            nav {
                width: max-content;
                min-width: 100%;
                gap: 22px;
                min-height: 47px;
            }

            nav a {
                min-height: 47px;
                font-size: 12px;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 25px;
            }
        }

        @media (max-width: 380px) {
            .brand {
                font-size: 17px;
            }

            .brand-subtitle {
                font-size: 9px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <header>
        <div class="container">

            <div class="header-top">

                {{-- Logo akan tampil jika file tersedia --}}
                @if (file_exists(public_path('images/logo.png')))
                    <img
                        src="{{ asset('images/logo.png') }}"
                        alt="Logo Desa Manyar"
                        class="brand-logo"
                    >
                @endif

                <div>
                    <div class="brand">DESA MANYAR</div>

                    <div class="brand-subtitle">
                        Website Resmi Pemerintah Desa Manyar
                    </div>
                </div>

            </div>

            <div class="nav-wrapper">
                <nav>

                    <a
                        href="{{ route('home') }}"
                        class="{{ request()->routeIs('home') ? 'active' : '' }}"
                    >
                        Beranda
                    </a>

                    <a href="/pengumuman">
                        Pengumuman
                    </a>

                    <a href="/agenda">
                        Agenda
                    </a>

                    <a
                        href="{{ route('public.news.index') }}"
                        class="{{ request()->routeIs('public.news.*') ? 'active' : '' }}"
                    >
                        Berita
                    </a>

                    <a href="/galeri">
                        Galeri
                    </a>

                    <a href="/layanan-surat">
                        Layanan Surat
                    </a>

                    <a href="/kontak">
                        Kontak
                    </a>

                </nav>
            </div>

        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container">

            <div class="footer-content">

                <div>
                    <div class="footer-brand">
                        PEMERINTAH DESA MANYAR
                    </div>

                    <p class="footer-description">
                        Website resmi Pemerintah Desa Manyar sebagai
                        media informasi, publikasi kegiatan, dan pelayanan
                        kepada masyarakat.
                    </p>
                </div>

                <div>
                    <div class="footer-heading">
                        MENU WEBSITE
                    </div>

                    <div class="footer-links">
                        <a href="{{ route('home') }}">Beranda</a>
                        <a href="{{ route('public.news.index') }}">Berita</a>
                        <a href="/pengumuman">Pengumuman</a>
                        <a href="/layanan-surat">Layanan Surat</a>
                    </div>
                </div>

            </div>

            <div class="footer-bottom">
                &copy; {{ date('Y') }} Pemerintah Desa Manyar.
                Hak Cipta Dilindungi.
            </div>

        </div>
    </footer>

    @stack('scripts')

</body>
</html>
