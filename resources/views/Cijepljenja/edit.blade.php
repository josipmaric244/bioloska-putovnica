@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Uredi cjepivo</h2>

        <form action="{{ route('cijepljenja.update',$cijepljenje->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Naziv cjepiva</label>
                <input type="text" name="naziv_cjepiva" class="form-control" value="{{ $cijepljenje->naziv_cjepiva }}" required>
            </div>
            <div class="mb-3">
                <label>Datum primanja</label>
                <input type="date" name="datum_primanja" class="form-control" value="{{ $cijepljenje->datum_primanja }}" required>
            </div>
            <div class="mb-3">
                <label>Broj doze</label>
                <input type="number" name="broj_doze" class="form-control" value="{{ $cijepljenje->broj_doze }}">
            </div>
            <div class="mb-3">
                <label>Status</label>
                <input type="text" name="status" class="form-control" value="{{ $cijepljenje->status }}" required>
            </div>

            <button type="submit" class="btn btn-success">Spremi promjene</button>
        </form>
    </div>
@endsection
