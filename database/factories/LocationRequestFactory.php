<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Announce;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LocationRequest>
 */
class LocationRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 12),
            'announce_id' => $this->faker->numberBetween(1, 111),
            'tenant_id' => $this->faker->numberBetween(1, 12),
            'status' => 0
        ];
    }
}
