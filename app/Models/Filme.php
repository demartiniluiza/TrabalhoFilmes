<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    protected $table = 'filmes';

    protected $fillable = [
        'nome',
        'sinopse',
        'ano',
        'capa',
        'trailer',
        'categoria_id',
        'user_id',
    ];

    
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

   
    public function getTrailerEmbedAttribute()
    {
        $url = $this->trailer;

        if (str_contains($url, 'watch?v=')) {
            $id = explode('&', explode('watch?v=', $url)[1])[0];
        } elseif (str_contains($url, 'youtu.be/')) {
            $id = explode('?', explode('youtu.be/', $url)[1])[0];
        } else {
            $id = $url;
        }

        return 'https://www.youtube.com/embed/' . $id;
    }
}
