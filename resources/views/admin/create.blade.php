@extends('layouts.app')
@section('titulo', 'Novo Filme')

@section('conteudo')
    <h1>Novo Filme</h1>

    <form action="{{ route('filmes.store') }}" method="POST">
        @csrf
        @include('admin.form')
        <button type="submit" class="btn">Cadastrar</button>
    </form>
@endsection
