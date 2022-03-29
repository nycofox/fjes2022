<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_user_can_register_an_account()
    {
        $this->withoutExceptionHandling();

        $this->post(route('register'), $this->validCredentials());

        $this->assertDatabaseCount('users', 1);

        $this->assertAuthenticated();
    }

    /** @test */
    function name_is_required_when_registering()
    {
        $this->post(route('register'), $this->validCredentials(['name' => '']))
            ->assertSessionHasErrors('name');

        $this->assertDatabaseCount('users', 0);
    }

    /** @test */
    function email_is_required_when_registering()
    {
        $this->post(route('register'), $this->validCredentials(['email' => '']))
            ->assertSessionHasErrors('email');

        $this->assertDatabaseCount('users', 0);
    }

    /** @test */
    function birthday_is_required_when_registering()
    {
        $this->post(route('register'), $this->validCredentials(['date_of_birth' => '']))
            ->assertSessionHasErrors('date_of_birth');

        $this->assertDatabaseCount('users', 0);
    }

    /** @test */
    function email_must_be_unique_when_registering()
    {
        User::factory()->create(['email' => 'user@example.com']);

        $this->post(route('register'), $this->validCredentials())
            ->assertSessionHasErrors('email');

        $this->assertDatabaseCount('users', 1);
    }

    /** @test */
    function password_must_be_confirmed_when_registering()
    {
        $this->post(route('register'), $this->validCredentials(['password_confirmation' => '123']))
            ->assertSessionHasErrors('password');

        $this->assertDatabaseCount('users', 0);
    }

    /** @test */
    function password_must_be_at_least_8_letters_when_registering()
    {
        $this->post(route('register'), $this->validCredentials(['password' => '12345', 'password_confirmation' => '12345']))
            ->assertSessionHasErrors('password');

        $this->assertDatabaseCount('users', 0);
    }

    private function validCredentials($overrides = array())
    {
        return array_merge([
            'name' => 'User Name',
            'email' => 'user@example.com',
            'date_of_birth' => '1980-04-02',
            'password' => 'Password1234',
            'password_confirmation' => 'Password1234',
            'accepted_terms' => 'yes',
        ], $overrides);
    }

}
