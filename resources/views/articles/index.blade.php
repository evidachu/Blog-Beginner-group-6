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
                    <h3>{{ $article->title }}</h3>
                    <p class="content">{{ \Illuminate\Support\Str::limit($article->full_text, 120) }}</p>
                    <a href="{{ route('articles.show', $article->id) }}">Baca Selengkapnya</a>
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
@endpush
