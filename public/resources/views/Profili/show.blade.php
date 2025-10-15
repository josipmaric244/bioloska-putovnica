@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Moj profil</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @elseif(session('info'))
        <div class="bg-blue-100 text-blue-800 px-4 py-2 mb-4 rounded">
            {{ session('info') }}
        </div>
    @endif

    @if($profil)
        <div class="bg-white shadow rounded p-4 space-y-2">
            <p><strong>Korisnik:</strong> {{ $profil->korisnik->name ?? auth()->user()->name }}</p>
            <p><strong>Email:</strong> {{ $profil->korisnik->email ?? auth()->user()->email }}</p>
            <p><strong>Krvna grupa:</strong> {{ $profil->krvna_grupa ?? '-' }}</p>
            <p><strong>Alergije:</strong> {{ $profil->alergije ?? '-' }}</p>
            <p><strong>Visina:</strong> {{ $profil->visina_cm ?? '-' }} cm</p>
            <p><strong>Težina:</strong> {{ $profil->tezina_kg ?? '-' }} kg</p>
        </div>

        <a href="{{ route('profili.edit', ['profil' => $profil->id]) }}"
           class="bg-yellow-400 text-black px-4 py-2 rounded mt-4 inline-block hover:bg-yellow-500">
            Uredi profil
        </a>
    @else
        <div class="bg-red-100 text-red-800 px-4 py-2 rounded">
            Profil još nije kreiran.
        </div>

        <a href="{{ route('profili.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded mt-4 inline-block hover:bg-blue-600">
            Kreiraj profil
        </a>
    @endif
@endsection
