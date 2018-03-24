<?php
namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ManageAccountTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_unauthenticated_user_cannot_access_the_dashboard()
    {
        $this->get('/home')->assertRedirect('/login');
    }

    /** @test */
    public function an_authenticated_user_can_access_their_dashboard()
    {
        $this->signIn();

        $this->get('/home')->assertSee('My Account');
    }

    /** @test */
    public function an_authenticated_user_can_update_their_account_details()
    {
        $this->signIn();

        $user = User::find(auth()->id());

        $this->get('/home')->assertSee($user->name)->assertSee($user->email);

        $updatedName = 'Updated My Name';
        $updatedDetails = [
            'name' => $updatedName,
        ];

        $this->post('/user/' . $user->id . '/account/update', $updatedDetails);
        $this->assertDatabaseHas('users', ['id' => $user->id, 'name' => $updatedName]);

        $this->get('/home')->assertSee($updatedName)->assertSee($user->email);
    }

    /** @test */
    public function a_user_cannot_update_their_account_with_invalid_name()
    {
        $this->signIn();

        $user = User::find(auth()->id());

        $this->post('/user/' . $user->id . '/account/update', ['name' => ''])->assertSessionHasErrors('name');

        $this->assertDatabaseMissing('users', ['id' => $user->id, 'name' => '']);

        $nameThatIsTooLong = '';

        // Create a string that is 256 characters long
        for ($i = 0; $i < 256; $i++) {
            $nameThatIsTooLong .= 'a';
        }
        $this->post('/user/' . $user->id . '/account/update', ['name' => $nameThatIsTooLong])->assertSessionHasErrors('name');

        $this->assertDatabaseMissing('users', ['id' => $user->id, 'name' => $nameThatIsTooLong]);
    }

    /** @test */
    public function a_user_cannot_update_their_account_with_invalid_email()
    {
        $this->signIn();

        $user = User::find(auth()->id());

        $this->post('/user/' . $user->id . '/account/update', ['email' => ''])->assertSessionHasErrors('email');

        $this->assertDatabaseMissing('users', ['id' => $user->id, 'email' => '']);

        $invalidEmail = 'invalid-email-adddress';
        $this->post('/user/' . $user->id . '/account/update', ['email' => $invalidEmail])->assertSessionHasErrors('email');

        $this->assertDatabaseMissing('users', ['id' => $user->id, 'email' => $invalidEmail]);
    }

    /** @test */
    public function a_user_can_delete_their_account()
    {
        $this->signIn();

        $user = User::find(auth()->id());
        $this->delete('/user/' . $user->id . '/account')->assertRedirect('/');

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
