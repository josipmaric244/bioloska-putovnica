@extends('layouts.app')

@section('content')
    <h2>Uredi dokument</h2>

    <form action="{{ route('dokumenti.update',$dokument->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Naziv</label>
            <input type="text" name="naziv" class="form-control" value="{{ $dokument->naziv }}" required>
        </div>
        <div class="mb-3">
            <label>Opis</label>
            <textarea name="opis" class="form-control">{{ $dokument->opis }}</textarea>
        </div>
        <div class="mb-3">
            <label>Promijeni datoteku</label>
            <input type="file" name="putanja" class="form-control">
            <p>Trenutna datoteka: <a href="{{ asset('storage/'.$dokument->putanja) }}" target="_blank">Otvori</a></p>
        </div>
        <button type="submit" class="btn btn-success">Spremi promjene</button>
    </form>
@endsection
