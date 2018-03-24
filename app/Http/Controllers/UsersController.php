<?php

namespace App\Http\Controllers;

use App\Pokemon;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPokemon(User $user)
    {
        $pokemon = $user->pokemon->sortBy('index');
        //$letters = ['A', 'B', 'C'];
        $letters = Pokemon::firstLetters($pokemon);

        return view('users.pokemon', compact('pokemon', 'letters'));
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/');
    }
}
