@extends('admin.admin')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Add New Category</h1>

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
@endsection
