@extends('layouts.app')

@section('content')

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
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
    </style>

<div class="container-fluid">
    <!-- Header -->
    <div class="bg-primary text-white text-center py-4 mb-4">
        <h1>Admin Dashboard</h1>
        <p>Selamat datang di panel admin, kelola konten Anda dengan mudah!</p>
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
    <div class="row g-3 mt-4 text-center">
        <div class="col-md-4">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-primary btn-block p-4">
                <h5>Manage Categories</h5>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('admin.tags.index') }}" class="btn btn-outline-success btn-block p-4">
                <h5>Manage Tags</h5>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-warning btn-block p-4">
                <h5>Manage Articles</h5>
            </a>
        </div>
    </div>
</div>
@endsection
