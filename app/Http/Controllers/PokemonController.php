<?php

namespace App\Http\Controllers;

use App\Pokemon;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PokemonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return Pokemon::get(['index', 'name', 'image']);
    }

    /**
     * This method is used via AJAX
     *
     * @return string
     */
    public function storeUser()
    {
        $this->validate(request(), [
            'pokemon' => 'required',
            'user' => 'required'
        ]);

        // Make sure the user is the currently logged in user
        if (Auth::user()->id != request('user')) {
            return 'User ID does not match currently logged in user';
        }

        $pokemon = Pokemon::find(request('pokemon'));
        $user = User::find(request('user'));

        // Find out if user already has this pokemon
        if ($user->hasPokemon($pokemon->id)) {
            return 'User already has this Pokemon: ID='. $pokemon->id . ' index=' . $pokemon->index;
        }

        if (!empty($pokemon) && !empty($user)) {
            $pokemon->users()->save($user);
        }

        return '';
    }

    /**
     * This method is used via AJAX
     *
     * @return string
     */
    public function removeUser()
    {
        $this->validate(request(), [
            'remove-pokemon' => 'required',
            'user' => 'required'
        ]);

        // Make sure the user is the currently logged in user
        if (Auth::user()->id != request('user')) {
            return 'User ID does not match currently logged in user';
        }

        $pokemon = Pokemon::find(request('remove-pokemon'));
        $user = User::find(request('user'));

        if (empty($pokemon)) {
            return 'Unable to find Pokemon: ' . request('remove-pokemon');
        }

        if (empty($user)) {
            return 'Unable to find User: ' . request('user');
        }

        // Remove this pokemon from this user
        $pokemon->users()->detach($user->id);

        return '';
    }
}
