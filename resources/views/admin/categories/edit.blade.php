@extends('admin.admin')

@section('content')
<div class="container mt-5">
    <h1 class="fw-bold mb-4">Edit Kategori</h1>

    <!-- Form -->
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h5 class="m-0">Form Edit Kategori</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Nama Kategori</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" placeholder="Edit nama kategori" required>
                </div>
                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-save"></i> update
            </form>
        </div>
    </div>
</div>
@endsection
