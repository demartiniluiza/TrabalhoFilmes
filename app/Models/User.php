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

    // Um usuário cadastra MUITOS filmes -> hasMany()
    public function filmes()
    {
        return $this->hasMany(Filme::class);
    }

    // O último filme cadastrado por esse usuário -> hasOne()
    public function ultimoFilme()
    {
        return $this->hasOne(Filme::class)->latestOfMany();
    }
}
