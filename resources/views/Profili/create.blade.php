@extends('layouts.app')

@section('content')
    <h2>Kreiraj profil</h2>

    <form action="{{ route('profili.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Krvna grupa</label>
            <input type="text" name="krvna_grupa" class="form-control">
        </div>
        <div class="mb-3">
            <label>Alergije</label>
            <input type="text" name="alergije" class="form-control">
        </div>
        <div class="mb-3">
            <label>Visina (cm)</label>
            <input type="number" name="visina_cm" class="form-control">
        </div>
        <div class="mb-3">
            <label>Težina (kg)</label>
            <input type="number" name="tezina_kg" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Spremi</button>
    </form>
@endsection
