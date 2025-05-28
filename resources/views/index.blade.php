
@section('title', 'Beranda | Kampus News')

@section('content')
<div class="container py-4">
    {{-- Hero Section --}}
    <div class="bg-light p-4 rounded mb-4 text-center">
        <h1 class="display-4">Selamat Datang di Kampus News</h1>
        <p class="lead">Portal berita terkini untuk mahasiswa dan masyarakat umum.</p>
    </div>

    {{-- Kategori --}}
    <div class="mb-4">
        <h3 class="mb-3">Kategori Populer</h3>
        <div class="d-flex flex-wrap gap-2">
            @foreach($categories as $category)
                <a href="{{ route('categories.show', $category->slug) }}" class="btn btn-outline-primary btn-sm">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>

    {{-- Artikel Terbaru --}}
    <div>
        <h3 class="mb-3">Berita Terbaru</h3>
        <div class="row">
            @forelse ($articles as $article)
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
                <p class="text-muted">Belum ada artikel.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
