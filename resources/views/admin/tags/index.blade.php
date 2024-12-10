@extends('admin.admin')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Manage Tags</h1>

    <!-- Tampilkan pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tombol untuk menambah tag -->
    <a href="{{ route('admin.tags.create') }}" class="btn btn-primary mb-3">Add New Tag</a>

    <!-- Tabel daftar tag -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tags as $tag)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->created_at->format('d M Y, H:i') }}</td>
                    <td>{{ $tag->updated_at->format('d M Y, H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No tags found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
