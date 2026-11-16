
@extends('admin.layouts.app')

@section('title', 'Dashboard - Desa Manyar')

@section('content')

<style>
    .dashboard {
        max-width: 1250px;
        margin: auto;
    }

    .page-heading {
        margin-bottom: 25px;
    }

    .page-heading h2 {
        margin: 0 0 7px;
        color: #172554;
        font-size: 24px;
        font-weight: 750;
    }

    .page-heading p {
        margin: 0;
        color: #64748b;
        font-size: 13px;
    }

    .welcome-panel {
        background: linear-gradient(115deg, #172554, #1e40af);
        padding: 30px;
        border-radius: 15px;
        color: white;
        margin-bottom: 28px;
        position: relative;
        overflow: hidden;
    }

    .welcome-panel::after {
        content: "";
        position: absolute;
        width: 220px;
        height: 220px;
        border: 35px solid rgba(255,255,255,.07);
        border-radius: 50%;
        right: -60px;
        top: -90px;
    }

    .welcome-panel h2 {
        font-size: 23px;
        margin: 0 0 10px;
        position: relative;
        z-index: 1;
    }

    .welcome-panel p {
        color: #dbeafe;
        margin: 0;
        font-size: 13px;
        line-height: 1.7;
        max-width: 550px;
        position: relative;
        z-index: 1;
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
        position: relative;
        z-index: 1;
    }

    .section-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 15px;
    }

    .section-heading h3 {
        font-size: 17px;
        color: #172554;
        margin: 0;
    }

    .menu-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 16px;
    }

    .menu-item {
        background: white;
        border: 1px solid #e2e8f0;
        padding: 21px;
        border-radius: 13px;
        text-decoration: none;
        color: #1e293b;
        transition: .2s;
        min-height: 170px;
    }

    .menu-item:hover {
        transform: translateY(-3px);
        border-color: #93c5fd;
        box-shadow: 0 8px 20px rgba(30,64,175,.07);
    }

    .menu-symbol {
        width: 43px;
        height: 43px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eff6ff;
        color: #1e40af;
        border-radius: 11px;
        font-size: 20px;
        margin-bottom: 17px;
    }

    .menu-item h4 {
        font-size: 14px;
        margin: 0 0 8px;
        font-weight: 750;
    }

    .menu-item p {
        color: #64748b;
        font-size: 12px;
        line-height: 1.7;
        margin: 0;
    }

    .menu-link {
        color: #2563eb;
        font-size: 12px;
        font-weight: 700;
        display: inline-block;
        margin-top: 15px;
    }

    .account-panel {
        margin-top: 25px;
        padding: 22px;
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 13px;
    }

    .account-panel h3 {
        margin: 0 0 16px;
        font-size: 15px;
        color: #172554;
    }

    .account-info {
        display: flex;
        gap: 40px;
        flex-wrap: wrap;
    }

    .account-info small {
        display: block;
        color: #94a3b8;
        margin-bottom: 6px;
        font-size: 11px;
    }

    .account-info strong {
        font-size: 13px;
        color: #334155;
    }

    @media (max-width: 900px) {
        .menu-grid {
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
            font-size: 21px;
        }
    }
</style>

<div class="dashboard">

    <div class="page-heading">
        <h2>Dashboard</h2>
        <p>Ringkasan dan pusat pengelolaan Website Desa Manyar.</p>
    </div>

    <section class="welcome-panel">
        <h2>
            Selamat Datang, {{ auth()->user()->name }}
        </h2>

        <p>
            Selamat bekerja di Panel Administrasi Desa Manyar.
            Kelola berita, informasi, agenda, dan dokumentasi desa
            melalui satu tempat.
        </p>

        <span class="welcome-label">
            {{ ucfirst(auth()->user()->role) }}
        </span>
    </section>

    <div class="section-heading">
        <h3>Pengelolaan Website</h3>
    </div>

    <div class="menu-grid">

        <a href="{{ route('admin.news.index') }}" class="menu-item">
            <div class="menu-symbol">▤</div>
            <h4>Berita Desa</h4>
            <p>
                Kelola berita, artikel, informasi, dan publikasi
                terbaru Desa Manyar.
            </p>
            <span class="menu-link">Kelola berita →</span>
        </a>

        <div class="menu-item">
            <div class="menu-symbol">▣</div>
            <h4>Pengumuman</h4>
            <p>
                Kelola informasi dan pengumuman resmi
                untuk masyarakat desa.
            </p>
            <span class="menu-link">Segera tersedia</span>
        </div>

        <div class="menu-item">
            <div class="menu-symbol">▦</div>
            <h4>Agenda Kegiatan</h4>
            <p>
                Kelola jadwal kegiatan dan agenda
                pemerintahan Desa Manyar.
            </p>
            <span class="menu-link">Segera tersedia</span>
        </div>

        <div class="menu-item">
            <div class="menu-symbol">▧</div>
            <h4>Galeri Desa</h4>
            <p>
                Kelola foto dokumentasi kegiatan
                dan aktivitas masyarakat desa.
            </p>
            <span class="menu-link">Segera tersedia</span>
        </div>

        <div class="menu-item">
            <div class="menu-symbol">▤</div>
            <h4>Layanan Surat</h4>
            <p>
                Kelola informasi persyaratan dan dokumen
                pelayanan administrasi desa.
            </p>
            <span class="menu-link">Segera tersedia</span>
        </div>

        <a href="{{ route('home') }}" target="_blank" class="menu-item">
            <div class="menu-symbol">◎</div>
            <h4>Website Publik</h4>
            <p>
                Lihat tampilan website Desa Manyar
                dari sisi pengunjung.
            </p>
            <span class="menu-link">Buka website →</span>
        </a>

    </div>

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
