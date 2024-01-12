<?php

namespace Database\Factories;

use App\Models\Ingredient;
use App\Models\IngredientTranslation;
use App\Models\Meal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingredient>
 */
class IngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Ingredient $ingredient) {
            IngredientTranslation::factory()->create([
                'ingredient_id' => $ingredient->id,
                'locale' => 'en',
                'title' => $this->faker->sentence(),
                'slug' => $this->faker->sentence(),
            ]);
            IngredientTranslation::factory()->create([
                'ingredient_id' => $ingredient->id,
                'locale' => 'hr',
                'title' => $this->faker->sentence(),
                'slug' => $this->faker->sentence(),
            ]);
        });
    }
}
