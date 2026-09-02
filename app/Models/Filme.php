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

    // Um filme pertence a UMA categoria -> belongsTo()
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Um filme pertence ao usuário que o cadastrou -> belongsTo()
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Transforma o link normal do YouTube no link de "embed" (para mostrar o vídeo na página)
    public function getTrailerEmbedAttribute()
    {
        $url = $this->trailer;

        if (str_contains($url, 'watch?v=')) {
            $id = explode('&', explode('watch?v=', $url)[1])[0];
        } elseif (str_contains($url, 'youtu.be/')) {
            $id = explode('?', explode('youtu.be/', $url)[1])[0];
        } else {
            $id = $url; // caso o usuário cole só o código do vídeo
        }

        return 'https://www.youtube.com/embed/' . $id;
    }
}
