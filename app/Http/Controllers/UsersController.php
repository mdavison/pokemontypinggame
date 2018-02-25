<?php

namespace App\Http\Controllers;

use App\Pokemon;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function showPokemon(User $user)
    {
        $pokemon = $user->pokemon->sortBy('index');
        //$letters = ['A', 'B', 'C'];
        $letters = Pokemon::firstLetters($pokemon);

        return view('users.pokemon', compact('pokemon', 'letters'));
    }
}
