@extends('layouts.app')

@section('title', $article->title . ' | Kampus News')

@section('content')
<div class="container py-4">
    <h1 class="mb-3">{{ $article->title }}</h1>
    <p class="text-muted">
        Ditulis oleh <strong>{{ $article->user->name }}</strong>
        pada {{ $article->created_at->format('d M Y') }}
    </p>

    @if($article->image)
        <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid rounded mb-4" alt="{{ $article->title }}">
    @endif

    <div class="mb-3">
        <strong>Kategori:</strong>
        @foreach($article->categories as $category)
            <a href="{{ route('categories.show', $category->slug) }}" class="badge bg-primary text-white">{{ $category->name }}</a>
        @endforeach
    </div>

    <div class="article-content mb-4">
        {!! $article->content !!}
    </div>

    <hr>

    {{-- Komentar --}}
    <div class="mt-5">
        <h5>Komentar ({{ $article->comments->count() }})</h5>

        {{-- Form Komentar --}}
        @auth
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('comments.store', $article->slug) }}" method="POST" class="mb-4">
                @csrf
                <div class="mb-3">
                    <textarea name="comment" class="form-control" rows="3" placeholder="Tulis komentar...">{{ old('comment') }}</textarea>
                    @error('comment')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Kirim Komentar</button>
            </form>
        @else
            <p>Silakan <a href="{{ route('login') }}">login</a> untuk menulis komentar.</p>
        @endauth

        {{-- List Komentar --}}
        @if($article->comments->count())
            <ul class="list-unstyled">
                @foreach($article->comments->sortByDesc('created_at') as $comment)
                    <li class="mb-3 border-bottom pb-2">
                        <div class="d-flex justify-content-between">
                            <div>
                                <strong>{{ $comment->user->name }}</strong>
                                <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                            </div>
                            @include('partials.delete-comment-button', ['comment' => $comment])
                        </div>
                        <p class="mb-0">{{ $comment->comment }}</p>
                    </li>
                @endforeach
            </ul>

        @else
            <p class="text-muted">Belum ada komentar.</p>
        @endif
    </div>
</div>
@endsection
