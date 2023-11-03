<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

class DishController extends Controller
{

    public function show($id)
    {
        $dish = Dish::find($id); // Pretpostavljajući da koristite Eloquent model za jela (Dish)

        return view('dish', ['dish' => $dish]);
    }

}
