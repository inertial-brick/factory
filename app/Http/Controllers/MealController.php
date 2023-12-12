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
        $meals = Meal::with(['category', 'tags', 'ingredients'])->paginate(5);
        return $mealCollection = new MealCollection($meals);
        /*  return response()->json($mealCollection); */

        /* return view('home', ['meals' => $mealCollection]); */
    }

    public function show(Meal $meal)
    {
        $meal->load('category', 'tags', 'ingredients');
        return new MealResource($meal);
    }

}
