<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Language;
use App\Models\Meal;
use App\Models\MealTranslation;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Category::factory(5)->create();
        Ingredient::factory(5)->create();
        Tag::factory(5)->create();
        Meal::factory(10)->create();
        /*   MealTranslation::factory(5)->create(); */
        /*

         */
        /* */

        /*  Language::create([
             "language" => "hr"
         ]);
         Language::create([
             "language" => "en"
         ]);
         Language::create([
             "language" => "fr"
         ]); */
    }
}
