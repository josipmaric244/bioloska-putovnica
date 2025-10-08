<?php

namespace App\Http\Controllers;

use App\Models\Pregled;
use Illuminate\Http\Request;

class PregledKontroler extends Controller
{
    public function index()
    {
        $pregledi = Pregled::where('user_id', auth()->id())->get();
        return view('pregledi.index', compact('pregledi'));
    }

    public function create()
    {
        return view('pregledi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'datum' => 'required|date',
            'vrsta' => 'required|string|max:255',
            'lijecnik' => 'nullable|string|max:255',
            'nalaz' => 'nullable|string',
        ]);

        Pregled::create([
            'user_id' => auth()->id(),
            'datum' => $request->datum,
            'vrsta' => $request->vrsta,
            'lijecnik' => $request->lijecnik,
            'nalaz' => $request->nalaz,
        ]);

        return redirect()->route('pregledi.index')->with('success', 'Pregled dodan.');
    }

    public function edit(Pregled $pregled)
    {
        return view('pregledi.edit', compact('pregled'));
    }

    public function update(Request $request, Pregled $pregled)
    {
        $pregled->update($request->all());
        return redirect()->route('pregledi.index')->with('success', 'Pregled ažuriran.');
    }

    public function destroy(Pregled $pregled)
    {
        $pregled->delete();
        return redirect()->route('pregledi.index')->with('success', 'Pregled obrisan.');
    }
}
