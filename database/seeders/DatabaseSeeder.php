<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // a ordem importa: primeiro o usuário e as categorias, depois os filmes
        $this->call([
            UserSeeder::class,
            CategoriaSeeder::class,
            FilmeSeeder::class,
        ]);
    }
}
