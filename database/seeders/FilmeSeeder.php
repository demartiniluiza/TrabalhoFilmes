<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Filme;
use App\Models\User;
use Illuminate\Database\Seeder;

class FilmeSeeder extends Seeder
{
    public function run(): void
    {
       
        $user = User::first();

        
        $filmes = [
            [
                'nome' => 'Matrix',
                'sinopse' => 'Um hacker descobre que a realidade é uma simulação e entra na luta contra as máquinas.',
                'ano' => 1999,
                'categoria' => 'Ficção Científica',
                'capa' => 'https://image.tmdb.org/t/p/w500/f89U3ADr1oiB1s9GkdPOEpXUk5H.jpg',
                'trailer' => 'https://www.youtube.com/watch?v=vKQi3bBA1y8',
            ],
            [
                'nome' => 'Interestelar',
                'sinopse' => 'Exploradores viajam por um buraco de minhoca em busca de um novo lar para a humanidade.',
                'ano' => 2014,
                'categoria' => 'Ficção Científica',
                'capa' => 'https://image.tmdb.org/t/p/w500/gEU2QniE6E77NI6lCU6MxlNBvIx.jpg',
                'trailer' => 'https://www.youtube.com/watch?v=zSWdZVtXT7E',
            ],
            [
                'nome' => 'O Poderoso Chefão',
                'sinopse' => 'A saga de uma família da máfia italiana e a ascensão de seu filho mais novo ao poder.',
                'ano' => 1972,
                'categoria' => 'Drama',
                'capa' => 'https://image.tmdb.org/t/p/w500/3bhkrj58Vtu7enYsRolD1fZdja1.jpg',
                'trailer' => 'https://www.youtube.com/watch?v=sY1S34973zA',
            ],
            [
                'nome' => 'Coringa',
                'sinopse' => 'A origem de um comediante fracassado que se torna um dos maiores vilões de Gotham.',
                'ano' => 2019,
                'categoria' => 'Drama',
                'capa' => 'https://image.tmdb.org/t/p/w500/udDclJoHjfjb8Ekgsd4FDteOkCU.jpg',
                'trailer' => 'https://www.youtube.com/watch?v=zAGVQLHvwOY',
            ],
            [
                'nome' => 'Toy Story',
                'sinopse' => 'Os brinquedos de um menino ganham vida quando ninguém está olhando.',
                'ano' => 1995,
                'categoria' => 'Animação',
                'capa' => 'https://image.tmdb.org/t/p/w500/uXDfjJbdP4ijW5hWSBrPrlKpxab.jpg',
                'trailer' => 'https://www.youtube.com/watch?v=wmiIUN-7qhE',
            ],
            [
                'nome' => 'Corra!',
                'sinopse' => 'Um rapaz visita a família da namorada e descobre segredos assustadores.',
                'ano' => 2017,
                'categoria' => 'Terror',
                'capa' => 'https://image.tmdb.org/t/p/w500/tFXcEccSQMf3lfhfXKSU9iRBpa3.jpg',
                'trailer' => 'https://www.youtube.com/watch?v=DzfpyUB60YY',
            ],
        ];

        foreach ($filmes as $f) {
            $categoria = Categoria::where('nome', $f['categoria'])->first();

            Filme::create([
                'nome' => $f['nome'],
                'sinopse' => $f['sinopse'],
                'ano' => $f['ano'],
                'capa' => $f['capa'],
                'trailer' => $f['trailer'],
                'categoria_id' => $categoria->id,
                'user_id' => $user->id,
            ]);
        }
    }
}
