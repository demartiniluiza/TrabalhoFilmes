<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Usuário fixo: como não temos tela de login, todo filme é cadastrado por ele.
        User::create([
            'name' => 'Admin',
            'email' => 'admin@filmes.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
