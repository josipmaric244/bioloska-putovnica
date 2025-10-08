@extends('layouts.app')

@section('content')
    <h2>Moji dokumenti</h2>
    <a href="{{ route('dokumenti.create') }}" class="btn btn-primary mb-3">Dodaj dokument</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Naziv</th>
            <th>Opis</th>
            <th>Dokument</th>
            <th>Akcije</th>
        </tr>
        @forelse($dokumenti as $d)
            <tr>
                <td>{{ $d->naziv }}</td>
                <td>{{ $d->opis }}</td>
                <td><a href="{{ asset('storage/'.$d->putanja) }}" target="_blank">Otvori</a></td>
                <td>
                    <a href="{{ route('dokumenti.edit',$d->id) }}" class="btn btn-sm btn-warning">Uredi</a>
                    <form action="{{ route('dokumenti.destroy',$d->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Obriši</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">Nema dokumenata.</td></tr>
        @endforelse
    </table>
@endsection
