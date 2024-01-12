<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\TagTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
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
        return $this->afterCreating(function (Tag $tag) {
            TagTranslation::factory()->create([
                'tag_id' => $tag->id,
                'locale' => 'en',
                'title' => $this->faker->sentence(),
                'slug' => $this->faker->sentence(),
            ]);
            TagTranslation::factory()->create([
                'tag_id' => $tag->id,
                'locale' => 'hr',
                'title' => $this->faker->sentence(),
                'slug' => $this->faker->sentence(),
            ]);
        });
    }
}
