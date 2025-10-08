@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Dodaj pregled</h2>

    <form action="{{ route('pregledi.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label>Datum</label>
            <input type="date" name="datum" class="w-full border px-3 py-2 rounded" required>
        </div>
        <div>
            <label>Vrsta pregleda</label>
            <input type="text" name="vrsta" class="w-full border px-3 py-2 rounded" required>
        </div>
        <div>
            <label>Liječnik</label>
            <input type="text" name="lijecnik" class="w-full border px-3 py-2 rounded">
        </div>
        <div>
            <label>Nalaz</label>
            <textarea name="nalaz" class="w-full border px-3 py-2 rounded"></textarea>
        </div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Spremi</button>
    </form>
@endsection
