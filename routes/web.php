<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilKontroler;
use App\Http\Controllers\CijepljenjeKontroler;
use App\Http\Controllers\PregledKontroler;
use App\Http\Controllers\DokumentKontroler;


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::resource('profili', ProfilKontroler::class);
    Route::resource('cijepljenja', CijepljenjeKontroler::class);
    Route::resource('pregledi', PregledKontroler::class);
    Route::resource('dokumenti', DokumentKontroler::class);

});

require __DIR__.'/auth.php';
