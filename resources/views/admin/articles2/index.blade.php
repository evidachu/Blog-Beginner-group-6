@extends('layouts.admin')

@section('content')
<h1>Articles</h1>
<a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">Add Article</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Tags</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
        <tr>
            <td>{{ $article->title }}</td>
            <td>{{ $article->category->name }}</td>
            <td>
                @foreach ($article->tags as $tag)
                <span class="badge bg-secondary">{{ $tag->name }}</span>
                @endforeach
            </td>
            <td>
                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
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
