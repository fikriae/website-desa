
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Desa Manyar | Website Resmi Desa</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f8fafc;
            color: #1e293b;
        }

        header {
            background: white;
            padding: 20px 8%;
            border-bottom: 1px solid #e2e8f0;
        }

        .brand {
            font-size: 24px;
            font-weight: bold;
            color: #1d4ed8;
        }

        .subtitle {
            color: #64748b;
            font-size: 13px;
            margin-top: 5px;
        }

        nav {
            display: flex;
            gap: 25px;
            flex-wrap: wrap;
            margin-top: 22px;
        }

        nav a {
            text-decoration: none;
            color: #334155;
            font-size: 14px;
        }

        .hero {
            background: #1e40af;
            color: white;
            padding: 90px 8%;
        }

        .hero h1 {
            font-size: 42px;
            margin-bottom: 18px;
        }

        .hero p {
            font-size: 16px;
            line-height: 1.8;
            max-width: 600px;
        }

        .content {
            padding: 60px 8%;
        }

        .content h2 {
            margin-bottom: 25px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }

        .card h3 {
            margin-bottom: 10px;
            color: #1e40af;
        }

        .card p {
            color: #64748b;
            line-height: 1.6;
            font-size: 14px;
        }

        footer {
            background: #0f172a;
            color: white;
            padding: 30px 8%;
            text-align: center;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            .hero h1 {
                font-size: 30px;
            }
        }
    </style>
</head>

<body>

    <header>
        <div class="brand">DESA MANYAR</div>
        <div class="subtitle">
            Website Resmi Pemerintah Desa Manyar
        </div>

        <nav>
            <a href="/">Beranda</a>
            <a href="#">Profil Desa</a>
            <a href="#">Pemerintahan</a>
            <a href="#">Berita</a>
            <a href="#">Pengumuman</a>
            <a href="#">Informasi Publik</a>
            <a href="#">Galeri</a>
            <a href="#">Kontak</a>
        </nav>
    </header>

    <section class="hero">
        <h1>Selamat Datang di Desa Manyar</h1>

        <p>
            Website resmi Desa Manyar sebagai pusat informasi,
            publikasi kegiatan, berita, pengumuman, dan pelayanan
            informasi kepada seluruh masyarakat.
        </p>
    </section>

    <section class="content">
        <h2>Informasi Desa</h2>

        <div class="cards">
            <div class="card">
                <h3>Berita Desa</h3>
                <p>
                    Informasi dan berita terbaru mengenai kegiatan
                    serta perkembangan Desa Manyar.
                </p>
            </div>

            <div class="card">
                <h3>Pengumuman</h3>
                <p>
                    Informasi penting dan pengumuman resmi
                    untuk seluruh masyarakat.
                </p>
            </div>

            <div class="card">
                <h3>Dokumen Publik</h3>
                <p>
                    Akses dokumen dan informasi publik
                    yang diterbitkan pemerintah desa.
                </p>
            </div>
        </div>
    </section>

    <footer>
        &copy; {{ date('Y') }} Pemerintah Desa Manyar.
        Hak Cipta Dilindungi.
    </footer>

</body>
</html>
