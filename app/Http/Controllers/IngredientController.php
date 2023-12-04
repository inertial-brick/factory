<?php

namespace App\Http\Controllers;

use App\Http\Resources\IngredientResource;
use App\Http\Resources\IngredientCollection;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index()
    {
        return new IngredientCollection(Ingredient::paginate());
    }
    public function show(Ingredient $ingredient)
    {
        return new IngredientResource($ingredient);
    }
}
