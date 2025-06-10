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
            <label for="categories" class="form-label">Kategori</label>
            <select name="categories[]" id="categories" multiple required
                    class="form-select w-auto" style="height: auto; max-width: 250px; overflow-y: auto;">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ in_array($category->id, old('categories', [])) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <small class="form-text text-muted">Gunakan Ctrl (Windows) / Command (Mac) untuk memilih lebih dari satu.</small>
        </div>

        <div>
            <button type="submit" class="btn btn-primary">
                Posting Artikel
            </button>
        </div>
    </form>
</div>
@endsection
