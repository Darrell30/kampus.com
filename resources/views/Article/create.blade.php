@extends('Layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Buat Artikel Baru</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label for="title" class="block font-semibold">Judul Artikel</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                   class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div>
            <label for="content" class="block font-semibold">Konten</label>
            <textarea name="content" id="content" rows="6"
                      class="w-full border border-gray-300 p-2 rounded" required>{{ old('content') }}</textarea>
        </div>

        <div>
            <label for="image" class="block font-semibold">Gambar (Opsional)</label>
            <input type="file" name="image" id="image" class="w-full">
        </div>

        <div>
            <label for="categories" class="block font-semibold">Kategori</label>
            <select name="categories[]" id="categories" multiple required
                    class="w-full border border-gray-300 p-2 rounded">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ in_array($category->id, old('categories', [])) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <small class="text-gray-500">Gunakan Ctrl (Windows) / Command (Mac) untuk memilih lebih dari satu.</small>
        </div>

        <div>
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Posting Artikel
            </button>
        </div>
    </form>
</div>
@endsection
    