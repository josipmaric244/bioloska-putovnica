<?php

namespace App\Http\Controllers;

use App\Models\Cijepljenje;
use Illuminate\Http\Request;

class CijepljenjeKontroler extends Controller
{
    public function index()
    {
        $cijepljenja = Cijepljenje::where('user_id', auth()->id())->get();
        return view('cijepljenja.index', compact('cijepljenja'));
    }

    public function create()
    {
        return view('cijepljenja.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'naziv_cjepiva'   => 'required|string|max:255',
            'datum_primanja'  => 'required|date',
            'broj_doze'       => 'nullable|integer|min:1|max:10',
            'status'          => 'nullable|string|max:255',
        ]);

        Cijepljenje::create([
            'user_id'         => auth()->id(),
            'naziv_cjepiva'   => $request->naziv_cjepiva,
            'datum_primanja'  => $request->datum_primanja,
            'broj_doze'       => $request->broj_doze,
            'status'          => $request->status,
        ]);

        return redirect()->route('cijepljenja.index')->with('success', 'Cjepivo dodano.');
    }

    public function show(Cijepljenje $cijepljenje)
    {
        abort_unless($cijepljenje->user_id === auth()->id(), 403);
        return view('cijepljenja.show', compact('cijepljenje'));
    }

    public function edit(Cijepljenje $cijepljenje)
    {
        abort_unless($cijepljenje->user_id === auth()->id(), 403);
        return view('cijepljenja.edit', compact('cijepljenje'));
    }

    public function update(Request $request, Cijepljenje $cijepljenje)
    {
        abort_unless($cijepljenje->user_id === auth()->id(), 403);

        $request->validate([
            'naziv_cjepiva'   => 'required|string|max:255',
            'datum_primanja'  => 'required|date',
            'broj_doze'       => 'nullable|integer|min:1|max:10',
            'status'          => 'nullable|string|max:255',
        ]);

        $cijepljenje->update($request->only(['naziv_cjepiva', 'datum_primanja', 'broj_doze', 'status']));

        return redirect()->route('cijepljenja.index')->with('success', 'Cjepivo ažurirano.');
    }

    public function destroy(Cijepljenje $cijepljenje)
    {
        abort_unless($cijepljenje->user_id === auth()->id(), 403);
        $cijepljenje->delete();

        return redirect()->route('cijepljenja.index')->with('success', 'Cjepivo obrisano.');
    }
}
