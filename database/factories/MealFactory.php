<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Meal;
use App\Models\MealTranslation;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meal>
 */
class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            /*  'title' => $this->faker->sentence(),
             'description' => $this->faker->sentence(), */
            'category_id' => $this->faker->randomElement([
                Category::inRandomOrder()->first(),
                null
            ]),
            /*  'status' => 'created', */
            'created_at' => now()
        ];
    }
    /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this
            ->afterCreating(function (Meal $meal) {
                $meal->ingredients()->attach(Ingredient::all()->random(5));
            })
            ->afterCreating(function (Meal $meal) {
                $meal->tags()->attach(Tag::all()->random(3));
            })
            ->afterCreating(function (Meal $meal) {
                MealTranslation::factory()->create([
                    'meal_id' => $meal->id,
                    'locale' => 'en',
                    'title' => $this->faker->sentence(),
                    'description' => $this->faker->sentence(),
                    'status' => 'created',
                ]);
                MealTranslation::factory()->create([
                    'meal_id' => $meal->id,
                    'locale' => 'hr',
                    'title' => $this->faker->sentence(),
                    'description' => $this->faker->sentence(),
                    'status' => 'napravljeno',
                ]);
            });
    }
}
