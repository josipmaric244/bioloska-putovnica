@extends('layouts.app')

@section('content')
    <h2>Moji pregledi</h2>
    <a href="{{ route('pregledi.create') }}" class="btn btn-primary mb-3">Dodaj pregled</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Datum</th>
            <th>Vrsta pregleda</th>
            <th>Liječnik</th>
            <th>Nalaz</th>
            <th>Akcije</th>
        </tr>
        @foreach($pregledi as $p)
            <tr>
                <td>{{ $p->datum }}</td>
                <td>{{ $p->vrsta }}</td>
                <td>{{ $p->lijecnik }}</td>
                <td>{{ $p->nalaz }}</td>
                <td>
                    <a href="{{ route('pregledi.edit',$p->id) }}" class="btn btn-sm btn-warning">Uredi</a>
                    <form action="{{ route('pregledi.destroy',$p->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Obriši</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
