<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Filme;
use Illuminate\Http\Request;

class GaleriaController extends Controller
{
    // Galeria de filmes (seção do usuário) com filtro por ano e categoria
    public function index(Request $request)
    {
        $query = Filme::with('categoria');

        // filtro por categoria (só aplica se veio preenchido)
        if ($request->filled('categoria_id')) {
            $query->where('categoria_id', $request->categoria_id);
        }

        // filtro por ano
        if ($request->filled('ano')) {
            $query->where('ano', $request->ano);
        }

        $filmes = $query->orderBy('nome')->get();

        // listas usadas nos selects do filtro
        $categorias = Categoria::orderBy('nome')->get();
        $anos = Filme::select('ano')->distinct()->orderBy('ano', 'desc')->pluck('ano');

        return view('galeria.index', compact('filmes', 'categorias', 'anos'));
    }

    // Página com mais informações do filme e o trailer
    public function show(Filme $filme)
    {
        $filme->load(['categoria', 'usuario']);

        return view('galeria.show', compact('filme'));
    }
}
