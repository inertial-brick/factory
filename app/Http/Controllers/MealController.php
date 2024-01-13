<?php

namespace App\Http\Controllers;

use App;
use App\Http\Requests\MealIndexRequest;
use App\Http\Requests\StoreMealRequest;
use App\Http\Requests\UpdateMealRequest;
use App\Http\Resources\MealResource;
use App\Http\Resources\MealCollection;
use Illuminate\Http\Request;
use App\Models\Meal;
use Illuminate\Support\Carbon;


class MealController extends Controller
{
    public function index(MealIndexRequest $request)
    {

        $query = Meal::query();
        $allowedRelationships = ['category', 'tags', 'ingredients'];
        $requestedRelationships = $request->input('with');
        $validRelationships = array_intersect($allowedRelationships, explode(',', $requestedRelationships));
        $query->with($validRelationships);
        $diffTime = $request->input('diff_time');


        if ($diffTime !== null) {
            $diffTimeDate = Carbon::createFromTimestamp($diffTime);

            $query->withTrashed()->where('created_at', '>=', $diffTimeDate);
        }

        $meals = $query->paginate($request->input('per_page', 10));
        $locale = $request->input('lang');

        if ($locale) {
            App::setLocale($locale);

            foreach ($meals as $meal) {
                $meal->title = $meal->translate($locale)->title;
                $meal->description = $meal->translate($locale)->description;

                if ($request->has('with') && strpos($requestedRelationships, 'category') !== false && $meal->category) {
                    $meal->category->title = $meal->category->translate($locale)->title;
                    $meal->category->slug = $meal->category->translate($locale)->slug;
                }
                if (($request->has('with') && strpos($requestedRelationships, 'tags') !== false && count($meal->tags) === 0)) {
                    foreach ($meal->tags as $tag) {
                        $tag->title = $tag->translate($locale)->title;
                        $tag->slug = $tag->translate($locale)->slug;
                    }
                }
                if (($request->has('with') && strpos($requestedRelationships, 'ingredients') !== false && count($meal->ingredients) === 0)) {
                    foreach ($meal->ingredients as $ingredient) {
                        $ingredient = $ingredient->translate($locale)->title;
                        $ingredient = $ingredient->translate($locale)->slug;
                    }
                }

            }
            App::setLocale(config('app.locale'));
        }

        if ($request->has('diff_time')) {
            foreach ($meals as $meal) {

                if ($meal->deleted_at !== null) {
                    $meal->status = 'deleted';
                } else if ($meal->updated_at !== null) {
                    $meal->status = 'modified';
                } else {
                    $meal->status = 'created';
                }
            }
        }

        return new MealCollection($meals);

    }
    public function show(Request $request, Meal $meal)
    {
        $meal->load('category', 'tags', 'ingredients');
        return new MealResource($meal);
    }

    public function store(StoreMealRequest $request)
    {
        $validated = $request->validated();
        $meal = new Meal($validated);
        $meal->created_at = now();
        $meal->save();

        return new MealResource($meal);
    }

    public function update(UpdateMealRequest $request, Meal $meal)
    {
        $validated = $request->validated();
        $meal->updated_at = now();
        $meal->update($validated);
        return new MealResource($meal);
    }

    public function destroy(Request $request, Meal $meal)
    {
        $meal->deleted_at = now();
        $meal->delete();
        return response()->noContent();
    }

    public function restore($id)
    {
        $meal = Meal::withTrashed()->find($id)->restore();
        return "Restored";
    }
}
