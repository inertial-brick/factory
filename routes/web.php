<?php


use App\Models\Dish;
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

Route::view('dish/create', 'create')->name('dish.create');

Route::get('dish/{id}', 'App\Http\Controllers\DishController@show')->name('dish.show');

Route::post('dish', function (request $request) {
    $data = $request->validate([
        'title' => 'required |max:25',
        'description' => 'required|max:255',

    ]);
    $dish = new Dish;
    $dish->title = $data['title'];
    $dish->description = $data['description'];
    $dish->status = 'created';
    $dish->save();

    return redirect()->route('home');

})->name('dish.store');
