@extends('layouts.app')

@section('content')
    <h2>Uredi profil</h2>

    <form action="{{ route('profili.update',$profil->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Krvna grupa</label>
            <input type="text" name="krvna_grupa" class="form-control" value="{{ $profil->krvna_grupa }}">
        </div>
        <div class="mb-3">
            <label>Alergije</label>
            <input type="text" name="alergije" class="form-control" value="{{ $profil->alergije }}">
        </div>
        <div class="mb-3">
            <label>Visina (cm)</label>
            <input type="number" name="visina_cm" class="form-control" value="{{ $profil->visina_cm }}">
        </div>
        <div class="mb-3">
            <label>Težina (kg)</label>
            <input type="number" name="tezina_kg" class="form-control" value="{{ $profil->tezina_kg }}">
        </div>

        <button type="submit" class="btn btn-success">Spremi promjene</button>
    </form>
@endsection
