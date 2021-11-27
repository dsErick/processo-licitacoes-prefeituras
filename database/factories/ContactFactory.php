<?php

namespace Database\Factories;

use App\Models\{CityHall, ContactType};
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'            => $this->faker->firstName(),
            'mandate_ends_at' => (string) new Carbon('first day of January ' . now()->addYears($this->faker->randomDigit())->year),
            'contact_type_id' => ContactType::inRandomOrder()->value('id'),
        ];
    }

    public function cityHall(): Factory
    {
        return $this->state(fn () => [
            'city_hall_id' => CityHall::factory()->city(),
        ]);
    }
}
