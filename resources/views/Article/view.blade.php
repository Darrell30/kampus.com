@extends('layouts.app')

@section('title', $article->title . ' | Kampus News')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-lg-8">
            {{-- Article Header --}}
            <div class="mb-4">
                <h1 class="display-5">{{ $article->title }}</h1>
                <div class="text-muted mb-3">
                    <small>
                        Ditulis oleh <strong>{{ $article->user->name }}</strong> 
                        pada {{ $article->created_at->format('d F Y, H:i') }}
                    </small>
                </div>
                
                {{-- Categories --}}
                <div class="mb-3">
                    @foreach($article->categories as $category)
                        <a href="{{ route('categories.show', $category->slug) }}" class="badge bg-primary text-decoration-none me-1">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Article Image --}}
            @if($article->image)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $article->image) }}" 
                         class="img-fluid rounded" 
                         alt="{{ $article->title }}">
                </div>
            @endif

            {{-- Article Content --}}
            <div class="article-content mb-5">
                {!! nl2br(e($article->content)) !!}
            </div>

            {{-- Comments Section --}}
            <div class="comments-section">
                <h4>Komentar ({{ $article->comments->count() }})</h4>
                
                {{-- Comment Form --}}
                <div class="card mb-4">
                    <div class="card-body">
                        <h6>Tulis Komentar</h6>
                        <form action="{{ route('comments.store', $article->slug) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="author_name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="author_name" name="author_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="author_email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="author_email" name="author_email" required>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Komentar</label>
                                <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                        </form>
                    </div>
                </div>

                {{-- Comments List --}}
                @forelse($article->comments as $comment)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="card-title mb-1">{{ $comment->author_name }}</h6>
                                    <small class="text-muted">{{ $comment->created_at->format('d F Y, H:i') }}</small>
                                </div>
                            </div>
                            <p class="card-text mt-2">{{ $comment->content }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Belum ada komentar. Jadilah yang pertama berkomentar!</p>
                @endforelse
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h6>Artikel Terkait</h6>
                </div>
                <div class="card-body">
                    <p class="text-muted">Fitur artikel terkait akan segera hadir.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection