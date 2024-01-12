<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Meal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'created_at' => now()
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Category $category) {

            CategoryTranslation::factory()->create([
                'category_id' => $category->id,
                'locale' => 'en',
                'title' => $this->faker->sentence(),
                'slug' => $this->faker->sentence(),
            ]);
            CategoryTranslation::factory()->create([
                'category_id' => $category->id,
                'locale' => 'hr',
                'title' => $this->faker->sentence(),
                'slug' => $this->faker->sentence(),
            ]);
        });
    }

}
