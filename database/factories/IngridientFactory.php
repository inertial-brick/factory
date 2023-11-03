<?php

namespace Database\Factories;

use App\Models\Dish;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingridient>
 */
class IngridientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomDish = Dish::inRandomOrder()->first();
        return [
            'title' => $this->faker->word,
            'slug' => $this->faker->slug,
            'dish_id' => $randomDish->id
        ];
    }
}
