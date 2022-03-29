<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_registered_user_can_login()
    {
        User::factory()->create(['email' => 'user@example.com']);

        $this->post(route('login'), ['email' => 'user@example.com', 'password' => 'password'])
            ->assertRedirect('/home');

        $this->assertAuthenticated();
    }


}
