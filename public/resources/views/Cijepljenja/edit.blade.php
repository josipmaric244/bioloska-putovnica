@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Uredi cijepljenje</h2>

    <form action="{{ route('cijepljenja.update',$cijepljenje->id) }}" method="POST" class="space-y-4">
        @csrf @method('PUT')
        <div>
            <label>Naziv cjepiva</label>
            <input type="text" name="naziv_cjepiva" class="w-full border px-3 py-2 rounded" value="{{ $cijepljenje->naziv_cjepiva }}" required>
        </div>
        <div>
            <label>Datum primanja</label>
            <input type="date" name="datum_primanja" class="w-full border px-3 py-2 rounded" value="{{ $cijepljenje->datum_primanja }}" required>
        </div>
        <div>
            <label>Broj doze</label>
            <input type="number" name="broj_doze" class="w-full border px-3 py-2 rounded" value="{{ $cijepljenje->broj_doze }}">
        </div>
        <div>
            <label>Status</label>
            <input type="text" name="status" class="w-full border px-3 py-2 rounded" value="{{ $cijepljenje->status }}" required>
        </div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Spremi promjene</button>
    </form>
@endsection
