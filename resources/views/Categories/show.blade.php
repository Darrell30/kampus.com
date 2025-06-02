@extends('layouts.app')

@section('title', $category->name . ' | Kampus News')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Kategori: {{ $category->name }}</h2>

    <div class="row">
        @forelse($articles as $article)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('articles.show', $article->slug) }}" class="text-dark">
                                {{ $article->title }}
                            </a>
                        </h5>
                        <p class="card-text text-muted small">{{ Str::limit(strip_tags($article->content), 100) }}</p>
                    </div>
                    <div class="card-footer text-muted small">
                        Ditulis oleh {{ $article->user->name }} pada {{ $article->created_at->format('d M Y') }}
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada artikel dalam kategori ini.</p>
        @endforelse
    </div>

    <a href="{{ route('home') }}" class="btn btn-secondary mt-3">← Kembali ke Beranda</a>
</div>
@endsection
