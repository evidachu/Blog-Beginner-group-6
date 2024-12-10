@extends('layouts.app')

@section('title', 'Admin Dashboard: Manage Categories')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 fw-bold">Manage Categories</h1>

    <!-- Tampilkan pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tombol untuk menambah kategori -->
    <button class="btn btn-add-category mb-3" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
    + Add New Category
</button>


    <!-- Tabel daftar kategori -->
    <table>
        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td class="text-center">{{ $category->created_at ? $category->created_at->format('d M Y, H:i') : '-' }}</td>
                    <td class="text-center">{{ $category->updated_at ? $category->updated_at->format('d M Y, H:i') : '-' }}</td>
                    <td class="text-center">
                        <!-- Tombol Edit -->
<button class="btn btn-warning btn-sm fw-bold" data-bs-toggle="modal" data-bs-target="#editCategoryModal{{ $category->id }}">
    Edit
</button>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm fw-bold" onclick="return confirm('Are you sure you want to delete this category?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted fw-bold">No categories found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<!-- Modal Edit -->
<div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1" aria-labelledby="editCategoryModalLabel{{ $category->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel{{ $category->id }}">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
                    </div>
                    <button type="submit" class="btn btn-warning">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal untuk Add New Category -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form tambah kategori -->
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Back to Home Link -->
<div class="article-back">
            <a href="{{ route('admin.dashboard') }}" class="back-link">← Kembali ke Dashboard Admin</a>
        </div>
@endsection

@push('styles')
<style>
    /* Tabel */

    body {
        font-family: 'Monserrat', sans-serif;
    }

    h1 {
                font-size: 36px; /* Ukuran font yang lebih besar */
                font-family: 'Montserrat', sans-serif; /* Ganti dengan font yang diinginkan */
                font-weight: 700; /* Jika ingin teks lebih tebal */
                text-decoration: none; /* Pastikan teks tidak ada garis bawah */
                text-align: center;
                color: #ffffff;
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

table {
        width: 100%;
        margin: 0 auto;
        border-collapse: separate;
        border-spacing: 10px 15px; /* Jarak antar baris */
        font-family: 'montserrat', sans-serif;
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
        border-radius: 10px;
    }

    tbody tr td {
        border-radius: 10px;
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

    /* Tombol Add New Category */
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
    font-family: 'montserrat', sans-serif;
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
