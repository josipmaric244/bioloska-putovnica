@extends('layouts.app')

@section('content')
    <h2>Dodaj pregled</h2>

    <form action="{{ route('pregledi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Datum</label>
            <input type="date" name="datum" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Vrsta pregleda</label>
            <input type="text" name="vrsta" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Liječnik</label>
            <input type="text" name="lijecnik" class="form-control">
        </div>
        <div class="mb-3">
            <label>Nalaz</label>
            <textarea name="nalaz" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Spremi</button>
    </form>
@endsection
