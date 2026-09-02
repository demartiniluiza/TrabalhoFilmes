@extends('layouts.app')
@section('titulo', 'Galeria de Filmes')

@section('conteudo')
    <h1>Filmes</h1>

    
    <form method="GET" action="{{ route('galeria.index') }}">
        <div style="display:flex; gap:10px; flex-wrap:wrap; align-items:flex-end;">
            <div style="flex:1;">
                <label>Categoria</label>
                <select name="categoria_id">
                    <option value="">Todas</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div style="flex:1;">
                <label>Ano</label>
                <select name="ano">
                    <option value="">Todos</option>
                    @foreach ($anos as $ano)
                        <option value="{{ $ano }}" {{ request('ano') == $ano ? 'selected' : '' }}>{{ $ano }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn">Filtrar</button>
        </div>
    </form>

   
    @if ($filmes->isEmpty())
        <p>Nenhum filme encontrado.</p>
    @else
        <div class="galeria" style="margin-top:20px;">
            @foreach ($filmes as $filme)
                <a href="{{ route('galeria.show', $filme) }}" class="card">
                    <img src="{{ $filme->capa }}" alt="{{ $filme->nome }}">
                    <span>{{ $filme->nome }}</span>
                </a>
            @endforeach
        </div>
    @endif
@endsection
