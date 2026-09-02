@extends('layouts.app')
@section('titulo', 'Editar Filme')

@section('conteudo')
    <h1>Editar Filme</h1>

    <form action="{{ route('filmes.update', $filme) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.form')
        <button type="submit" class="btn">Salvar alterações</button>
    </form>
@endsection
