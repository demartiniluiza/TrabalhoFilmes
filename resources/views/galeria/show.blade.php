@extends('layouts.app')
@section('titulo', $filme->nome)

@section('conteudo')
    <a href="{{ route('galeria.index') }}">&larr; Voltar para a galeria</a>

    <h1>{{ $filme->nome }} ({{ $filme->ano }})</h1>
    <p><strong>Categoria:</strong> {{ $filme->categoria->nome }}</p>
    <p>{{ $filme->sinopse }}</p>

    <h3>Trailer</h3>
   
    <iframe width="560" height="315" src="{{ $filme->trailer_embed }}"
            frameborder="0" allowfullscreen style="max-width:100%;"></iframe>

    <p><a href="{{ $filme->trailer }}" target="_blank" class="btn">Assistir no YouTube</a></p>
@endsection
