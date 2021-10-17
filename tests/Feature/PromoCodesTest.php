<?php

namespace Tests\Feature;

use App\Models\PromoCode;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Repositories\PromoCodeRepository;
use Illuminate\Support\Facades\Auth;

class PromoCodesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_cant_access_to_my_codes_page_if_not_auth()
    {
        $response = $this->get(route('my-codes'));
        $response->assertRedirect(route('login'));
    }

    public function test_user_can_access_to_my_codes_if_auth()
    {
        $user = User::factory()->create([
            'password' => bcrypt('testing'),
        ])->first();

        $this->actingAs($user);
        $response = $this->get(route('my-codes'));

        $response->assertStatus(200);
    }

    public function test_auth_user_can_create_promo_code()
    {
        $user = User::factory()->create([
            'password' => bcrypt('testing'),
        ])->first();

        $this->actingAs($user);

        $response = $this->get('/codes/create');

        $response->assertRedirect(route('my-codes'));
    }

    public function test_auth_user_can_redeem_codes()
    {
        $user = User::factory()->create([
            'password' => bcrypt('testing'),
        ])->first();

        $code = PromoCode::factory($user->id)->create()->first();

        $this->actingAs($user);

        $response = $this->post('/codes/redeem', [$code->code]);

        $response->assertRedirect(route('my-codes'));
    }
}
