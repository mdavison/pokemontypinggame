<?php

namespace App\Http\Controllers;

use App\Pokemon;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function showPokemon(User $user)
    {
        $pokemon = $user->pokemon->sortBy('index');
        //$letters = ['A', 'B', 'C'];
        $letters = Pokemon::firstLetters($pokemon);

        return view('users.pokemon', compact('pokemon', 'letters'));
    }

    public function update(User $user)
    {
        $this->validate(request(), [
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users,id,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = request('name') ?: $user->name;
        $user->email = request('email') ?: $user->email;
        $user->password = request('password') ? Hash::make(request('password')) : $user->password;

        $user->save();

        return back();
    }
}
