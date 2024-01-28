<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;
use App\Models\Option;
use App\Models\Category;
use App\Models\Announce;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announce>
 */
class AnnounceFactory extends Factory
{
    protected $model = Announce::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'price' => $this->faker->numberBetween(1, 100),
            'description' => $this->faker->paragraph,
            'adress' => $this->faker->address,
            'postalcode' => $this->faker->postcode,
            'city' => $this->faker->city,
            'availability' => $this->faker->boolean,
            'user_id' => $this->faker->numberBetween(1, 12),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Announce $announce) {
            $categories = Category::inRandomOrder()->limit(1)->get();
            $options = Option::inRandomOrder()->limit(3)->get();

            $announce->categories()->attach($categories);
            $announce->options()->attach($options);
        });
    }
}
