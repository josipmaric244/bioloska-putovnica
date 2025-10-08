<?php

use App\Http\Controllers\ProfilKontroler;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CijepljenjeKontroler;
use App\Http\Controllers\PregledKontroler;
use App\Http\Controllers\DokumentKontroler;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profili', [ProfilKontroler::class, 'edit'])->name('profile.edit');
    Route::patch('/profili', [ProfilKontroler::class, 'update'])->name('profile.update');
    Route::delete('/profili', [ProfilKontroler::class, 'destroy'])->name('profile.destroy');
    Route::resource('profili', ProfilKontroler::class);
    Route::resource('cijepljenja', CijepljenjeKontroler::class);
    Route::resource('pregledi', PregledKontroler::class);
    Route::resource('dokumenti', DokumentKontroler::class);
});

require __DIR__.'/auth.php';
