@extends('layouts.app')

@section('content')
    <h1>Welcome, {{ Auth::user()->name }}!</h1>
    <p>You have successfully registered.</p>
@endsection
