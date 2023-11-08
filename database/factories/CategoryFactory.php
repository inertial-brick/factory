<?php

namespace Database\Factories;

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
            'title' => $this->faker->randomElement(['Predjela', 'Glavna jela', 'Prilozi', 'Deserti', 'Pileće predjelo', 'Riba', 'Povrće iz rerne', 'Pire krompir', 'Čokoladna torta', 'Supa', 'Salata', 'Špagete', 'Piletina sa povrćem', 'Tiramisu', 'Pizza', 'Kuvano povrće', 'Knedle sa šljivama', 'Losos', 'Cheesecake']),
            'slug' => $this->faker->word(),
        ];
    }
}
