<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

class DishController extends Controller
{

    public function show($id)
    {
        $dish = Dish::findOrFail($id);
        $ingredients = $dish->ingredients; // Dohvati sve sastojke povezane s ovim jelom

        return view('dish', ['dish' => $dish, 'ingredients' => $ingredients]);
    }


}
