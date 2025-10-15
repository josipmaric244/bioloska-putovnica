<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilKontroler extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user && $user->imaUlogu(['admin', 'super_admin'])) {
            // Admins and super admins see all profiles
            $profili = \App\Models\Profil::with('user')->get();
            return view('profili.all', compact('profili'));
        }
        // Regular users see their own profile or are redirected to create
        $profil = \App\Models\Profil::where('user_id', auth()->id())->first();
        if ($profil) {
            return redirect()->route('profili.show', ['profil' => $profil->id]);
        }
        return redirect()->route('profili.create');
    }

    public function create()
    {
        $profil = Profil::where('user_id', auth()->id())->first();

        if ($profil) {
            return redirect()->route('profili.edit', ['profil' => $profil->id])
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

        $profil = Profil::updateOrCreate(
            ['user_id' => auth()->id()],
            [
                'krvna_grupa' => $request->krvna_grupa,
                'alergije'    => $request->alergije,
                'visina_cm'   => $request->visina_cm,
                'tezina_kg'   => $request->tezina_kg,
            ]
        );

        return redirect()->route('profili.show', ['profil' => $profil->id])
            ->with('success', 'Profil spremljen.');
    }

    public function show(Profil $profil)
    {
        if (!$this->mozePristupiti($profil)) {
            abort(403, 'Nemaš pristup ovom profilu.');
        }

        return view('profili.show', compact('profil'));
    }

    public function edit(Profil $profil)
    {
        if (!$this->mozePristupiti($profil)) {
            abort(403, 'Nemaš pristup ovom profilu.');
        }

        return view('profili.edit', compact('profil'));
    }

    public function update(Request $request, Profil $profil)
    {
        if (!$this->mozePristupiti($profil)) {
            abort(403, 'Nemaš pristup ovom profilu.');
        }

        $request->validate([
            'krvna_grupa' => 'nullable|string|in:0-,0+,A-,A+,B-,B+,AB-,AB+',
            'alergije'    => 'nullable|string',
            'visina_cm'   => 'nullable|integer',
            'tezina_kg'   => 'nullable|numeric',
        ]);

        $profil->update($request->only(['krvna_grupa', 'alergije', 'visina_cm', 'tezina_kg']));

        return redirect()->route('profili.show', ['profil' => $profil->id])
            ->with('success', 'Profil ažuriran.');
    }

    public function destroy(Profil $profil)
    {
        if (!$this->mozePristupiti($profil)) {
            abort(403, 'Nemaš pristup ovom profilu.');
        }

        $profil->delete();

        return redirect()->route('profili.index')->with('success', 'Profil obrisan.');
    }


    private function mozePristupiti(Profil $profil): bool
    {
        $user = auth()->user();

        if (!$user) {
            return false;
        }

        if ($profil->user_id === $user->id) {
            return true;
        }


        return $user->uloge()
            ->whereIn('naziv', ['admin', 'super_admin'])
            ->exists();
    }
}
