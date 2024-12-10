@extends('admin.admin')

@section('content')
<div class="container mt-5">
    <h1>Edit Artikel</h1>
    <form action="{{ route('admin.articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="title">Judul</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="category_id">Kategori</label>
            <select class="form-control" id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="tags">Tag</label>
            <select class="form-control" id="tags" name="tags[]" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ $article->tags->contains($tag->id) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="content">Konten</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ $article->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Perbarui</button>
    </form>
</div>
@endsection
