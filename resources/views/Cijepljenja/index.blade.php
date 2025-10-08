@extends('layouts.app')

@section('content')
    <h2>Moja cijepljenja</h2>
    <a href="{{ route('cijepljenja.create') }}" class="btn btn-primary mb-3">Dodaj cjepivo</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Naziv cjepiva</th>
            <th>Datum primanja</th>
            <th>Broj doze</th>
            <th>Status</th>
            <th>Akcije</th>
        </tr>
        @foreach($cijepljenja as $c)
            <tr>
                <td>{{ $c->naziv_cjepiva }}</td>
                <td>{{ $c->datum_primanja }}</td>
                <td>{{ $c->broj_doze }}</td>
                <td>{{ $c->status }}</td>
                <td>
                    <a href="{{ route('cijepljenja.edit',$c->id) }}" class="btn btn-sm btn-warning">Uredi</a>
                    <form action="{{ route('cijepljenja.destroy',$c->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Obriši</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
