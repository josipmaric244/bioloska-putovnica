@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Svi profili</h2>
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Ime</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Krvna grupa</th>
                <th class="py-2 px-4 border-b">Alergije</th>
                <th class="py-2 px-4 border-b">Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach($profili as $profil)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $profil->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $profil->user->name ?? '-' }}</td>
                    <td class="py-2 px-4 border-b">{{ $profil->user->email ?? '-' }}</td>
                    <td class="py-2 px-4 border-b">{{ $profil->krvna_grupa }}</td>
                    <td class="py-2 px-4 border-b">{{ $profil->alergije }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('profili.show', ['profil' => $profil->id]) }}" class="text-blue-600 hover:underline">Prikaži</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
