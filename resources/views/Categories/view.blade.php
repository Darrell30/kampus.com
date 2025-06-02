@extends('layouts.app')

@section('title', $category->name . ' | Kampus News')

@section('content')
<div class="container py-4">
    {{-- Category Header --}}
    <div class="mb-4">
        <h1 class="display-5">{{ $category->name }}</h1>
        @if($category->description)
            <p class="lead text-muted">{{ $category->description }}</p>
        @endif
    </div>

    {{-- Articles in Category --}}
    <div class="row">
        @forelse($articles as $article)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    @if($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" 
                             class="card-img-top" 
                             alt="{{ $article->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('articles.show', $article->slug) }}" class="text-dark text-decoration-none">
                                {{ $article->title }}
                            </a>
                        </h5>
                        <p class="card-text text-muted small">
                            {{ Str::limit(strip_tags($article->content), 120) }}
                        </p>
                    </div>
                    <div class="card-footer text-muted small">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>{{ $article->user->name }}</span>
                            <span>{{ $article->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <h5>Belum Ada Artikel</h5>
                    <p class="mb-0">Kategori ini belum memiliki artikel. Silakan cek lagi nanti!</p>
                </div>
            </div>
        @endforelse
    </div>

    {{-- Pagination (jika menggunakan paginate) --}}
    @if(method_exists($articles, 'links'))
        <div class="d-flex justify-content-center">
            {{ $articles->links() }}
        </div>
    @endif
</div>
@endsection