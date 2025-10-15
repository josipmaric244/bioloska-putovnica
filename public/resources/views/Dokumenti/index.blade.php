@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Moji dokumenti</h2>
    <a href="{{ route('dokumenti.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Dodaj dokument</a>

    @if(session('success'))
        <div class="mt-3 p-3 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
    @endif

    <table class="min-w-full bg-white shadow rounded mt-4">
        <thead>
        <tr class="bg-blue-600 text-white">
            <th class="px-4 py-2 text-left">Naziv</th>
            <th class="px-4 py-2 text-left">Opis</th>
            <th class="px-4 py-2 text-left">Dokument</th>
            <th class="px-4 py-2 text-left">Akcije</th>
        </tr>
        </thead>
        <tbody>
        @forelse($dokumenti as $d)
            <tr class="border-b hover:bg-gray-100">
                <td class="px-4 py-2">{{ $d->naziv }}</td>
                <td class="px-4 py-2">{{ $d->opis }}</td>
                <td class="px-4 py-2"><a class="text-blue-500 hover:underline" href="{{ asset('storage/'.$d->putanja) }}" target="_blank">Otvori</a></td>
                <td class="px-4 py-2 flex space-x-2">
                    <a href="{{ route('dokumenti.edit',$d->id) }}" class="bg-yellow-400 px-2 py-1 rounded text-black">Uredi</a>
                    <form action="{{ route('dokumenti.destroy',$d->id) }}" method="POST" onsubmit="return confirm('Sigurno obrisati?')">
                        @csrf @method('DELETE')
                        <button class="bg-red-500 px-2 py-1 rounded text-white">Obriši</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4" class="px-4 py-2 text-center text-gray-500">Nema dokumenata.</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection
