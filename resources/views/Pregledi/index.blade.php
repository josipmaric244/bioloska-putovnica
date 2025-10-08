@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Moji pregledi</h2>
    <a href="{{ route('pregledi.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Dodaj pregled</a>

    @if(session('success'))
        <div class="mt-3 p-3 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
    @endif

    <table class="min-w-full bg-white shadow rounded mt-4">
        <thead>
        <tr class="bg-blue-600 text-white">
            <th class="px-4 py-2 text-left">Datum</th>
            <th class="px-4 py-2 text-left">Vrsta</th>
            <th class="px-4 py-2 text-left">Liječnik</th>
            <th class="px-4 py-2 text-left">Nalaz</th>
            <th class="px-4 py-2 text-left">Akcije</th>
        </tr>
        </thead>
        <tbody>
        @forelse($pregledi as $p)
            <tr class="border-b hover:bg-gray-100">
                <td class="px-4 py-2">{{ $p->datum }}</td>
                <td class="px-4 py-2">{{ $p->vrsta }}</td>
                <td class="px-4 py-2">{{ $p->lijecnik }}</td>
                <td class="px-4 py-2">{{ $p->nalaz }}</td>
                <td class="px-4 py-2 flex space-x-2">
                    <a href="{{ route('pregledi.edit',$p->id) }}" class="bg-yellow-400 px-2 py-1 rounded text-black">Uredi</a>
                    <form action="{{ route('pregledi.destroy',$p->id) }}" method="POST" onsubmit="return confirm('Sigurno obrisati?')">
                        @csrf @method('DELETE')
                        <button class="bg-red-500 px-2 py-1 rounded text-white">Obriši</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5" class="px-4 py-2 text-center text-gray-500">Nema pregleda.</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection
