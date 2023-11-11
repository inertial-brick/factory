<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Meal;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Category::factory(10)->create();
        Ingredient::factory(50)->create();
        Tag::factory(50)->create();
        Meal::factory(50)->create();
    }
}
