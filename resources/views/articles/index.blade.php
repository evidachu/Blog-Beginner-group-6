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
    @foreach ($articles as $article)
        <article class="article-card">
            <h3>{{ $article->title }}</h3>
            <p class="content">{{ \Illuminate\Support\Str::limit($article->full_text, 120) }}</p>
            <a href="{{ route('articles.show', $article->id) }}">Baca Selengkapnya</a>
        </article>
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
