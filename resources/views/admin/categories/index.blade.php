@extends('admin.admin')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 fw-bold">Manage Categories</h1>

    <!-- Tampilkan pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tombol untuk menambah kategori -->
    <a href="{{ route('admin.categories.create') }}" class="btn btn-success mb-3">Add New Category</a>

    <!-- Tabel daftar kategori -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark text-center">
            <tr>
                <th>#</th>
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
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning btn-sm fw-bold">
                            Edit
                        </a>
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
@endsection
