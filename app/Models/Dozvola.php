<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dozvola extends Model
{
    protected $table = 'dozvole';
    protected $fillable = ['naziv'];

    public function uloge()
    {
        return $this->belongsToMany(Uloga::class, 'dozvola_uloga');
    }
}
