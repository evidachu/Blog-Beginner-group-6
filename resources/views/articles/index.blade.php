<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Artikel</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <!-- Header Section -->
    <header>
        <div class="container header-container">
            <h1>article.zulvika</h1>
            <div class="search-container">
                <input type="text" placeholder="Cari artikel yang menarik dan informatif di sini..." aria-label="Search Articles">
                <button type="submit">🔍 Cari</button>
            </div>
            <nav>
                <ul class="nav-links">
                    <li><a href="{{ route('info') }}">Informasi Umum</a></li>
                    <li><a href="{{ route('admin.dashboard') }}">Dasbor Admin</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content Section -->
    <main>
        <div class="container main-container">
            <h2>Artikel Terbaru dan Populer</h2>
            <div class="articles-container">
                <article>
                    <h3>10 Tren Teknologi yang Akan Mengubah Dunia di Tahun 2024</h3>
                    <p>Artikel ini membahas perkembangan teknologi terbaru, termasuk dominasi energi terbarukan dan kecerdasan buatan yang menciptakan peluang kerja baru. Mahasiswa dan profesional disarankan memahami tren ini untuk mempersiapkan masa depan.</p>
                    <a href="https://upskills.id/tren-teknologi-2024/" target="_blank">Baca Selengkapnya</a>
                </article>
                <!-- Artikel 2 -->
                <article>
                    <h3>Tren Teknologi 2024: AI, 5G Privat, dan Energi Bersih</h3>
                    <p>Artikel ini mengulas adopsi teknologi seperti AI, jaringan kabel optik, energi bersih, dan ekosistem IoT yang semakin luas. Artikel juga menyoroti pentingnya pelatihan karyawan di bidang AI untuk mengatasi kesenjangan keahlian.</p>
                    <a href="https://katadata.co.id/tren-teknologi-2024/" target="_blank">Baca Selengkapnya</a>
                </article>
                <!-- Artikel 3 -->
                <article>
                    <h3>Kecerdasan Buatan dan Masa Depan Ekonomi Digital</h3>
                    <p>Artikel ini mengeksplorasi dampak AI dalam membentuk tren ekonomi digital, termasuk otomatisasi yang semakin masif di sektor operasional perusahaan besar. AI diprediksi terus menjadi elemen penting dalam transformasi digital global.</p>
                    <a href="https://katadata.co.id/masa-depan-ekonomi-digital/" target="_blank">Baca Selengkapnya</a>
                </article>
                @foreach ($articles as $article)
                    <div class="article-card">
                        <h3>{{ $article->title }}</h3>
                        <p class="content">{{ \Str::limit($article->content, 120) }}</p>
                        <a href="{{ route('articles.show', $article->id) }}">Baca Selengkapnya</a>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    <!-- Footer Section -->
    <footer>
        <div class="container footer-container">
            <p>&copy; 2024 Daftar Artikel. Hak cipta dilindungi dengan sepenuh hati.</p>
        </div>
    </footer>
</body>

</html>
