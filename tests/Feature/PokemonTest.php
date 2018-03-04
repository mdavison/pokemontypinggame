<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PokemonTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_see_their_pokemon_collection()
    {
        $this->signIn();

        $response = $this->get('/user/'. auth()->id() . '/pokemon')->assertSee("My Pok&eacute;mon");

        $response->assertStatus(200);
    }
}