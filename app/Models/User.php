<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function profil()
    {
        return $this->hasOne(Profil::class);
    }

    public function cijepljenja()
    {
        return $this->hasMany(Cijepljenje::class);
    }

    public function pregledi()
    {
        return $this->hasMany(Pregled::class);
    }

    public function dokumenti()
    {
        return $this->hasMany(Dokument::class);
    }

    public function uloge()
    {
        return $this->belongsToMany(Uloga::class, 'korisnik_uloga');
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
