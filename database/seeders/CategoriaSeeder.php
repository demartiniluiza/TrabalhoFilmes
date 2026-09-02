<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = ['Ação', 'Comédia', 'Drama', 'Ficção Científica', 'Terror', 'Animação'];

        foreach ($categorias as $nome) {
            Categoria::create(['nome' => $nome]);
        }
    }
}
