<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = ['nome'];

    // Uma categoria tem MUITOS filmes -> hasMany()
    public function filmes()
    {
        return $this->hasMany(Filme::class);
    }
}
