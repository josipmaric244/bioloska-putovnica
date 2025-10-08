@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Moja cijepljenja</h2>
    <a href="{{ route('cijepljenja.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Dodaj cijepljenje</a>

    @if(session('success'))
        <div class="mt-3 p-3 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
    @endif

    <table class="min-w-full bg-white shadow rounded mt-4">
        <thead>
        <tr class="bg-blue-600 text-white">
            <th class="px-4 py-2 text-left">Naziv cjepiva</th>
            <th class="px-4 py-2 text-left">Datum</th>
            <th class="px-4 py-2 text-left">Broj doze</th>
            <th class="px-4 py-2 text-left">Status</th>
            <th class="px-4 py-2 text-left">Akcije</th>
        </tr>
        </thead>
        <tbody>
        @forelse($cijepljenja as $c)
            <tr class="border-b hover:bg-gray-100">
                <td class="px-4 py-2">{{ $c->naziv_cjepiva }}</td>
                <td class="px-4 py-2">{{ $c->datum_primanja }}</td>
                <td class="px-4 py-2">{{ $c->broj_doze }}</td>
                <td class="px-4 py-2">{{ $c->status }}</td>
                <td class="px-4 py-2 flex space-x-2">
                    <a href="{{ route('cijepljenja.edit',$c->id) }}" class="bg-yellow-400 px-2 py-1 rounded text-black">Uredi</a>
                    <form action="{{ route('cijepljenja.destroy',$c->id) }}" method="POST" onsubmit="return confirm('Sigurno obrisati?')">
                        @csrf @method('DELETE')
                        <button class="bg-red-500 px-2 py-1 rounded text-white">Obriši</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5" class="px-4 py-2 text-center text-gray-500">Nema zapisa.</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection
