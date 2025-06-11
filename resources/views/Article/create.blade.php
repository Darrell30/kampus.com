@extends('Layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Buat Artikel Baru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul Artikel</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Konten</label>
            <textarea name="content" id="content" rows="6"
                      class="form-control" required>{{ old('content') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar (Opsional)</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <div class="d-flex flex-wrap gap-3">
                @foreach ($categories as $category)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" 
                               name="categories[]" value="{{ $category->id }}" 
                               id="category_{{ $category->id }}"
                               {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="category_{{ $category->id }}">
                            {{ $category->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <small class="form-text text-muted">Pilih satu atau lebih kategori yang sesuai.</small>
        </div>

        <div>
            <button type="submit" class="btn btn-primary">
                Posting Artikel
            </button>
        </div>
    </form>
</div>
@endsection