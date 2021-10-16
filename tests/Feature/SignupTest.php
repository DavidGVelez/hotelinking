<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class SignupTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_access_signup_page()
    {
        $response = $this->get('signup');

        $response->assertSuccessful();
        $response->assertViewIs('signup');
    }

    public function test_user_can_signup_with_correct_credentials()
    {
        $user = User::factory()->make([
            'password' => bcrypt($password = 'testing'),
        ]);

        $response = $this->post(route('signup'), [
            'email' => $user->email,
            'password' => $password,
            'confirm_password' => $password
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('home'));
    }

    public function test_user_cannot_signup_if_user_already_exists()
    {
        $user = User::factory()->create([
            'password' => bcrypt('testing'),
        ]);

        $response = $this->post(route('signup'), [
            'email' => $user->email,
            'password' => 'invalid-password',
            'password_confirmation' => 'invalid-password',
        ]);

        $response->assertSessionHasErrors('email');
        $response->assertRedirect(route('signup'));
        $this->assertGuest();
    }
}
