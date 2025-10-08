<?php

namespace App\Http\Controllers;

use App\Models\Dokument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumentKontroler extends Controller
{
    public function index()
    {
        $dokumenti = Dokument::where('user_id', auth()->id())->get();
        return view('dokumenti.index', ['dokumenti' => $dokumenti]);;
    }

    public function create()
    {
        return view('dokumenti.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'naziv' => 'required|string|max:255',
            'opis' => 'nullable|string',
            'putanja' => 'required|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
        ]);

        $path = $request->file('putanja')->store('dokumenti', 'public');

        Dokument::create([
            'user_id' => auth()->id(),
            'naziv' => $request->naziv,
            'opis' => $request->opis,
            'putanja' => $path,
        ]);

        return redirect()->route('dokumenti.index')->with('success', 'Dokument uspješno dodan.');
    }

    public function edit(Dokument $dokument)
    {
        return view('dokumenti.edit', compact('dokument'));
    }

    public function update(Request $request, Dokument $dokument)
    {
        $request->validate([
            'naziv' => 'required|string|max:255',
            'opis' => 'nullable|string',
            'putanja' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
        ]);

        if ($request->hasFile('putanja')) {
            Storage::disk('public')->delete($dokument->putanja);
            $path = $request->file('putanja')->store('dokumenti', 'public');
            $dokument->putanja = $path;
        }

        $dokument->naziv = $request->naziv;
        $dokument->opis = $request->opis;
        $dokument->save();

        return redirect()->route('dokumenti.index')->with('success', 'Dokument ažuriran.');
    }

    public function destroy(Dokument $dokument)
    {
        Storage::disk('public')->delete($dokument->putanja);
        $dokument->delete();
        return redirect()->route('dokumenti.index')->with('success', 'Dokument obrisan.');
    }
}
