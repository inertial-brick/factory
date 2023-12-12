<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\MealCollection;
use App\Http\Resources\MealResource;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $meals = Meal::with(['category', 'tags', 'ingredients'])->paginate(5);
        return $mealCollection = new MealCollection($meals);

        /* return Http::dd()->get('http://127.0.0.1:8000/api/meals'); */
        /*  if ($response->successful()) {

             $data = $response->json();


             $mealCollection = new MealCollection($data);


             return view('home', ['mealCollection' => $mealCollection]);
         } else {

             return redirect()->back()->with('error', 'Failed to fetch data from the API.');
         } */
        /*  $client = new Client();
         $request = $client->get('http://127.0.0.1:8000/api/meals');
         $response = $request->getBody(); */

    }

}
