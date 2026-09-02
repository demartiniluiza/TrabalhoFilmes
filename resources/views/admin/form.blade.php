
@php $filme = $filme ?? null; @endphp

<label>Nome</label>
<input type="text" name="nome" value="{{ old('nome', $filme?->nome) }}">

<label>Sinopse</label>
<textarea name="sinopse" rows="4">{{ old('sinopse', $filme?->sinopse) }}</textarea>

<label>Ano</label>
<input type="number" name="ano" value="{{ old('ano', $filme?->ano) }}">

<label>Categoria</label>
<select name="categoria_id">
    <option value="">Selecione...</option>
    @foreach ($categorias as $categoria)
        <option value="{{ $categoria->id }}"
            {{ old('categoria_id', $filme?->categoria_id) == $categoria->id ? 'selected' : '' }}>
            {{ $categoria->nome }}
        </option>
    @endforeach
</select>

<label>Link da imagem da capa</label>
<input type="text" name="capa" value="{{ old('capa', $filme?->capa) }}" placeholder="https://...">

<label>Link do trailer no YouTube</label>
<input type="text" name="trailer" value="{{ old('trailer', $filme?->trailer) }}"
       placeholder="https://www.youtube.com/watch?v=...">

@if ($errors->any())
    <ul class="erro">
        @foreach ($errors->all() as $erro)
            <li>{{ $erro }}</li>
        @endforeach
    </ul>
@endif
