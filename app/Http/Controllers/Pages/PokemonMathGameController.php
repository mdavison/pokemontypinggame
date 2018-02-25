<?php

namespace App\Http\Controllers\Pages;

use App\Equation;
use App\Http\Controllers\Controller;
use App\Pokemon;
use Auth;
use Illuminate\Http\Request;

class PokemonMathGameController extends Controller
{
    public function index()
    {
        $equation = Equation::first();
        $pokemon = Pokemon::first();
        $user = Auth::user();

        $pokemonToLoseImage = '';
        $pokemonToLoseName = '';
        $pokemonToLoseID = '';

        if ($user) {
            $pokemon = Pokemon::nextPokemonNotInCollection($user);
            $pokemonToLose = Pokemon::randomPokemonInCollection($user);

            $pokemonToLoseImage = $pokemonToLose ? $pokemonToLose->image : '';
            $pokemonToLoseName = $pokemonToLose ? $pokemonToLose->name : '';
            $pokemonToLoseID = $pokemonToLose ? $pokemonToLose->id : '';
        }

        return view('pages.math-game', compact('equation', 'pokemon', 'pokemonToLoseImage', 'pokemonToLoseName', 'pokemonToLoseID'));
    }

    public function show(Equation $equation)
    {
        $pokemon = Pokemon::random();
        $user = Auth::user();
        $pokemonToLoseImage = '';
        $pokemonToLoseName = '';
        $pokemonToLoseID = '';

        if ($user) {
            $usersPokemon = $user->pokemon->sortBy('index')->last();
            if ($usersPokemon) {
                $pokemon = Pokemon::randomPokemonNotInCollection($user);
                $pokemonToLose = Pokemon::randomPokemonInCollection($user);

                $pokemonToLoseImage = $pokemonToLose ? $pokemonToLose->image : '';
                $pokemonToLoseName = $pokemonToLose ? $pokemonToLose->name : '';
                $pokemonToLoseID = $pokemonToLose ? $pokemonToLose->id : '';
            }
        }

        return view('pages.math-game', compact('equation', 'pokemon', 'pokemonToLoseImage', 'pokemonToLoseName', 'pokemonToLoseID'));
    }
}
