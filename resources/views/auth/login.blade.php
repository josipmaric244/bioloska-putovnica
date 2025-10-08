@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-bold text-center mb-6">Prijava</h2>

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block font-medium">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                           class="w-full border px-3 py-2 rounded focus:ring focus:ring-green-300" required autofocus>
                    @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block font-medium">Lozinka</label>
                    <input id="password" type="password" name="password"
                           class="w-full border px-3 py-2 rounded focus:ring focus:ring-green-300" required>
                    @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember">Zapamti me</label>
                </div>

                <button type="submit"
                        class="w-full bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                    Prijava
                </button>
            </form>

            <p class="mt-4 text-center text-sm">
                Nemaš račun?
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Registriraj se</a>
            </p>
        </div>
    </div>
@endsection
