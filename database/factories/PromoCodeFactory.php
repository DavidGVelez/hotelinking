<?php

namespace Database\Factories;

use App\Models\PromoCode;
use App\Repositories\PromoCodeRepository;
use Illuminate\Database\Eloquent\Factories\Factory;

class PromoCodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PromoCode::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $repo = new PromoCodeRepository(new PromoCode());
        return [
            'code' => $repo->generateCode(),
            'user_id' => 1,
        ];
    }
}
