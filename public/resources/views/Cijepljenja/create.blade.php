@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Dodaj cijepljenje</h2>

    <form action="{{ route('cijepljenja.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label>Naziv cjepiva</label>
            <input type="text" name="naziv_cjepiva" class="w-full border px-3 py-2 rounded" required>
        </div>
        <div>
            <label>Datum primanja</label>
            <input type="date" name="datum_primanja" class="w-full border px-3 py-2 rounded" required>
        </div>
        <div>
            <label>Broj doze</label>
            <input type="number" name="broj_doze" class="w-full border px-3 py-2 rounded">
        </div>
        <div>
            <label>Status</label>
            <input type="text" name="status" class="w-full border px-3 py-2 rounded" required>
        </div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Spremi</button>
    </form>
@endsection
