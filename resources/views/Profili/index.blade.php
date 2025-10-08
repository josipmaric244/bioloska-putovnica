@extends('layouts.app')

@section('content')
    <h2>Moj profil</h2>
    @if($profil)
        <ul>
            <li>Krvna grupa: {{ $profil->krvna_grupa }}</li>
            <li>Alergije: {{ $profil->alergije }}</li>
            <li>Visina: {{ $profil->visina_cm }} cm</li>
            <li>Težina: {{ $profil->tezina_kg }} kg</li>
        </ul>
        <a href="{{ route('profili.edit',$profil->id) }}" class="btn btn-warning">Uredi</a>
        <form action="{{ route('profili.destroy',$profil->id) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger">Obriši</button>
        </form>
    @else
        <p>Profil nije kreiran.</p>
        <a href="{{ route('profili.create') }}" class="btn btn-primary">Kreiraj profil</a>
    @endif
@endsection
