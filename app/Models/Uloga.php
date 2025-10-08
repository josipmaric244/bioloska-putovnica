<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uloga extends Model
{
    protected $table = 'uloge';
    protected $fillable = ['naziv'];

    public function korisnici()
    {
        return $this->belongsToMany(User::class, 'korisnik_uloga');
    }

    public function dozvole()
    {
        return $this->belongsToMany(Dozvola::class, 'dozvola_uloga');
    }
}
