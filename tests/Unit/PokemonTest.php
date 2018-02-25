<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Pokemon;

class PokemonTest extends TestCase
{
    use RefreshDatabase;

    public function testNextPokemonIndex()
    {
        // Set up a user with a pokemon
        $user = factory(User::class)->create();
        $pokemon1 = factory(Pokemon::class)->create();

        // Set up another pokemon
        $pokemon2 = factory(Pokemon::class)->create();

        // Add the first pokemon to the user's collection
        $pokemon1->users()->save($user);

        // Get the next pokemon index
        $nextPokemonIndex = Pokemon::nextPokemonIndex($pokemon1->index, $user);

        // Assert that the next index is $pokemon2->index
        $this->assertEquals($pokemon2->index, $nextPokemonIndex);
    }
}
