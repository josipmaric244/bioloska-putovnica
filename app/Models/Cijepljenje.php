<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cijepljenje extends Model
{
    protected $table = 'cijepljenja';
    protected $fillable = ['user_id','naziv_cjepiva','datum_primanja','broj_doze','status'];

    public function korisnik()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
