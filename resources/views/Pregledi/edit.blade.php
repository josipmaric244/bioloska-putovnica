@extends('layouts.app')

@section('content')
    <h2>Uredi pregled</h2>

    <form action="{{ route('pregledi.update',$pregled->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Datum</label>
            <input type="date" name="datum" class="form-control" value="{{ $pregled->datum }}" required>
        </div>
        <div class="mb-3">
            <label>Vrsta pregleda</label>
            <input type="text" name="vrsta" class="form-control" value="{{ $pregled->vrsta }}" required>
        </div>
        <div class="mb-3">
            <label>Liječnik</label>
            <input type="text" name="lijecnik" class="form-control" value="{{ $pregled->lijecnik }}">
        </div>
        <div class="mb-3">
            <label>Nalaz</label>
            <textarea name="nalaz" class="form-control">{{ $pregled->nalaz }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Spremi promjene</button>
    </form>
@endsection
