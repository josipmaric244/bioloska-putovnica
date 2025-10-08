<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilKontroler extends Controller
{
    public function index()
    {
        $profil = Profil::where('user_id', auth()->id())->first();
        return view('profili.index', compact('profil'));
    }

    public function create()
    {
        return view('profili.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'krvna_grupa' => 'nullable|string',
            'alergije' => 'nullable|string',
            'visina_cm' => 'nullable|integer',
            'tezina_kg' => 'nullable|numeric',
        ]);

        Profil::create([
            'user_id' => auth()->id(),
            'krvna_grupa' => $request->krvna_grupa,
            'alergije' => $request->alergije,
            'visina_cm' => $request->visina_cm,
            'tezina_kg' => $request->tezina_kg,
        ]);

        return redirect()->route('profili.index')->with('success', 'Profil kreiran.');
    }

    public function edit(Profil $profil)
    {
        return view('profili.edit', compact('profil'));
    }

    public function update(Request $request, Profil $profil)
    {
        $profil->update($request->all());
        return redirect()->route('profili.index')->with('success', 'Profil ažuriran.');
    }

    public function destroy(Profil $profil)
    {
        $profil->delete();
        return redirect()->route('profili.index')->with('success', 'Profil obrisan.');
    }
}
