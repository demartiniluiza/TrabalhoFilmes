<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Filmes')</title>

 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>

        * { box-sizing: border-box; }

        body {
            font-family: 'Poppins', Arial, sans-serif;
            background-color: #f3f1ea;   
            color: #2b2b2b;
            margin: 0;
        }

        header { background-color: #6d597a; padding: 15px 25px; }
        header a { color: #fff; text-decoration: none; margin-right: 20px; font-weight: 600; }

        .container { max-width: 950px; margin: 25px auto; padding: 0 15px; }

       
        .galeria { display: grid; grid-template-columns: repeat(auto-fill, minmax(160px, 1fr)); gap: 18px; }
        .card { background: #fff; border-radius: 8px; overflow: hidden; text-align: center; text-decoration: none; color: #2b2b2b; }
        .card img { width: 100%; display: block; }
        .card span { display: block; padding: 8px; font-weight: 600; }

        
        table { width: 100%; border-collapse: collapse; background: #fff; margin-top: 15px; }
        th, td { padding: 10px; border-bottom: 1px solid #ddd; text-align: left; }

        
        label { display: block; margin-top: 12px; font-weight: 600; }
        input, textarea, select {
            width: 100%; padding: 8px; margin-top: 4px;
            border: 1px solid #bbb; border-radius: 5px; font-family: inherit;
        }

        
        .btn {
            display: inline-block; margin-top: 15px; padding: 8px 16px;
            background: #6d597a; color: #fff; border: none; border-radius: 5px;
            text-decoration: none; cursor: pointer; font-family: inherit;
        }
        .aviso { background: #d8f3dc; padding: 10px; border-radius: 5px; margin-bottom: 15px; }
        .erro { color: #b00020; font-size: 14px; }
    </style>
</head>
<body>
    <header>
        <a href="{{ route('galeria.index') }}">Galeria</a>
        <a href="{{ route('filmes.index') }}">Administração</a>
    </header>

    <div class="container">
        @if (session('ok'))
            <div class="aviso">{{ session('ok') }}</div>
        @endif

        @yield('conteudo')
    </div>
</body>
</html>
