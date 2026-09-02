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
        // usa o usuário fixo criado no UserSeeder
        $user = User::first();

        // links de trailer e capa são só exemplos - pode trocar pelos reais
        $filmes = [
            [
                'nome' => 'Matrix',
                'sinopse' => 'Um hacker descobre que a realidade é uma simulação e entra na luta contra as máquinas.',
                'ano' => 1999,
                'categoria' => 'Ficção Científica',
                'capa' => 'https://placehold.co/300x450/1f1f2e/ffffff?text=Matrix',
                'trailer' => 'https://www.youtube.com/watch?v=vKQi3bBA1y8',
            ],
            [
                'nome' => 'Interestelar',
                'sinopse' => 'Exploradores viajam por um buraco de minhoca em busca de um novo lar para a humanidade.',
                'ano' => 2014,
                'categoria' => 'Ficção Científica',
                'capa' => 'https://placehold.co/300x450/12263a/ffffff?text=Interestelar',
                'trailer' => 'https://www.youtube.com/watch?v=zSWdZVtXT7E',
            ],
            [
                'nome' => 'O Poderoso Chefão',
                'sinopse' => 'A saga de uma família da máfia italiana e a ascensão de seu filho mais novo ao poder.',
                'ano' => 1972,
                'categoria' => 'Drama',
                'capa' => 'https://placehold.co/300x450/2b2b2b/ffffff?text=O+Poderoso+Chefao',
                'trailer' => 'https://www.youtube.com/watch?v=sY1S34973zA',
            ],
            [
                'nome' => 'Coringa',
                'sinopse' => 'A origem de um comediante fracassado que se torna um dos maiores vilões de Gotham.',
                'ano' => 2019,
                'categoria' => 'Drama',
                'capa' => 'https://placehold.co/300x450/3a2e12/ffffff?text=Coringa',
                'trailer' => 'https://www.youtube.com/watch?v=zAGVQLHvwOY',
            ],
            [
                'nome' => 'Toy Story',
                'sinopse' => 'Os brinquedos de um menino ganham vida quando ninguém está olhando.',
                'ano' => 1995,
                'categoria' => 'Animação',
                'capa' => 'https://placehold.co/300x450/123a2e/ffffff?text=Toy+Story',
                'trailer' => 'https://www.youtube.com/watch?v=wmiIUN-7qhE',
            ],
            [
                'nome' => 'Corra!',
                'sinopse' => 'Um rapaz visita a família da namorada e descobre segredos assustadores.',
                'ano' => 2017,
                'categoria' => 'Terror',
                'capa' => 'https://placehold.co/300x450/3a1212/ffffff?text=Corra',
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
