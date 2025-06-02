@extends('Layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Login</h2>

    @if(session('success'))
        <div class="text-green-600">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login.perform') }}" class="space-y-4">
        @csrf

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Login</button>
        </div>
    </form>
</div>
@endsection
