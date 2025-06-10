@extends('layouts.app')

@section('content')
<h1>Daftar Artikel</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('articles.create') }}">+ Tambah Artikel</a>
<ul>
@foreach($articles as $article)
    <li>
        <a href="{{ route('articles.edit', $article->id) }}">{{ $article->title }}</a>

        @if(Auth::user()->role === 'admin')
        <!-- Form hapus hanya untuk admin -->
        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin mau hapus artikel ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" style="color:red; background:none; border:none; cursor:pointer;">Hapus</button>
        </form>
        @endif
    </li>
@endforeach
</ul>
@endsection
