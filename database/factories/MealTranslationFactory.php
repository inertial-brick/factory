<?php

namespace Database\Factories;

use App\Models\Meal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\mealTranslation>
 */
class MealTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $meals = Meal::pluck('id')->all();

        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'locale' => $this->faker->randomElement(['en', 'hr']),
        ];
    }

}



