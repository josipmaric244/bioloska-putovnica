@extends('layouts.app')

@section('content')
    <h2>Dodaj dokument</h2>

    <form action="{{ route('dokumenti.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Naziv</label>
            <input type="text" name="naziv" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Opis</label>
            <textarea name="opis" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Datoteka</label>
            <input type="file" name="putanja" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Spremi</button>
    </form>
@endsection
