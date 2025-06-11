@extends('layouts.app') {{-- Ganti ini sesuai layout utama kamu, atau hapus jika tidak pakai layout --}}

@section('content')
<div class="max-w-md mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-6">Register</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Name --}}
        <div class="mb-4">
            <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus autocomplete="name"
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            @error('name')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email"
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            @error('email')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mb-4">
            <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
            <input id="password" name="password" type="password" required autocomplete="new-password"
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            @error('password')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Confirm Password --}}
        <div class="mb-6">
            <label for="password_confirmation" class="block font-medium text-sm text-gray-700">Confirm Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            @error('password_confirmation')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('login') }}" class="text-sm text-blue-500 hover:underline">Already registered?</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Register
            </button>
        </div>
    </form>
</div>
@endsection
