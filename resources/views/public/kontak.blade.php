
@extends('public.layouts.app')

@section('title', 'Kontak Desa Manyar')

@push('styles')
<style>
    .contact-page {
        max-width: 1180px;
        margin: auto;
        padding: 65px 22px 80px;
    }

    .contact-heading {
        text-align: center;
        margin-bottom: 45px;
    }

    .contact-label {
        display: inline-block;
        padding: 8px 16px;
        background: #eaf2ec;
        color: #1e462e;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
    }

    .contact-heading h1 {
        color: #172554;
        font-size: clamp(28px, 4vw, 40px);
        font-weight: 800;
        margin: 17px 0 12px;
    }

    .contact-heading p {
        max-width: 650px;
        margin: auto;
        color: #64748b;
        font-size: 14px;
        line-height: 1.9;
    }

    .contact-layout {
        display: grid;
        grid-template-columns: .9fr 1.1fr;
        gap: 25px;
        align-items: stretch;
    }

    .contact-information {
        background: #1e462e;
        color: white;
        padding: 35px;
        border-radius: 15px;
    }

    .contact-information h2 {
        color: white;
        font-size: 23px;
        font-weight: 700;
        margin: 0 0 12px;
    }

    .contact-information > p {
        color: rgba(255,255,255,.75);
        font-size: 13px;
        line-height: 1.8;
        margin-bottom: 30px;
    }

    .contact-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        padding: 17px 0;
        border-bottom: 1px solid rgba(255,255,255,.15);
    }

    .contact-item:last-child {
        border-bottom: none;
    }

    .contact-icon {
        width: 42px;
        height: 42px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255,255,255,.12);
        border-radius: 10px;
        font-size: 19px;
    }

    .contact-item h3 {
        color: white;
        font-size: 13px;
        font-weight: 700;
        margin: 2px 0 6px;
    }

    .contact-item p {
        color: rgba(255,255,255,.78);
        font-size: 13px;
        line-height: 1.7;
        margin: 0;
        overflow-wrap: anywhere;
    }

    .contact-map {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 15px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .map-header {
        padding: 25px 28px;
    }

    .map-header h2 {
        color: #172554;
        font-size: 19px;
        font-weight: 700;
        margin: 0 0 7px;
    }

    .map-header p {
        color: #64748b;
        font-size: 13px;
        margin: 0;
        line-height: 1.7;
    }

    .map-frame {
        width: 100%;
        flex: 1;
        min-height: 350px;
        background: #f1f5f9;
    }

    .map-frame iframe {
        width: 100%;
        height: 100%;
        min-height: 350px;
        border: 0;
        display: block;
    }

    .map-footer {
        padding: 17px 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        border-top: 1px solid #e5e7eb;
    }

    .map-footer p {
        color: #64748b;
        font-size: 12px;
        margin: 0;
        line-height: 1.6;
    }

    .map-footer a {
        flex-shrink: 0;
        display: inline-block;
        padding: 11px 16px;
        background: #1e462e;
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        transition: .3s ease;
    }

    .map-footer a:hover {
        background: #163622;
        transform: translateY(-2px);
    }

    .service-callout {
        margin-top: 30px;
        padding: 28px 32px;
        background: #f0f5f1;
        border-radius: 13px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
    }

    .service-callout h2 {
        color: #1e462e;
        font-size: 18px;
        font-weight: 700;
        margin: 0 0 7px;
    }

    .service-callout p {
        color: #64748b;
        font-size: 13px;
        line-height: 1.7;
        margin: 0;
    }

    .service-callout a {
        flex-shrink: 0;
        display: inline-block;
        padding: 12px 19px;
        background: #1e462e;
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
    }

    .service-callout a:hover {
        background: #163622;
    }

    @media (max-width: 800px) {
        .contact-layout {
            grid-template-columns: 1fr;
        }

        .map-frame,
        .map-frame iframe {
            min-height: 320px;
        }
    }

    @media (max-width: 600px) {
        .contact-page {
            padding: 45px 16px 60px;
        }

        .contact-information {
            padding: 25px 22px;
        }

        .service-callout {
            flex-direction: column;
            align-items: flex-start;
            padding: 23px;
        }

        .map-footer {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>
@endpush

@section('content')

<div class="contact-page">

    <div class="contact-heading">
        <span class="contact-label">Hubungi Pemerintah Desa</span>

        <h1>Kontak Desa Manyar</h1>

        <p>
            Kami siap membantu masyarakat dalam memperoleh informasi,
            menyampaikan pertanyaan, maupun mendapatkan pelayanan
            administrasi dari Pemerintah Desa Manyar.
        </p>
    </div>

    <div class="contact-layout">

        <div class="contact-information">

            <h2>Informasi Kontak</h2>

            <p>
                Silakan hubungi atau kunjungi kantor Pemerintah Desa Manyar
                melalui informasi kontak berikut.
            </p>

            <div class="contact-item">
                <div class="contact-icon">📍</div>

                <div>
                    <h3>Alamat Kantor Desa</h3>
                    <p>
                        Balai Desa Manyar
                        <br>
                        Kode Plus: W6PX+VGQ
                        <br>
                        Desa Manyar, Kecamatan Sekaran,
                        <br>
                        Kabupaten Lamongan,
                        <br>
                        Provinsi Jawa Timur 62261
                        <br>
                        Indonesia
                    </p>
                </div>
            </div>

            <div class="contact-item">
                <div class="contact-icon">☎</div>

                <div>
                    <h3>Telepon / WhatsApp</h3>
                    <p>
                        Nomor telepon resmi Pemerintah Desa Manyar
                        belum ditambahkan.
                    </p>
                </div>
            </div>

            <div class="contact-item">
                <div class="contact-icon">✉</div>

                <div>
                    <h3>Email</h3>
                    <p>
                        Email resmi Pemerintah Desa Manyar
                        belum ditambahkan.
                    </p>
                </div>
            </div>

            <div class="contact-item">
                <div class="contact-icon">◷</div>

                <div>
                    <h3>Jam Pelayanan</h3>
                    <p>
                        Informasi hari dan jam pelayanan
                        kantor desa belum ditambahkan.
                    </p>
                </div>
            </div>

        </div>

        <div class="contact-map">

            <div class="map-header">
                <h2>Lokasi Kantor Desa</h2>

                <p>
                    Temukan lokasi Balai Desa Manyar melalui peta
                    berikut untuk mendapatkan pelayanan secara langsung.
                </p>
            </div>

            <div class="map-frame">
                <iframe
                    src="https://maps.google.com/maps?q=W6PX%2BVGQ%2C%20Manyar%2C%20Kecamatan%20Sekaran%2C%20Kabupaten%20Lamongan%2C%20Jawa%20Timur%2062261&t=&z=17&ie=UTF8&iwloc=&output=embed"
                    width="100%"
                    height="350"
                    style="border:0;"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Peta Lokasi Balai Desa Manyar">
                </iframe>
            </div>

            <div class="map-footer">
                <p>
                    Balai Desa Manyar, Kecamatan Sekaran,
                    Kabupaten Lamongan.
                </p>

                <a
                    href="https://www.google.com/maps/dir/?api=1&destination=W6PX%2BVGQ%2C%20Manyar%2C%20Sekaran%2C%20Lamongan%2C%20Jawa%20Timur"
                    target="_blank"
                    rel="noopener noreferrer">
                    Petunjuk Arah ↗
                </a>
            </div>

        </div>

    </div>

    <div class="service-callout">

        <div>
            <h2>Membutuhkan Dokumen Administrasi?</h2>

            <p>
                Lihat berbagai formulir dan dokumen layanan surat
                yang dapat diunduh melalui website Desa Manyar.
            </p>
        </div>

        <a href="{{ route('public.documents.index') }}">
            Lihat Layanan Surat →
        </a>

    </div>

</div>

@endsection
