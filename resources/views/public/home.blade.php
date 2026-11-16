@extends('public.layouts.app')

@section('title', 'Beranda - Website Resmi Desa Manyar')

@push('styles')
<style>
    .hero {
        background: linear-gradient(120deg, #102f69, #2563eb);
        padding: 85px 0;
        position: relative;
        overflow: hidden;
    }

    .hero-content {
        max-width: 720px;
        position: relative;
        z-index: 1;
    }

    .hero-label {
        display: inline-block;
        background: rgba(255,255,255,.15);
        padding: 8px 16px;
        border-radius: 30px;
        font-size: 13px;
        margin-bottom: 22px;
    }

    .hero h1 {
        font-size: 46px;
        line-height: 1.2;
        margin-bottom: 20px;
        color: white;
    }

    .hero p {
        font-size: 16px;
        line-height: 1.8;
        color: #dbeafe;
        max-width: 620px;
    }

    .hero-actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 30px;
    }

    .btn-primary, .btn-outline {
        display: inline-block;
        padding: 13px 22px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        font-size: 14px;
    }

    .btn-primary {
        background: white;
        color: #1e40af;
    }

    .btn-outline {
        border: 1px solid white;
        color: white;
    }

    .section {
        padding: 65px 0;
    }

    .section-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
        margin-bottom: 28px;
    }

    .section-heading h2 {
        font-size: 26px;
        color: #0f172a;
    }

    .section-heading p {
        color: #64748b;
        font-size: 14px;
    }

    .section-link {
        color: #2563eb;
        text-decoration: none;
        font-size: 14px;
        font-weight: bold;
    }

    .welcome-section {
        display: grid;
        grid-template-columns: 1fr 1.2fr;
        gap: 45px;
        align-items: center;
    }

    .welcome-image {
        min-height: 280px;
        background: linear-gradient(135deg, #dbeafe, #bfdbfe);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #1e40af;
        font-size: 15px;
        text-align: center;
        padding: 20px;
    }

    .welcome-text h2 {
        font-size: 27px;
        margin-bottom: 15px;
        color: #0f172a;
    }

    .welcome-text p {
        color: #64748b;
        line-height: 1.9;
        font-size: 15px;
    }

    .cards {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 22px;
    }

    .card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 13px;
        padding: 24px;
        transition: .2s;
    }

    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 25px rgba(15,23,42,.07);
    }

    .card-icon {
        width: 46px;
        height: 46px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eff6ff;
        border-radius: 10px;
        color: #2563eb;
        font-size: 21px;
        margin-bottom: 17px;
    }

    .card h3 {
        color: #1e293b;
        margin-bottom: 9px;
        font-size: 17px;
    }

    .card p {
        color: #64748b;
        font-size: 14px;
        line-height: 1.7;
    }

    .announcement {
        background: #eff6ff;
    }

    .announcement-box {
        background: white;
        border-radius: 12px;
        padding: 25px;
        border: 1px solid #dbeafe;
    }

    .announcement-box p {
        color: #64748b;
        font-size: 14px;
    }

    .empty-content {
        background: white;
        padding: 35px;
        border: 1px dashed #cbd5e1;
        border-radius: 12px;
        text-align: center;
        color: #64748b;
        font-size: 14px;
        grid-column: 1 / -1;
    }

    @media(max-width: 768px) {
        .hero {
            padding: 65px 0;
        }

        .hero h1 {
            font-size: 34px;
        }

        .welcome-section {
            grid-template-columns: 1fr;
            gap: 25px;
        }

        .cards {
            grid-template-columns: 1fr;
        }

        .section {
            padding: 45px 0;
        }
    }
</style>
@endpush

@section('content')

{{-- HERO BANNER --}}
<section class="hero">
    <div class="container">
        <div class="hero-content">

            <div class="hero-label">
                WEBSITE RESMI PEMERINTAH DESA
            </div>

            <h1>
                Selamat Datang
                di Desa Manyar
            </h1>

            <p>
                Portal informasi resmi Desa Manyar.
                Temukan informasi pemerintahan, berita,
                pengumuman, kegiatan, dan berbagai informasi
                publik untuk masyarakat.
            </p>

            <div class="hero-actions">
                <a href="/profil" class="btn-primary">
                    Mengenal Desa
                </a>

                <a href="/berita" class="btn-outline">
                    Lihat Berita
                </a>
            </div>

        </div>
    </div>
</section>


{{-- SAMBUTAN KEPALA DESA --}}
<section class="section">
    <div class="container">

        <div class="welcome-section">

            <div class="welcome-image">
                Foto Kepala Desa / Kantor Desa
                <br>
                (Akan ditambahkan)
            </div>

            <div class="welcome-text">
                <h2>Sambutan Kepala Desa</h2>

                <p>
                    Selamat datang di website resmi Pemerintah
                    Desa Manyar.

                    Website ini hadir sebagai sarana informasi
                    dan komunikasi antara pemerintah desa
                    dengan seluruh masyarakat.

                    Melalui website ini, masyarakat dapat
                    memperoleh informasi mengenai kegiatan,
                    program, berita, pengumuman, serta
                    dokumen publik Desa Manyar.
                </p>
            </div>

        </div>

    </div>
</section>


{{-- BERITA TERBARU --}}
<section class="section" style="background:#f1f5f9;">
    <div class="container">

        <div class="section-heading">
            <div>
                <h2>Berita Terbaru</h2>
                <p>Informasi dan kegiatan terbaru Desa Manyar.</p>
            </div>

            <a href="/berita" class="section-link">
                Semua Berita →
            </a>
        </div>

        <div class="cards">

            <div class="empty-content">
                Berita terbaru akan ditampilkan di sini.
            </div>

        </div>

    </div>
</section>


{{-- PENGUMUMAN --}}
<section class="section announcement">
    <div class="container">

        <div class="section-heading">
            <div>
                <h2>Pengumuman Desa</h2>
                <p>Informasi penting untuk masyarakat.</p>
            </div>

            <a href="/pengumuman" class="section-link">
                Semua Pengumuman →
            </a>
        </div>

        <div class="announcement-box">
            <p>
                Belum ada pengumuman yang diterbitkan.
            </p>
        </div>

    </div>
</section>


{{-- INFORMASI PUBLIK --}}
<section class="section">
    <div class="container">

        <div class="section-heading">
            <div>
                <h2>Informasi Publik</h2>
                <p>Akses informasi dan dokumen resmi desa.</p>
            </div>
        </div>

        <div class="cards">

            <div class="card">
                <div class="card-icon">📄</div>
                <h3>Dokumen Desa</h3>
                <p>
                    Akses dokumen dan berkas resmi
                    yang dipublikasikan pemerintah desa.
                </p>
            </div>

            <div class="card">
                <div class="card-icon">📢</div>
                <h3>Pengumuman</h3>
                <p>
                    Informasi dan pemberitahuan
                    terbaru untuk masyarakat.
                </p>
            </div>

            <div class="card">
                <div class="card-icon">🏛️</div>
                <h3>Profil Desa</h3>
                <p>
                    Informasi mengenai sejarah,
                    pemerintahan, dan potensi desa.
                </p>
            </div>

        </div>

    </div>
</section>

@endsection
