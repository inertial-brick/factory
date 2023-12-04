<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\MealController;
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


/* Route::resource('/meals', [HomeController::class, 'index'])->name('home'); */
Route::resource('/meals', MealController::class);

Route::get('/meals/{id}', [MealController::class, 'show'])->name('meal.show');




