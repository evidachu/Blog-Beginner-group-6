@extends('admin.admin')

@section('content')
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
