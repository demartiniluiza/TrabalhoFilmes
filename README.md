# Meus Filmes

Primeira etapa de um sistema simples de gerenciamento de filmes em Laravel.

Nesta entrega foi implementado apenas o cadastro de filmes com nome, ano, gênero e sinopse. Os filmes cadastrados aparecem na tela inicial.

## Como executar

```bash
composer install
php artisan key:generate
php artisan migrate:fresh
php artisan serve
```

Abra `http://127.0.0.1:8000` no navegador.
