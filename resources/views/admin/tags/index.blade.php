@extends('layouts.admin')

@section('content')
<h1>Manage Tags</h1>
<a href="{{ route('tags.create') }}" class="btn btn-primary mb-3">Add Tag</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tags as $tag)
        <tr>
            <td>{{ $tag->name }}</td>
            <td>
                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
