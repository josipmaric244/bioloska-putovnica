<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pregled extends Model
{
    protected $table = 'pregledi';
    protected $fillable = ['user_id', 'datum', 'vrsta', 'lijecnik', 'nalaz'];

    public function korisnik()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
