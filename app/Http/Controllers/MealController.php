<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;

class MealController extends Controller
{

    public function show($id)
    {
        $meal = Meal::findOrFail($id);
        $ingredients = $meal->ingredients; // Dohvati sve sastojke povezane s ovim jelom

        return view('meal', ['meal' => $meal, 'ingredients' => $ingredients]);
    }


}
