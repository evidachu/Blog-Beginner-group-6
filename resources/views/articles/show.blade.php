@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <div class="container article-container">
        <!-- Article Header -->
        <div class="article-header">
            <h1 class="article-title">{{ $article->title }}</h1>
            <div class="article-meta">
                Ditulis oleh <strong>{{ $article->user->name }}</strong> 
                pada {{ $article->created_at->format('d M Y') }} |
                Kategori: <strong>{{ $article->category->name }}</strong>
            </div>
        </div>

        <!-- Article Image -->
        @if ($article->image)
    <div class="article-image">
        <img src="{{ asset('storage/' . $article->image) }}" alt="Image for {{ $article->title }}">
    </div>
@endif


        <!-- Article Content -->
        <div class="article-content">
            {!! nl2br(e($article->full_text)) !!}
        </div>


<!-- Article Tags -->
@if ($article->tags->count() > 0)
    <div class="article-tags mt-3">
        <strong>Tags:</strong>
        @foreach ($article->tags as $tag)
            <span class="badge bg-primary text-white">{{ $tag->name }}</span>
        @endforeach
    </div>
@endif


        <!-- Back to Home Link -->
        <div class="article-back">
            <a href="{{ route('articles.index') }}" class="back-link">← Kembali ke Beranda</a>
        </div>
    </div>
@endsection

@section('head')
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection
