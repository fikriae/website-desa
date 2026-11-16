
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Desa Manyar')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --primary: #1e40af;
            --primary-light: #eff6ff;
            --dark: #172554;
            --text: #334155;
            --muted: #64748b;
            --border: #e2e8f0;
            --background: #f5f7fb;
            --header-height: 72px;
            --sidebar-width: 250px;
        }

        body {
            margin: 0;
            font-family: Inter, "Segoe UI", Arial, sans-serif;
            background: var(--background);
            color: var(--text);
        }

        /* HEADER */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: var(--header-height);
            z-index: 1000;
            background: white;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            background: var(--primary);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            font-weight: 800;
        }

        .brand-name {
            font-size: 17px;
            font-weight: 800;
            color: var(--dark);
            letter-spacing: .5px;
        }

        .brand-caption {
            font-size: 11px;
            color: var(--muted);
            margin-top: 3px;
        }

        .header-user {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: var(--primary-light);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .user-name {
            font-size: 13px;
            font-weight: 700;
            color: var(--dark);
        }

        .user-role {
            font-size: 11px;
            color: var(--muted);
            margin-top: 3px;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            top: var(--header-height);
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            background: white;
            border-right: 1px solid var(--border);
            padding: 25px 16px;
            overflow-y: auto;
            z-index: 900;
        }

        .sidebar-label {
            font-size: 10px;
            font-weight: 800;
            color: #94a3b8;
            letter-spacing: 1.2px;
            padding: 0 12px;
            margin: 10px 0 13px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            margin-bottom: 5px;
            border-radius: 9px;
            text-decoration: none;
            color: #64748b;
            font-size: 13px;
            font-weight: 600;
            transition: .2s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: var(--primary-light);
            color: var(--primary);
        }

        .sidebar-icon {
            width: 20px;
            text-align: center;
            font-size: 17px;
        }

        .sidebar-bottom {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
        }

        .logout-button {
            width: 100%;
            padding: 12px 14px;
            border: 0;
            border-radius: 9px;
            background: #fff1f2;
            color: #e11d48;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            text-align: left;
        }

        .logout-button:hover {
            background: #ffe4e6;
        }

        /* MAIN CONTENT */
        .main {
            margin-left: var(--sidebar-width);
            padding: calc(var(--header-height) + 30px) 30px 35px;
            min-height: 100vh;
        }

        .container {
            width: 100%;
        }

        .card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 13px;
            padding: 22px;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-warning {
            background: #fef3c7;
            color: #92400e;
        }

        .btn-danger {
            background: #fee2e2;
            color: #b91c1c;
        }

        .btn-secondary {
            background: #e2e8f0;
            color: #334155;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 14px;
            border-bottom: 1px solid var(--border);
            text-align: left;
            font-size: 13px;
        }

        .table th {
            background: #f8fafc;
            color: #64748b;
            font-weight: 700;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 9px;
            margin-bottom: 18px;
            background: #dcfce7;
            color: #166534;
        }

        @media (max-width: 768px) {
            :root {
                --header-height: 64px;
            }

            .navbar {
                padding: 0 16px;
            }

            .brand-name {
                font-size: 14px;
            }

            .sidebar {
                position: fixed;
                top: var(--header-height);
                bottom: 0;
                width: 72px;
                padding: 15px 9px;
            }

            .sidebar-label,
            .sidebar-text,
            .logout-text {
                display: none;
            }

            .sidebar a {
                justify-content: center;
                padding: 13px 5px;
            }

            .sidebar-icon {
                font-size: 19px;
            }

            .logout-button {
                text-align: center;
                padding: 13px 5px;
            }

            .main {
                margin-left: 72px;
                padding: calc(var(--header-height) + 20px) 14px 25px;
            }

            .user-name {
                font-size: 11px;
            }

            .user-role {
                font-size: 10px;
            }
        }

        @media (max-width: 420px) {
            .header-user {
                gap: 7px;
            }

            .user-avatar {
                width: 32px;
                height: 32px;
            }

            .brand-logo {
                width: 36px;
                height: 36px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    {{-- HEADER --}}
    <header class="navbar">

        <div class="brand">
            <div class="brand-logo">M</div>

            <div>
                <div class="brand-name">DESA MANYAR</div>
                <div class="brand-caption">Sistem Informasi Desa</div>
            </div>
        </div>

        <div class="header-user">
            <div class="user-avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            <div>
                <div class="user-name">
                    {{ auth()->user()->name }}
                </div>

                <div class="user-role">
                    {{ ucfirst(auth()->user()->role) }}
                </div>
            </div>
        </div>

    </header>

    {{-- SIDEBAR --}}
    <aside class="sidebar">

        <div class="sidebar-label">MENU UTAMA</div>

        <a href="{{ route('admin.dashboard') }}"
           class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <span class="sidebar-icon">▦</span>
            <span class="sidebar-text">Dashboard</span>
        </a>

        <a href="{{ route('admin.news.index') }}"
           class="{{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
            <span class="sidebar-icon">▤</span>
            <span class="sidebar-text">Berita Desa</span>
        </a>

        <a href="#">
            <span class="sidebar-icon">▣</span>
            <span class="sidebar-text">Pengumuman</span>
        </a>

        <a href="#">
            <span class="sidebar-icon">▦</span>
            <span class="sidebar-text">Agenda Kegiatan</span>
        </a>

        <a href="#">
            <span class="sidebar-icon">▧</span>
            <span class="sidebar-text">Galeri Desa</span>
        </a>

        <a href="#">
            <span class="sidebar-icon">▤</span>
            <span class="sidebar-text">Layanan Surat</span>
        </a>

        <div class="sidebar-label" style="margin-top:30px;">
            WEBSITE
        </div>

        <a href="{{ route('home') }}" target="_blank">
            <span class="sidebar-icon">◎</span>
            <span class="sidebar-text">Lihat Website</span>
        </a>

        <div class="sidebar-bottom">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf

                <button type="submit" class="logout-button">
                    <span class="sidebar-icon">↪</span>
                    <span class="logout-text">Keluar</span>
                </button>
            </form>
        </div>

    </aside>

    {{-- KONTEN --}}
    <main class="main">
        @yield('content')
    </main>

    @stack('scripts')

</body>
</html>
