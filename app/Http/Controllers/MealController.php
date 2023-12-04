<?php

namespace App\Http\Controllers;

use App\Http\Resources\MealResource;
use App\Http\Resources\MealCollection;

use Illuminate\Http\Request;
use App\Models\Meal;

class MealController extends Controller
{
    public function index()
    {
        $meals = Meal::with(['category', 'tags', 'ingredients'])->paginate();
        $mealCollection = new MealCollection($meals);

        return view('home', ['meals' => $mealCollection]);
    }

    public function show(Meal $meal)
    {
        $meal->load('category', 'tags', 'ingredients');
        return new MealResource($meal);
    }


}
