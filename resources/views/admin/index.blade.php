@extends('layouts.app')
@section('titulo', 'Administração')

@section('conteudo')
    <h1>Administração de Filmes</h1>

    <a href="{{ route('filmes.create') }}" class="btn">+ Novo filme</a>

    @if ($filmes->isEmpty())
        <p>Nenhum filme cadastrado ainda.</p>
    @else
        <table>
            <tr>
                <th>Nome</th>
                <th>Ano</th>
                <th>Categoria</th>
                <th>Cadastrado por</th>
                <th>Ações</th>
            </tr>
            @foreach ($filmes as $filme)
                <tr>
                    <td>{{ $filme->nome }}</td>
                    <td>{{ $filme->ano }}</td>
                    <td>{{ $filme->categoria->nome }}</td>
                    <td>{{ $filme->usuario->name }}</td>
                    <td>
                        <a href="{{ route('filmes.edit', $filme) }}">Editar</a>
                        |
                        <form action="{{ route('filmes.destroy', $filme) }}" method="POST"
                              style="display:inline;" onsubmit="return confirm('Excluir este filme?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    style="border:none; background:none; color:#b00020; cursor:pointer; padding:0; font-family:inherit;">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection
