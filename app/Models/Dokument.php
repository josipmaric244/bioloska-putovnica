<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokument extends Model
{
    protected $table = 'dokumenti';
    protected $fillable = ['user_id', 'naziv', 'opis', 'putanja'];

    public function korisnik()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
