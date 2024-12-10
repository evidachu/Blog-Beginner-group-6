@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 fw-bold">Buat Artikel Baru</h1>

    <!-- Form untuk membuat artikel baru -->
    <form action="{{ route('admin.articles2.store') }}" method="POST">

        @csrf

        <div class="mb-4">
            <label for="title" class="form-label">Judul Artikel</label>
            <input type="text" class="form-control" id="title" name="title" required placeholder="Masukkan judul artikel">
        </div>

        <div class="mb-4">
            <label for="category_id" class="form-label">Kategori</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <option value="">Pilih Kategori</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="content" class="form-label">Konten</label>
            <textarea class="form-control" id="content" name="full_text" rows="5" required placeholder="Tulis konten artikel"></textarea>

        </div>

        <!-- Dropdown untuk memilih tag (multiple select) -->
        <div class="mb-4">
            <label for="tags" class="form-label">Tags</label>
            <select class="form-control" id="tags" name="tags[]" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
            <small class="form-text text-muted">Tahan tombol Ctrl (Windows) atau Command (Mac) untuk memilih beberapa tag.</small>
        </div>

        <button type="submit" class="btn btn-add-category btn-lg">+ Tambahkan Artikel</button>
    </form>
</div>
@endsection

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


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

    .btn-add-category {
        font-size: 14px;
        font-weight: bold;
        padding: 12px 20px;
        color: white;
        background: #ff4081;
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-add-category:hover {
        background: linear-gradient(45deg, #5a0fb5, #1b65e8);
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
    }

    .btn-add-category:active {
        transform: translateY(0);
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Inisialisasi Select2 untuk tag multiple select
        $('#tags').select2({
            placeholder: "Pilih tags",
            allowClear: true
        });
    });
</script>
@endpush
