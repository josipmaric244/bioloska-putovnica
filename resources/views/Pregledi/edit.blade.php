@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Uredi pregled</h2>

    <form action="{{ route('pregledi.update',$pregled->id) }}" method="POST" class="space-y-4">
        @csrf @method('PUT')
        <div>
            <label>Datum</label>
            <input type="date" name="datum" class="w-full border px-3 py-2 rounded" value="{{ $pregled->datum }}" required>
        </div>
        <div>
            <label>Vrsta pregleda</label>
            <input type="text" name="vrsta" class="w-full border px-3 py-2 rounded" value="{{ $pregled->vrsta }}" required>
        </div>
        <div>
            <label>Liječnik</label>
            <input type="text" name="lijecnik" class="w-full border px-3 py-2 rounded" value="{{ $pregled->lijecnik }}">
        </div>
        <div>
            <label>Nalaz</label>
            <textarea name="nalaz" class="w-full border px-3 py-2 rounded">{{ $pregled->nalaz }}</textarea>
        </div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Spremi promjene</button>
    </form>
@endsection
