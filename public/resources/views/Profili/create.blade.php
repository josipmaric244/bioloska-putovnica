@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Kreiraj profil</h2>

    <form action="{{ route('profili.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label>Krvna grupa</label>
            <select name="krvna_grupa" class="w-full border px-3 py-2 rounded">
                <option value="">-- Odaberi --</option>
                <option value="0-">0-</option>
                <option value="0+">0+</option>
                <option value="A-">A-</option>
                <option value="A+">A+</option>
                <option value="B-">B-</option>
                <option value="B+">B+</option>
                <option value="AB-">AB-</option>
                <option value="AB+">AB+</option>
            </select>
        </div>

        <div>
            <label>Alergije</label>
            <input type="text" name="alergije" class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label>Visina (cm)</label>
            <input type="number" name="visina_cm" class="w-full border px-3 py-2 rounded">
        </div>

        <div>
            <label>Težina (kg)</label>
            <input type="number" step="0.01" name="tezina_kg" class="w-full border px-3 py-2 rounded">
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Spremi</button>
    </form>
@endsection
