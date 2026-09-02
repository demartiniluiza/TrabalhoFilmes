<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('filmes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('sinopse');
            $table->integer('ano');
            $table->string('capa');     
            $table->string('trailer');  

           
            $table->foreignId('categoria_id')->constrained('categorias');

            
            $table->foreignId('user_id')->constrained('users');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('filmes');
    }
};
