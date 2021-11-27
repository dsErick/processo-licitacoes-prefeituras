<?php

namespace Database\Factories;

use App\Models\{ActivityType, Contact, Receptivity};
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'scheduled_at' => $this->faker->dateTimeBetween('tomorrow', 'last day of +2 month'),
            'observation' => $this->faker->text(100),
            'pending' => $this->faker->text(100),
            // 'status' => $this->faker,
            'activity_type_id' => ActivityType::inRandomOrder()->value('id'),
            'receptivity_id' => Receptivity::inRandomOrder()->value('id'),
        ];
    }

    public function contact(): Factory
    {
        return $this->state(fn () => [
            'contact_id' => Contact::factory()->cityHall(),
        ]);
    }
}
