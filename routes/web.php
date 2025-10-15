<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilKontroler;
use App\Http\Controllers\CijepljenjeKontroler;
use App\Http\Controllers\PregledKontroler;
use App\Http\Controllers\DokumentKontroler;



Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::resource('profili', ProfilKontroler::class)
        ->parameters(['profili' => 'profil']);
    Route::resource('cijepljenja', CijepljenjeKontroler::class);
    Route::resource('pregledi', PregledKontroler::class);
    Route::resource('dokumenti', DokumentKontroler::class);

    // Only super_admins can access korisnici.create and korisnici.store
    Route::resource('korisnici', App\Http\Controllers\KorisnikKontroler::class)
        ->only(['create', 'store'])
        ->middleware('can:create-admin');
});


require base_path('routes/auth.php');
