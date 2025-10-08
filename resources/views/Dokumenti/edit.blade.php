@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Uredi dokument</h2>

    <form action="{{ route('dokumenti.update',$dokument->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf @method('PUT')
        <div>
            <label>Naziv</label>
            <input type="text" name="naziv" class="form-control w-full border px-3 py-2 rounded" value="{{ $dokument->naziv }}" required>
        </div>
        <div>
            <label>Opis</label>
            <textarea name="opis" class="form-control w-full border px-3 py-2 rounded">{{ $dokument->opis }}</textarea>
        </div>
        <div>
            <label>Promijeni datoteku</label>
            <input type="file" name="putanja" class="form-control w-full border px-3 py-2 rounded">
            <p>Trenutna datoteka: <a href="{{ asset('storage/'.$dokument->putanja) }}" target="_blank" class="text-blue-500 hover:underline">Otvori</a></p>
        </div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Spremi promjene</button>
    </form>
@endsection
