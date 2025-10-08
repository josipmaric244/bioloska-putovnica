<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilKontroler extends Controller
{
    public function index()
    {
        $profil = Profil::where('user_id', auth()->id())->first();

        if ($profil) {
            return redirect()->route('profili.show', $profil->id);
        }

        return redirect()->route('profili.create');
    }


    public function create()
    {

        if (Profil::where('user_id', auth()->id())->exists()) {
            $profil = Profil::where('user_id', auth()->id())->first();
            return redirect()->route('profili.edit', $profil->id)
                ->with('info', 'Profil već postoji — možeš ga urediti.');
        }

        return view('profili.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'krvna_grupa' => 'nullable|string|in:0-,0+,A-,A+,B-,B+,AB-,AB+',
            'alergije'    => 'nullable|string',
            'visina_cm'   => 'nullable|integer',
            'tezina_kg'   => 'nullable|numeric',
        ]);

        $profil = Profil::create([
            'user_id'      => auth()->id(),
            'krvna_grupa'  => $request->krvna_grupa,
            'alergije'     => $request->alergije,
            'visina_cm'    => $request->visina_cm,
            'tezina_kg'    => $request->tezina_kg,
        ]);

        return redirect()->route('profili.show', $profil->id)
            ->with('success', 'Profil kreiran.');
    }


    public function show(Profil $profil)
    {
        abort_unless($profil->user_id === auth()->id(), 403);
        return view('profili.show', compact('profil'));
    }



    public function edit(Profil $profil)
    {
        abort_unless($profil->user_id === auth()->id(), 403);
        return view('profili.edit', compact('profil'));
    }


    public function update(Request $request, Profil $profil)
    {
        abort_unless($profil->user_id === auth()->id(), 403);

        $request->validate([
            'krvna_grupa' => 'nullable|string|in:0-,0+,A-,A+,B-,B+,AB-,AB+',
            'alergije'    => 'nullable|string',
            'visina_cm'   => 'nullable|integer',
            'tezina_kg'   => 'nullable|numeric',
        ]);

        $profil->update($request->only(['krvna_grupa','alergije','visina_cm','tezina_kg']));

        return redirect()->route('profili.show', $profil->id)
            ->with('success', 'Profil ažuriran.');
    }



    public function destroy(Profil $profil)
    {
        abort_unless($profil->user_id === auth()->id(), 403);

        $profil->delete();

        return redirect()->route('profili.index')->with('success', 'Profil obrisan.');
    }
}
