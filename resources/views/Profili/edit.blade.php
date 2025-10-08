@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Uredi profil</h2>

    <form action="{{ route('profili.update',$profil->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label>Krvna grupa</label>
            <select name="krvna_grupa" class="w-full border px-3 py-2 rounded">
                <option value="">-- Odaberi --</option>
                <option value="0-" {{ $profil->krvna_grupa == '0-' ? 'selected' : '' }}>0-</option>
                <option value="0+" {{ $profil->krvna_grupa == '0+' ? 'selected' : '' }}>0+</option>
                <option value="A-" {{ $profil->krvna_grupa == 'A-' ? 'selected' : '' }}>A-</option>
                <option value="A+" {{ $profil->krvna_grupa == 'A+' ? 'selected' : '' }}>A+</option>
                <option value="B-" {{ $profil->krvna_grupa == 'B-' ? 'selected' : '' }}>B-</option>
                <option value="B+" {{ $profil->krvna_grupa == 'B+' ? 'selected' : '' }}>B+</option>
                <option value="AB-" {{ $profil->krvna_grupa == 'AB-' ? 'selected' : '' }}>AB-</option>
                <option value="AB+" {{ $profil->krvna_grupa == 'AB+' ? 'selected' : '' }}>AB+</option>
            </select>
        </div>

        <div>
            <label>Alergije</label>
            <input type="text" name="alergije" class="w-full border px-3 py-2 rounded" value="{{ $profil->alergije }}">
        </div>

        <div>
            <label>Visina (cm)</label>
            <input type="number" name="visina_cm" class="w-full border px-3 py-2 rounded" value="{{ $profil->visina_cm }}">
        </div>

        <div>
            <label>Težina (kg)</label>
            <input type="number" step="0.01" name="tezina_kg" class="w-full border px-3 py-2 rounded" value="{{ $profil->tezina_kg }}">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Spremi promjene</button>
    </form>
@endsection
