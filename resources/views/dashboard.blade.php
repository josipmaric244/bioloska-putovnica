@extends('layouts.app')

@section('content')
    <h1>Biološka putovnica – Dashboard</h1>
    <p>Dobrodošao, {{ auth()->user()->name }}!</p>

    <div class="list-group mt-4">
        <a href="{{ route('profili.index') }}" class="list-group-item list-group-item-action">
            👤 Profil
        </a>
        <a href="{{ route('cijepljenja.index') }}" class="list-group-item list-group-item-action">
            💉 Cijepljenja
        </a>
        <a href="{{ route('pregledi.index') }}" class="list-group-item list-group-item-action">
            🏥 Pregledi
        </a>
        <a href="{{ route('dokumenti.index') }}" class="list-group-item list-group-item-action">
            📂 Dokumenti
        </a>
    </div>

    <div class="mt-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Odjava</button>
        </form>
    </div>
@endsection
