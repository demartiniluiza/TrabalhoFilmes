<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FilmController extends Controller
{
    public function index(): View
    {
        return view('welcome', ['films' => Film::latest()->get()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'year' => ['required', 'integer', 'min:1888', 'max:'.now()->year],
            'genre' => ['required', 'string', 'max:80'],
            'synopsis' => ['required', 'string', 'max:1000'],
        ]);

        Film::create($data);

        return redirect()->route('films.index')->with('success', 'Filme cadastrado com sucesso!');
    }
}
