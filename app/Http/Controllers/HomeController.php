<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

class HomeController extends Controller
{
    public function index()
    {
        $dishes = Dish::all(); // Dohvati sva jela iz baze

        return view('home', ['dishes' => $dishes]);
    }

}
