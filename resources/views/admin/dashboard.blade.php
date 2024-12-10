@extends('layouts.app')

@section('content')

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            color:#ffffff;
        }
        .stat-card {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .stat-card h5 {
            margin-bottom: 10px;
            font-size: 1.2rem;
        }

        .stat-card .stat-number {
            font-size: 2rem;
            font-weight: bold;
        }

        .btn-block {
            display: block;
            width: 100%;
            border-radius: 10px;
        }

        .btn-outline-primary, .btn-outline-success, .btn-outline-warning {
            padding: 20px;
            font-size: 1.2rem;
            font-weight: bold;
            text-align: center;
        }

        .btn-outline-primary:hover {
            background-color: #007bff;
            color: white;
        }

        .btn-outline-success:hover {
            background-color: #28a745;
            color: white;
        }

        .btn-outline-warning:hover {
            background-color: #ffc107;
            color: white;
        }
        .custom-container {
    color: #000; 
}
.welcome-text {
    color: white;
    font: 'Montserrat' ,sans-serif;
}
.article-back {
    text-align: center; /* Pusatkan konten */
    margin-top: 30px;
}

.article-back .back-link {
    font-family: 'Montserrat', sans-serif;
    font-size: 16px;
    font-weight: bold;
    color: #ffffff;
    background: #ff4081; /* Warna hijau */
    padding: 10px 20px;
    border-radius: 25px;
    text-decoration: none;
    display: inline-block; /* Membuat link menjadi tombol */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
}

.article-back .back-link:hover {
    background: #45a049; /* Efek saat hover */
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
}

.article-back .back-link:active {
    transform: translateY(0);
    box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
}



    </style>

<div class="container custom-container">
    <!-- Header -->
    <div class="text-center py-4 mb-4">
    <h1 class="welcome-text"><b>Welcome, {{ Auth::user()->name }}!</b></h1>
    <p class="welcome-text">Selamat datang di Dashboard Admin, kelola konten Anda dengan mudah!</p>
</div>


    <!-- Statistik -->
    <div class="row g-3">
        <div class="col-md-4">
            <div class="stat-card">
                <h5>Total Kategori</h5>
                <p class="stat-number">{{ $categoriesCount }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <h5>Total Tag</h5>
                <p class="stat-number">{{ $tagsCount }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <h5>Total Artikel</h5>
                <p class="stat-number">{{ $articlesCount }}</p>
            </div>
        </div>
    </div>

    <!-- Manage Options -->
    <div class="row g-3 mt-1 text-center">
    <div class="col-md-4">
        <a href="{{ route('admin.categories.index') }}" class="btn btn-block btn-primary p-4">
            <h5>Manage Categories</h5>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('admin.tags.index') }}" class="btn btn-block btn-success p-4">
            <h5>Manage Tags</h5>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('admin.articles2.index') }}" class="btn btn-block btn-warning p-4">
            <h5>Manage Articles</h5>
        </a>
    </div>
</div>

<!-- Back to Home Link -->
<div class="article-back">
            <a href="{{ route('articles.index') }}" class="back-link">← Kembali ke Dashboard</a>
        </div>

</div>
@endsection
