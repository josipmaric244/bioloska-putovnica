@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Dodaj administratora</h2>
    <form method="POST" action="{{ route('korisnici.store') }}" class="max-w-lg bg-white p-6 rounded shadow">
        @csrf
        <div class="mb-4">
            <label for="name" class="block font-semibold mb-1">Ime</label>
            <input type="text" name="name" id="name" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block font-semibold mb-1">Email</label>
            <input type="email" name="email" id="email" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block font-semibold mb-1">Lozinka</label>
            <input type="password" name="password" id="password" class="w-full border rounded px-3 py-2" required>
        </div>
        <input type="hidden" name="uloge[]" value="{{ $adminRoleId }}">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Dodaj administratora</button>
    </form>
@endsection
