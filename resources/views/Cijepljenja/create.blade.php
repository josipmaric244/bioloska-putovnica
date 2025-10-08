@extends('layouts.app')

@section('content')
    <h2>Dodaj novo cjepivo</h2>

    <form action="{{ route('cijepljenja.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Naziv cjepiva</label>
            <input type="text" name="naziv_cjepiva" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Datum primanja</label>
            <input type="date" name="datum_primanja" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Broj doze</label>
            <input type="number" name="broj_doze" class="form-control">
        </div>
        <div class="mb-3">
            <label>Status</label>
            <input type="text" name="status" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Spremi</button>
    </form>
@endsection
