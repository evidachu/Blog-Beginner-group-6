@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 fw-bold">Edit Artikel</h1>

    <!-- Tampilkan pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Form untuk mengedit artikel -->
    <form action="{{ route('admin.articles2.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="form-label">Judul Artikel</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $article->title) }}" required>
        </div>

        <div class="mb-4">
            <label for="full_text" class="form-label">Konten Artikel</label>
            <textarea name="full_text" id="full_text" class="form-control" rows="5" required>{{ old('full_text', $article->full_text) }}</textarea>
        </div>

        <!-- Dropdown untuk memilih kategori -->
        <div class="mb-4">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ $article->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Dropdown untuk memilih tag (multiple select) -->
        <div class="mb-4">
            <label for="tags" class="form-label">Tags</label>
            <select name="tags[]" id="tags" class="form-control" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" 
                        {{ $article->tags->contains($tag->id) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
            <small class="form-text text-muted">Hold down the Ctrl (Windows) or Command (Mac) key to select multiple tags.</small>
        </div>

        <button type="submit" class="btn btn-warning btn-lg fw-bold">Update Artikel</button>
        <a href="{{ route('admin.articles2.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Artikel</a>
    </form>
</div>
@endsection

@push('styles')
<style>
    /* Styling untuk Form */
    body {
        font-family: 'Montserrat', sans-serif;
    }

    h1 {
        font-size: 36px; /* Ukuran font yang lebih besar */
        font-weight: 700; /* Teks lebih tebal */
        text-align: center;
        color: #333;
    }

    .form-label {
        font-size: 14px;
        font-weight: 600;
        color: #333;
    }

    .form-control {
        padding: 15px;
        font-size: 16px;
        border-radius: 10px;
        border: 1px solid #ddd;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .form-control:focus {
        border-color: #5a8eeb;
        box-shadow: 0 0 5px rgba(90, 142, 235, 0.5);
    }

    .btn-warning, .btn-secondary {
        font-weight: bold;
        padding: 12px 20px;
        border-radius: 10px;
    }

    .btn-warning {
        background: #ff9800;
        border: none;
    }

    .btn-warning:hover {
        background: #f57c00;
        transform: translateY(-2px);
    }

    .btn-warning:active {
        background: #f57c00;
        transform: translateY(0);
    }

    .btn-secondary {
        background: #6c757d;
        border: none;
    }

    .btn-secondary:hover {
        background: #5a6368;
        transform: translateY(-2px);
    }

    .btn-secondary:active {
        background: #5a6368;
        transform: translateY(0);
    }

    /* Styling untuk select2 */
    .select2-container {
        width: 100% !important;
    }

    .select2-selection__choice {
        background-color: #5a8eeb;
        color: white;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Inisialisasi Select2 untuk tag multiple select
        $('#tags').select2({
            placeholder: "Select tags",
            allowClear: true
        });
    });
</script>
@endpush
