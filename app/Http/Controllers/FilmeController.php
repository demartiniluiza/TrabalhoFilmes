<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Filme;
use App\Models\User;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    // Listagem dos filmes na administração (com opção de editar e excluir)
    public function index()
    {
        $filmes = Filme::with(['categoria', 'usuario'])->orderBy('nome')->get();

        return view('admin.index', compact('filmes'));
    }

    // Formulário de cadastro
    public function create()
    {
        $categorias = Categoria::orderBy('nome')->get();

        return view('admin.create', compact('categorias'));
    }

    // Salva o novo filme no banco
    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome'         => 'required',
            'sinopse'      => 'required',
            'ano'          => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
            'capa'         => 'required',
            'trailer'      => 'required',
        ]);

        // usuário fixo (não temos login) -> chave estrangeira exigida no PDF
        $dados['user_id'] = User::first()->id;

        Filme::create($dados);

        return redirect()->route('filmes.index')->with('ok', 'Filme cadastrado com sucesso!');
    }

    // Formulário de edição
    public function edit(Filme $filme)
    {
        $categorias = Categoria::orderBy('nome')->get();

        return view('admin.edit', compact('filme', 'categorias'));
    }

    // Atualiza o filme no banco
    public function update(Request $request, Filme $filme)
    {
        $dados = $request->validate([
            'nome'         => 'required',
            'sinopse'      => 'required',
            'ano'          => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
            'capa'         => 'required',
            'trailer'      => 'required',
        ]);

        $filme->update($dados);

        return redirect()->route('filmes.index')->with('ok', 'Filme atualizado com sucesso!');
    }

    // Exclui o filme
    public function destroy(Filme $filme)
    {
        $filme->delete();

        return redirect()->route('filmes.index')->with('ok', 'Filme excluído com sucesso!');
    }
}
