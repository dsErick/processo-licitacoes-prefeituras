<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityHallFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'         => 'Prefeitura' . $this->faker->firstName(),
            'phone_number' => $this->faker->numerify('###########'),
            'population'   => $this->faker->randomNumber(),
        ];
    }

    public function municipality(): Factory
    {
        return $this->state(fn () => [
            'city_id' => City::factory(),
        ]);
    }
}
