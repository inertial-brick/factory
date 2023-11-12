<?php


use App\Models\Meal;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

Route::view('meal/create', 'create')->name('meal.create');

Route::get('meal/{id}/edit', function ($id) {
    return view('edit', ['meal' => Meal::findOrFail($id)]);
})->name('meal.edit');

Route::get('meal/{id}', 'App\Http\Controllers\MealController@show')->name('meal.show');

Route::post('meal', function (request $request) {
    $data = $request->validate([
        'title' => 'required |max:25',
        'description' => 'required|max:255',
    ]);
    $meal = new Meal;
    $meal->title = $data['title'];
    $meal->description = $data['description'];
    $meal->status = 'created';
    $meal->save();


    $ingredientKeys = array_filter(array_keys($request->all()), function ($key) {
        return strpos($key, 'ingredient_') === 0;
    });


    foreach ($ingredientKeys as $key) {
        $newIngredient = new Ingredient;
        $newIngredient->meal_id = $meal->id;
        $newIngredient->title = $request[$key];
        $newIngredient->slug = 'nešto';
        $newIngredient->save();
    }

    return redirect()->route('home');

})->name('meal.store');


