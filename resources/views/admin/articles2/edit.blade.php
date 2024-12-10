@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 fw-bold">Edit Artikel</h1>

    <!-- Tampilkan pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Form untuk mengedit artikel -->
    <form action="{{ route('admin.articles2.update', $article->id) }}" method="POST" enctype="multipart/form-data">
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
                        {{ $article->tags->contains($tag->id) ? 'selected' : '' }}>{{ $tag->name }}</option>
                @endforeach
            </select>
            <small class="form-text text-muted">Hold down the Ctrl (Windows) or Command (Mac) key to select multiple tags.</small>
        </div>

        <!-- Input untuk memilih gambar -->
        <div class="mb-4">
            <label for="image" class="form-label">Gambar Artikel</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            <small class="form-text text-muted">Unggah gambar baru (opsional). Gambar sebelumnya akan tetap digunakan jika tidak diunggah.</small>
        </div>

        @if ($article->image)
            <div class="mt-3">
                <img src="{{ asset('storage/' . $article->image) }}" alt="Gambar Artikel" class="img-thumbnail" style="max-width: 200px;">
            </div>
        @endif

        <button type="submit" class="btn btn-warning btn-lg fw-bold">Update Artikel</button>
        <a href="{{ route('admin.articles2.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Artikel</a>
    </form>
</div>
@endsection

@push('styles')
<style>
    body {
        font-family: 'Montserrat', sans-serif;
    }

    h1 {
        font-size: 36px;
        font-weight: 700;
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

    .btn-warning {
        background-color: #ffcc00;
        color: white;
        font-weight: bold;
    }

    .btn-warning:hover {
        background-color: #ff9900;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
        font-weight: bold;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Inisialisasi Select2 untuk tags
        $('#tags').select2({
            placeholder: "Pilih tags",
            allowClear: true
        });
    });
</script>
@endpush
