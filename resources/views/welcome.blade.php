<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meus Filmes</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; background: #f3f4f6; color: #1f2937; font-family: Arial, sans-serif; }
        header { padding: 28px 20px; background: #1f2937; color: white; text-align: center; }
        main { max-width: 900px; margin: 32px auto; padding: 0 20px; display: grid; grid-template-columns: 1fr 1fr; gap: 24px; }
        section { padding: 24px; background: white; border-radius: 8px; box-shadow: 0 1px 4px #0001; }
        h1, h2 { margin-top: 0; } label { display: block; margin-top: 14px; font-weight: bold; }
        input, textarea { width: 100%; margin-top: 6px; padding: 10px; border: 1px solid #d1d5db; border-radius: 4px; font: inherit; }
        button { margin-top: 20px; padding: 11px 16px; border: 0; border-radius: 4px; background: #2563eb; color: white; font-weight: bold; cursor: pointer; }
        .message { padding: 12px; color: #166534; background: #dcfce7; border-radius: 4px; }.error { color: #b91c1c; font-size: 13px; }
        .film { padding: 14px 0; border-bottom: 1px solid #e5e7eb; }.film:last-child { border-bottom: 0; }.film h3 { margin: 0 0 5px; }.film p { margin: 0; color: #4b5563; }
        @media (max-width: 680px) { main { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    <header><h1>Meus Filmes</h1><p>Primeira etapa do sistema de gerenciamento de filmes</p></header>
    <main>
        <section>
            <h2>Cadastrar filme</h2>
            @if(session('success')) <p class="message">{{ session('success') }}</p> @endif
            <form method="post" action="{{ route('films.store') }}">
                @csrf
                <label for="title">Nome</label><input id="title" name="title" value="{{ old('title') }}" required>
                @error('title') <p class="error">{{ $message }}</p> @enderror
                <label for="year">Ano</label><input id="year" name="year" type="number" value="{{ old('year') }}" min="1888" max="{{ now()->year }}" required>
                @error('year') <p class="error">{{ $message }}</p> @enderror
                <label for="genre">Gênero</label><input id="genre" name="genre" value="{{ old('genre') }}" placeholder="Ex.: Ação" required>
                @error('genre') <p class="error">{{ $message }}</p> @enderror
                <label for="synopsis">Sinopse</label><textarea id="synopsis" name="synopsis" rows="5" required>{{ old('synopsis') }}</textarea>
                @error('synopsis') <p class="error">{{ $message }}</p> @enderror
                <button type="submit">Salvar filme</button>
            </form>
        </section>
        <section>
            <h2>Filmes cadastrados</h2>
            @forelse($films as $film)
                <article class="film"><h3>{{ $film->title }} ({{ $film->year }})</h3><p><strong>Gênero:</strong> {{ $film->genre }}</p><p>{{ $film->synopsis }}</p></article>
            @empty
                <p>Ainda não há filmes cadastrados.</p>
            @endforelse
        </section>
    </main>
</body>
</html>
