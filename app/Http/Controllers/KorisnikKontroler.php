<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Uloga;
use Illuminate\Http\Request;

class KorisnikKontroler extends Controller
{
    public function index()
    {
        $korisnici = User::with('uloge')->get();
        return view('korisnici.index', compact('korisnici'));
    }

    public function create()
    {
        $uloge = Uloga::all();
        return view('korisnici.create', compact('uloge'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'uloge'    => 'array',
        ]);

        $korisnik = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $korisnik->uloge()->sync($request->uloge);

        return redirect()->route('korisnici.index')->with('success', 'Korisnik dodan.');
    }

    public function edit(User $korisnik)
    {
        $uloge = Uloga::all();
        return view('korisnici.edit', compact('korisnik', 'uloge'));
    }

    public function update(Request $request, User $korisnik)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $korisnik->id,
            'uloge' => 'array',
        ]);

        $korisnik->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        if ($request->filled('password')) {
            $korisnik->password = bcrypt($request->password);
            $korisnik->save();
        }

        $korisnik->uloge()->sync($request->uloge);

        return redirect()->route('korisnici.index')->with('success', 'Korisnik ažuriran.');
    }

    public function destroy(User $korisnik)
    {
        $korisnik->delete();
        return redirect()->route('korisnici.index')->with('success', 'Korisnik obrisan.');
    }
}
