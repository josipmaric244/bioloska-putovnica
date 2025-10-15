@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-2">Biološka putovnica</h1>
    <p class="text-lg mb-6">Dobrodošao, {{ auth()->user()->name }}!</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="{{ route('profili.index') }}"
           class="block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-4 px-6 rounded shadow text-center">
            Profil
        </a>
        <a href="{{ route('cijepljenja.index') }}"
           class="block bg-green-500 hover:bg-green-600 text-white font-semibold py-4 px-6 rounded shadow text-center">
            Cijepljenja
        </a>
        <a href="{{ route('pregledi.index') }}"
           class="block bg-yellow-500 hover:bg-yellow-600 text-black font-semibold py-4 px-6 rounded shadow text-center">
            Pregledi
        </a>
        <a href="{{ route('dokumenti.index') }}"
           class="block bg-purple-500 hover:bg-purple-600 text-white font-semibold py-4 px-6 rounded shadow text-center">
            Dokumenti
        </a>
    </div>

    <div class="mt-8">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded">
                Odjava
            </button>
        </form>
    </div>
@endsection
