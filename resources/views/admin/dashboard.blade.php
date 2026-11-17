
@extends('admin.layouts.app')

@section('title', 'Dashboard - Desa Manyar')

@push('styles')
<style>
    .dashboard {
        max-width: 1400px;
        margin: 0 auto;
    }

    /* HEADER */
    .page-heading {
        margin-bottom: 25px;
    }

    .page-heading h2 {
        margin: 0 0 7px;
        color: #1e293b;
        font-size: 25px;
        font-weight: 800;
    }

    .page-heading p {
        margin: 0;
        color: #64748b;
        font-size: 13px;
        line-height: 1.6;
    }

    /* WELCOME PANEL */
    .welcome-panel {
        background: linear-gradient(115deg, #1e462e, #2f6843);
        padding: 30px;
        border-radius: 15px;
        color: white;
        margin-bottom: 28px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(30, 70, 46, .12);
    }

    .welcome-panel::before {
        content: "";
        position: absolute;
        width: 250px;
        height: 250px;
        border: 35px solid rgba(255,255,255,.07);
        border-radius: 50%;
        right: -65px;
        top: -110px;
    }

    .welcome-panel::after {
        content: "";
        position: absolute;
        width: 130px;
        height: 130px;
        border: 20px solid rgba(255,255,255,.05);
        border-radius: 50%;
        right: 120px;
        bottom: -95px;
    }

    .welcome-content {
        position: relative;
        z-index: 1;
    }

    .welcome-label-top {
        display: inline-block;
        margin-bottom: 15px;
        padding: 6px 11px;
        background: rgba(255,255,255,.13);
        border: 1px solid rgba(255,255,255,.2);
        border-radius: 20px;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: .7px;
        text-transform: uppercase;
    }

    .welcome-panel h2 {
        font-size: 24px;
        margin: 0 0 10px;
        font-weight: 800;
    }

    .welcome-panel p {
        color: #e2eee5;
        margin: 0;
        font-size: 13px;
        line-height: 1.8;
        max-width: 580px;
    }

    .welcome-label {
        display: inline-block;
        margin-top: 18px;
        padding: 7px 13px;
        background: rgba(255,255,255,.13);
        border: 1px solid rgba(255,255,255,.18);
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
    }

    /* SECTION */
    .section-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 16px;
    }

    .section-heading h3 {
        font-size: 17px;
        color: #1e293b;
        margin: 0;
        font-weight: 800;
    }

    .section-heading span {
        font-size: 11px;
        color: #94a3b8;
    }

    /* MENU GRID */
    .menu-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 16px;
    }

    .menu-item {
        display: block;
        background: white;
        border: 1px solid #e5e7eb;
        padding: 21px;
        border-radius: 13px;
        text-decoration: none;
        color: #1e293b;
        transition: .2s ease;
        min-height: 180px;
        box-sizing: border-box;
        cursor: pointer;
        box-shadow: 0 2px 8px rgba(15, 23, 42, .025);
    }

    .menu-item:hover {
        transform: translateY(-3px);
        border-color: #a8c5b0;
        box-shadow: 0 8px 20px rgba(30, 70, 46, .08);
        color: #1e293b;
    }

    .menu-symbol {
        width: 44px;
        height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eaf2ed;
        color: #1e462e;
        border-radius: 11px;
        font-size: 20px;
        margin-bottom: 17px;
    }

    .menu-item h4 {
        font-size: 14px;
        margin: 0 0 8px;
        font-weight: 800;
        color: #1e293b;
    }

    .menu-item p {
        color: #64748b;
        font-size: 12px;
        line-height: 1.7;
        margin: 0;
    }

    .menu-link {
        color: #1e462e;
        font-size: 12px;
        font-weight: 700;
        display: inline-block;
        margin-top: 15px;
    }

    .menu-item:hover .menu-link {
        color: #2f6843;
    }

    /* ACCOUNT PANEL */
    .account-panel {
        margin-top: 25px;
        padding: 22px;
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 13px;
        box-shadow: 0 2px 8px rgba(15, 23, 42, .025);
    }

    .account-panel h3 {
        margin: 0 0 18px;
        font-size: 15px;
        color: #1e293b;
        font-weight: 800;
    }

    .account-info {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 20px;
    }

    .account-info small {
        display: block;
        color: #94a3b8;
        margin-bottom: 7px;
        font-size: 11px;
    }

    .account-info strong {
        font-size: 13px;
        color: #334155;
        font-weight: 700;
        word-break: break-word;
    }

    /* RESPONSIVE */
    @media (max-width: 900px) {
        .menu-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .account-info {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 550px) {
        .menu-grid {
            grid-template-columns: 1fr;
        }

        .welcome-panel {
            padding: 23px;
        }

        .welcome-panel h2 {
            font-size: 20px;
        }

        .page-heading h2 {
            font-size: 22px;
        }

        .menu-item {
            min-height: auto;
        }

        .account-info {
            grid-template-columns: 1fr;
            gap: 17px;
        }
    }
</style>
@endpush

@section('content')

<div class="dashboard">

    {{-- HEADER HALAMAN --}}
    <div class="page-heading">
        <h2>Dashboard</h2>
        <p>Ringkasan dan pusat pengelolaan Website Desa Manyar.</p>
    </div>

    {{-- WELCOME PANEL --}}
    <section class="welcome-panel">

        <div class="welcome-content">

            <span class="welcome-label-top">
                Panel Administrasi Desa
            </span>

            <h2>
                Selamat Datang, {{ auth()->user()->name }}
            </h2>

            <p>
                Selamat bekerja di Panel Administrasi Desa Manyar.
                Kelola berita, informasi, agenda, dan dokumentasi desa
                melalui satu tempat dengan mudah dan terintegrasi.
            </p>

            <span class="welcome-label">
                Hak Akses: {{ ucfirst(auth()->user()->role) }}
            </span>

        </div>

    </section>

    {{-- MENU PENGELOLAAN --}}
    <div class="section-heading">
        <h3>Pengelolaan Website</h3>
        <span>Menu administrasi</span>
    </div>

    <div class="menu-grid">

        {{-- BERITA DESA --}}
        <a href="{{ route('admin.news.index') }}" class="menu-item">

            <div class="menu-symbol">▤</div>

            <h4>Berita Desa</h4>

            <p>
                Kelola berita, artikel, informasi, dan publikasi
                terbaru Desa Manyar.
            </p>

            <span class="menu-link">Kelola berita →</span>

        </a>

        {{-- PENGUMUMAN --}}
        <a href="{{ route('admin.announcements.index') }}" class="menu-item">

            <div class="menu-symbol">▣</div>

            <h4>Pengumuman</h4>

            <p>
                Kelola informasi dan pengumuman resmi
                untuk masyarakat desa.
            </p>

            <span class="menu-link">Kelola pengumuman →</span>

        </a>

        {{-- AGENDA --}}
        <a href="{{ route('admin.agendas.index') }}" class="menu-item">

            <div class="menu-symbol">▦</div>

            <h4>Agenda Kegiatan</h4>

            <p>
                Kelola jadwal kegiatan dan agenda
                pemerintahan Desa Manyar.
            </p>

            <span class="menu-link">Kelola agenda →</span>

        </a>

        {{-- GALERI --}}
        <a href="{{ route('admin.galleries.index') }}" class="menu-item">

            <div class="menu-symbol">▧</div>

            <h4>Galeri Desa</h4>

            <p>
                Kelola foto dokumentasi kegiatan
                dan aktivitas masyarakat desa.
            </p>

            <span class="menu-link">Kelola galeri →</span>

        </a>

        {{-- LAYANAN SURAT --}}
        <a href="{{ route('admin.documents.index') }}" class="menu-item">

            <div class="menu-symbol">▤</div>

            <h4>Layanan Surat</h4>

            <p>
                Kelola informasi persyaratan dan dokumen
                pelayanan administrasi desa.
            </p>

            <span class="menu-link">Kelola dokumen →</span>

        </a>

        {{-- WEBSITE PUBLIK --}}
        <a href="{{ route('home') }}"
           target="_blank"
           rel="noopener noreferrer"
           class="menu-item">

            <div class="menu-symbol">◎</div>

            <h4>Website Publik</h4>

            <p>
                Lihat tampilan website Desa Manyar
                dari sisi pengunjung.
            </p>

            <span class="menu-link">Buka website →</span>

        </a>

    </div>

    {{-- INFORMASI AKUN --}}
    <section class="account-panel">

        <h3>Informasi Akun</h3>

        <div class="account-info">

            <div>
                <small>Nama Pengguna</small>
                <strong>{{ auth()->user()->name }}</strong>
            </div>

            <div>
                <small>Email</small>
                <strong>{{ auth()->user()->email }}</strong>
            </div>

            <div>
                <small>Hak Akses</small>
                <strong>{{ ucfirst(auth()->user()->role) }}</strong>
            </div>

        </div>

    </section>

</div>

@endsection
