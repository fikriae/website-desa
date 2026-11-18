
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Desa Manyar')</title>

    {{-- FAVICON --}}
    <link rel="icon" type="image/png" href="{{ asset('images/manyar.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #1e462e;
            --primary-light: #eaf2ed;
            --sidebar-width: 250px;
            --header-height: 76px;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f5f7fb;
            color: #1e293b;
        }

        /* HEADER */
        .admin-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: var(--header-height);
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            z-index: 1000;
        }

        .header-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: var(--primary);
        }

        .header-brand img {
            width: 48px;
            height: 48px;
            object-fit: contain;
        }

        .header-brand-text {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .header-brand-text strong {
            font-size: 16px;
            font-weight: 800;
            letter-spacing: .5px;
        }

        .header-brand-text span {
            font-size: 11px;
            color: #64748b;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .admin-user {
            font-size: 13px;
            color: #475569;
            font-weight: 600;
        }

        .mobile-toggle {
            display: none;
            border: none;
            background: var(--primary-light);
            color: var(--primary);
            padding: 9px 12px;
            border-radius: 8px;
            font-size: 20px;
            cursor: pointer;
        }

        /* SIDEBAR */
        .admin-sidebar {
            position: fixed;
            top: var(--header-height);
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            background: #fff;
            border-right: 1px solid #e5e7eb;
            padding: 22px 15px;
            overflow-y: auto;
            z-index: 900;
        }

        .sidebar-label {
            padding: 10px 13px;
            font-size: 10px;
            font-weight: 800;
            color: #94a3b8;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            color: #64748b;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            border-radius: 9px;
            transition: .2s;
        }

        .sidebar-menu a:hover {
            background: #f1f5f9;
            color: var(--primary);
        }

        .sidebar-menu a.active {
            background: var(--primary-light);
            color: var(--primary);
            font-weight: 700;
        }

        .menu-icon {
            width: 20px;
            text-align: center;
            font-size: 17px;
        }

        .sidebar-bottom {
            margin-top: 25px;
            padding-top: 18px;
            border-top: 1px solid #edf0f2;
        }

        .logout-button {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border: none;
            background: transparent;
            color: #dc2626;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            border-radius: 9px;
            cursor: pointer;
            text-align: left;
        }

        .logout-button:hover {
            background: #fef2f2;
        }

        /* MAIN CONTENT */
        .admin-main {
            margin-left: var(--sidebar-width);
            padding: calc(var(--header-height) + 28px) 28px 35px;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* COMPONENT UMUM */
        .card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 13px;
            padding: 22px;
            box-shadow: 0 2px 8px rgba(15, 23, 42, .03);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            background: var(--primary);
            color: #fff;
            text-decoration: none;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn:hover {
            opacity: .9;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 13px 15px;
            border-bottom: 1px solid #edf0f2;
            text-align: left;
            font-size: 13px;
        }

        .table th {
            background: #f8fafc;
            color: #64748b;
            font-weight: 700;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .alert-success {
            background: #ecfdf5;
            color: #047857;
        }

        .alert-danger {
            background: #fef2f2;
            color: #b91c1c;
        }

        /* MOBILE */
        .sidebar-overlay {
            display: none;
        }

        @media (max-width: 768px) {
            .admin-header {
                padding: 0 16px;
            }

            .header-brand img {
                width: 40px;
                height: 40px;
            }

            .header-brand-text strong {
                font-size: 13px;
            }

            .header-brand-text span {
                font-size: 10px;
            }

            .admin-user {
                display: none;
            }

            .mobile-toggle {
                display: block;
            }

            .admin-sidebar {
                transform: translateX(-100%);
                transition: transform .25s ease;
                width: 260px;
            }

            .admin-sidebar.show {
                transform: translateX(0);
            }

            .sidebar-overlay.show {
                display: block;
                position: fixed;
                inset: var(--header-height) 0 0;
                background: rgba(15, 23, 42, .4);
                z-index: 850;
            }

            .admin-main {
                margin-left: 0;
                padding: calc(var(--header-height) + 20px) 15px 25px;
            }

            .card {
                padding: 16px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <!-- HEADER -->
    <header class="admin-header">

        <a href="{{ route('admin.dashboard') }}" class="header-brand">

            <img src="{{ asset('images/logo.jpeg') }}" alt="Logo Desa Manyar">

            <div class="header-brand-text">
                <strong>DESA MANYAR</strong>
                <span>Panel Administrasi Desa</span>
            </div>

        </a>

        <div class="header-right">

            <span class="admin-user">
                {{ auth()->user()->name ?? 'Administrator' }}
            </span>

            <button type="button" class="mobile-toggle" id="mobileToggle">
                ☰
            </button>

        </div>

    </header>

    <!-- SIDEBAR -->
    <aside class="admin-sidebar" id="adminSidebar">

        <div class="sidebar-label">Menu Utama</div>

        <nav class="sidebar-menu">

            <a href="{{ route('admin.dashboard') }}"
               class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <span class="menu-icon">⌂</span>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.news.index') }}"
               class="{{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                <span class="menu-icon">▤</span>
                <span>Berita Desa</span>
            </a>

            <a href="{{ route('admin.announcements.index') }}"
               class="{{ request()->routeIs('admin.announcements.*') ? 'active' : '' }}">
                <span class="menu-icon">◉</span>
                <span>Pengumuman</span>
            </a>

            <a href="{{ route('admin.agendas.index') }}"
               class="{{ request()->routeIs('admin.agendas.*') ? 'active' : '' }}">
                <span class="menu-icon">▦</span>
                <span>Agenda Kegiatan</span>
            </a>

            <a href="{{ route('admin.galleries.index') }}"
               class="{{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                <span class="menu-icon">▧</span>
                <span>Galeri Desa</span>
            </a>

            <a href="{{ route('admin.documents.index') }}"
               class="{{ request()->routeIs('admin.documents.*') ? 'active' : '' }}">
                <span class="menu-icon">▣</span>
                <span>Layanan Surat</span>
            </a>

        </nav>

        <div class="sidebar-label">Lainnya</div>

        <nav class="sidebar-menu">

            <a href="{{ route('home') }}" target="_blank" rel="noopener noreferrer">
                <span class="menu-icon">↗</span>
                <span>Website Publik</span>
            </a>

        </nav>

        <div class="sidebar-bottom">

            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf

                <button type="submit" class="logout-button">
                    <span class="menu-icon">⇥</span>
                    <span>Keluar</span>
                </button>
            </form>

        </div>

    </aside>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- KONTEN HALAMAN -->
    <main class="admin-main">

        <div class="container">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')

        </div>

    </main>

    <!-- SCRIPT SIDEBAR MOBILE -->
    <script>
        const mobileToggle = document.getElementById('mobileToggle');
        const adminSidebar = document.getElementById('adminSidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        function toggleSidebar() {
            adminSidebar.classList.toggle('show');
            sidebarOverlay.classList.toggle('show');
        }

        mobileToggle.addEventListener('click', toggleSidebar);
        sidebarOverlay.addEventListener('click', toggleSidebar);
    </script>

    @stack('scripts')

</body>
</html>
