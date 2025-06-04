@extends('layouts.app')

@section('content')
<h1>Daftar Artikel</h1>
<a href="{{ route('articles.create') }}">+ Tambah Artikel</a>
<ul>
@foreach($articles as $article)
    <li>
        <a href="{{ route('articles.edit', $article->id) }}">{{ $article->title }}</a>
    </li>
@endforeach
</ul>
@endsection
