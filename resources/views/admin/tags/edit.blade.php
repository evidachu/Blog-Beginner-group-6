@extends('admin.admin')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Edit Tag</h1>

    <!-- Form edit tag -->
    <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Tag Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $tag->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
