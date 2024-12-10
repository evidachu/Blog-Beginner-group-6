@extends('layouts.app')

@section('title', 'Homepage : Welcome to ArticleCraft')

@section('content')

<div class="container">
    <!-- Section Pertama: Welcome Page -->
    <section id="welcome-section" class="welcome-section">
        <div>
            <h1><b>Selamat Datang di ArticleCraft</b></h1>
            <p>
                Jelajahi beragam artikel menarik dan populer. Temukan inspirasi baru setiap hari hanya di ArticleCraft.
            </p>
            <button id="view-more-button" class="btn btn-primary">Lihat Selengkapnya</button>
        </div>
    </section>

    <!-- Section Kedua: Artikel -->
    <section id="articles-section" class="articles-section">
        <div class="main-container">
            <h2>Artikel Terbaru dan Populer</h2>
            <div id="articles-container" class="articles-container">
                @foreach ($articles as $article)
                <article class="article-card">
                    <div class="article-card-content">
                        <!-- Jika artikel memiliki gambar, tampilkan gambar di sebelah kiri -->
                        @if ($article->image)
                        <div class="article-image">
                            <img src="{{ asset('storage/' . $article->image) }}" alt="Image for {{ $article->title }}">
                        </div>
                        @endif
                        
                        <!-- Deskripsi artikel di sebelah kanan gambar -->
                        <div class="article-text">
                            <h3>{{ $article->title }}</h3>
                            <p class="content">{{ \Illuminate\Support\Str::limit($article->full_text, 120) }}</p>
                            <a href="{{ route('articles.show', $article->id) }}">Baca Selengkapnya</a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
            <div id="no-results" style="display: none; text-align: center; margin-top: 20px;">
                <p>Tidak ada artikel yang sesuai dengan pencarian Anda.</p>
            </div>
        </div>
    </section>
</div>
@endsection

@push('styles')
<style>
    h2 {
        font-size: 30px;
        margin: 0;
        color: #fff;
        animation: fadeIn 2s ease-in-out;
    }

    .article-card {
        background: #fff;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .article-card-content {
        display: flex;
        align-items: center;
    }

    .article-image {
        width: 120px; /* Gambar dengan ukuran tetap */
        height: 120px; /* Gambar dengan ukuran tetap */
        margin-right: 15px; /* Spasi antara gambar dan teks */
        overflow: hidden;
        border-radius: 5px;
        background-color: #f1f1f1;
    }

    .article-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .article-text {
        flex: 1; /* Agar teks mengambil sisa ruang */
    }

    .article-card h3 {
        font-size: 24px;
        color: #333;
    }

    .article-card .content {
        color: #777;
        font-size: 16px;
        margin-bottom: 10px;
    }

    .article-card a {
        color: #007bff;
        text-decoration: none;
    }

    .article-card a:hover {
        text-decoration: underline;
    }
</style>
@endpush

@push('scripts')
<script>
    // Tombol Lihat Selengkapnya (Smooth Scroll ke Section Artikel)
    document.getElementById('view-more-button').addEventListener('click', function () {
        const articlesSection = document.getElementById('articles-section');
        articlesSection.scrollIntoView({ behavior: 'smooth' });
    });

    // Fungsi Pencarian Artikel
    document.getElementById('search-button').addEventListener('click', function () {
        const searchQuery = document.getElementById('search-input').value.trim().toLowerCase();
        const articlesContainer = document.getElementById('articles-container');
        const articles = articlesContainer.querySelectorAll('.article-card');
        const noResultsMessage = document.getElementById('no-results');

        // Reset articles visibility
        let hasResults = false;
        articles.forEach(article => {
            const title = article.querySelector('h3').innerText.toLowerCase();
            const content = article.querySelector('p').innerText.toLowerCase();

            if (title.includes(searchQuery) || content.includes(searchQuery)) {
                article.style.display = 'block';
                hasResults = true;
            } else {
                article.style.display = 'none';
            }
        });

        // Display or hide no results message
        noResultsMessage.style.display = hasResults ? 'none' : 'block';
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('search-input');
        const searchButton = document.querySelector('.search-container button');
        const articlesContainer = document.getElementById('articles-container');
        const articlesSection = document.getElementById('articles-section');
        const articles = articlesContainer.querySelectorAll('.article-card');
        const noResultsMessage = document.getElementById('no-results');

        // Fungsi untuk menyaring artikel
        function filterArticles() {
            const searchQuery = searchInput.value.trim().toLowerCase();
            let hasResults = false;

            articles.forEach(article => {
                const title = article.querySelector('h3').innerText.toLowerCase();
                const content = article.querySelector('p').innerText.toLowerCase();

                if (title.includes(searchQuery) || content.includes(searchQuery)) {
                    article.style.display = 'block';
                    hasResults = true;
                } else {
                    article.style.display = 'none';
                }
            });

            // Menampilkan atau menyembunyikan pesan "Tidak ada hasil"
            noResultsMessage.style.display = hasResults ? 'none' : 'block';

            // Scroll ke bagian artikel
            if (articlesSection) {
                articlesSection.scrollIntoView({ behavior: 'smooth' });
            }
        }

        // Event listener untuk tombol search
        if (searchButton) {
            searchButton.addEventListener('click', filterArticles);
        }

        // Event listener untuk input pencarian (opsional jika ingin langsung saat mengetik)
        searchInput.addEventListener('keypress', function (event) {
            if (event.key === 'Enter') { // Gunakan tombol Enter
                event.preventDefault();
                filterArticles();
            }
        });
    });
</script>

@endpush
