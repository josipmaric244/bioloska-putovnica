@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-bold text-center mb-6">Registracija</h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block font-medium">Ime i prezime</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}"
                           class="w-full border px-3 py-2 rounded focus:ring focus:ring-green-300" required>
                    @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block font-medium">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                           class="w-full border px-3 py-2 rounded focus:ring focus:ring-green-300" required>
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

                <div>
                    <label for="password_confirmation" class="block font-medium">Potvrdi lozinku</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                           class="w-full border px-3 py-2 rounded focus:ring focus:ring-green-300" required>
                </div>

                <button type="submit"
                        class="w-full bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                    Registracija
                </button>
            </form>

            <p class="mt-4 text-center text-sm">
                Već imaš račun?
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Prijavi se</a>
            </p>
        </div>
    </div>
@endsection
