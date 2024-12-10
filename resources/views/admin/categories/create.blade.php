@extends('admin.admin')

@section('content')
<div class="container mt-5">
    <h1 class="fw-bold mb-4">Add New categories</h1>

    <!-- Form -->
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h5 class="m-0">Add New categories</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Nama Kategori</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama kategori" required>
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Save

            </form>
        </div>
    </div>
</div>
@endsection
