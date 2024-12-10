@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 fw-bold">Manage Article</h1>

    <!-- Tampilkan pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tombol untuk menambah artikel -->
    <a href="{{ route('admin.articles2.create') }}" class="btn btn-add-category mb-3">+ Add New Article</a>

    <!-- Tabel daftar artikel -->
    <table>
        <thead class="table-dark text-center">
            <tr>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Tag</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->category->name }}</td>
                    <td>
                        @foreach ($article->tags as $tag)
                            <span class="badge bg-secondary" style="margin: 2px;">{{ $tag->name }}</span>
                        @endforeach
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.articles2.edit', $article->id) }}" class="btn btn-warning btn-sm fw-bold">Edit</a>
                        <form action="{{ route('admin.articles2.destroy', $article->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm fw-bold" onclick="return confirm('Are you sure you want to delete this article?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Back to Home Link -->
<div class="article-back">
    <a href="{{ route('admin.dashboard') }}" class="back-link">← Back to Dashboard Admin</a>
</div>

@endsection


@push('styles')
<style>
    /* Tabel */
    
    .article-back {
        text-align: center;
        margin-top: 30px;
    }

    .article-back .back-link {
        font-family: 'Montserrat', sans-serif;
        font-size: 16px;
        font-weight: bold;
        color: #ffffff;
        background: #ff4081;
        padding: 10px 20px;
        border-radius: 25px;
        text-decoration: none;
        display: inline-block;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .article-back .back-link:hover {
        background: #45a049;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
    }

    .article-back .back-link:active {
        transform: translateY(0);
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
    }

    body {
        font-family: 'Montserrat', sans-serif;
    }

    h1 {
        font-size: 36px; /* Ukuran font yang lebih besar */
                font-family: 'Montserrat', sans-serif; /* Ganti dengan font yang diinginkan */
                font-weight: 700; /* Jika ingin teks lebih tebal */
                text-decoration: none; /* Pastikan teks tidak ada garis bawah */
                text-align: center;
                color: #ffffff;
    }

    table {
        width: 100%;
        margin: 0 auto;
        border-collapse: separate;
        border-spacing: 10px 15px;
        font-family: 'Montserrat', sans-serif;
        color: #333;
    }

    thead th {
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 17px;
        color: #ffffff;
        background: #5a8eeb;
        text-align: center;
        padding: 20px 15px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    tbody tr {
        background-color: #ffffff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s, box-shadow 0.2s;
        border-radius:10 px;
    }

    tbody tr td {
        text-align: center;
        padding: 12px;
        font-size: 14px;
        color: #555;
        border: none;
    }

    tbody tr td:first-child {
        border-bottom-left-radius: 10px;
        border-top-left-radius: 10px;
    }

    tbody tr td:last-child {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    tbody tr:hover {
        transform: scale(1.02);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .btn-add-category {
        font-size: 14px;
        font-weight: bold;
        padding: 10px 20px;
        color: white;
        background: #ff4081;
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        transition: all 0.3s ease;
        margin-left: 15px;
        font-family: 'Montserrat', sans-serif;
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

    .btn-warning, .btn-danger {
        font-weight: bold;
    }

    .badge {
        padding: 5px 10px;
        border-radius: 20px;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.btn-danger');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                const confirmDelete = confirm('Are you sure you want to delete this article?');
                if (!confirmDelete) {
                    event.preventDefault();
                }
            });
        });
    });
</script>
@endpush


