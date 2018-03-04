<?php
namespace Tests\Feature;

use App\Pokemon;
use DatabaseSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PokemonTableSeeder;
use Tests\TestCase;

class PokemonTypingGameTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp()
    {
        parent::setUp();

        $databaseSeeder = new DatabaseSeeder();
        $databaseSeeder->call(PokemonTableSeeder::class);
    }

    /** @test */
    public function a_user_can_see_the_typing_game()
    {
        $response = $this->get('/')->assertSee("Pok&eacute;mon Typing Game");

        $response->assertStatus(200);
    }

    /** @test */
    public function an_authenticated_user_can_save_a_pokemon_to_their_collection()
    {
        $this->signIn();

        $pokemon = Pokemon::first();

        $formData = [
            'pokemon' => $pokemon->id,
            'user' => auth()->id()
        ];
        $this->post('/pokemon/user', $formData);

        $this->get('user/' . auth()->id() . '/pokemon')->assertSee(ucfirst($pokemon->name));
    }
}