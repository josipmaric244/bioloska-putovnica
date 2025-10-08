<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }


    public function profil()
    {
        return $this->hasOne(Profil::class, 'user_id');
    }

    public function cijepljenja()
    {
        return $this->hasMany(Cijepljenje::class, 'user_id');
    }

    public function pregledi()
    {
        return $this->hasMany(Pregled::class, 'user_id');
    }
 function dokumenti()
    {
        return $this->hasMany(Dokument::class, 'user_id');
    }

    public function uloge()
    {
        return $this->belongsToMany(Uloga::class, 'korisnik_uloga', 'user_id', 'uloga_id');
    }

    /**
     *
     * @param  string|array  $uloge
     * @return bool
     */
    public function imaUlogu($uloge): bool
    {
        $uloge = (array) $uloge;

        return $this->uloge()
            ->whereIn('naziv', $uloge)
            ->exists();
    }

    /**
     *
     * @return bool
     */
    public function jeAdmin(): bool
    {
        return $this->imaUlogu(['admin', 'super_admin']);
    }
}
