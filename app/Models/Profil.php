<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table = 'profili';
    protected $fillable = ['user_id', 'krvna_grupa', 'alergije', 'visina_cm', 'tezina_kg'];

    public function korisnik()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
