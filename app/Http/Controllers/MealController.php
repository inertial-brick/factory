<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMealRequest;
use App\Http\Requests\UpdateMealRequest;
use App\Http\Resources\MealResource;
use App\Http\Resources\MealCollection;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Meal;
use Illuminate\Support\Carbon;
use Spatie\QueryBuilder\QueryBuilder;



class MealController extends Controller
{


    public function index(Request $request)
    {
        $query = Meal::query();
        $allowedRelationships = ['category', 'tags', 'ingredients'];
        $requestedRelationships = $request->input('with');
        $validRelationships = array_intersect($allowedRelationships, explode(',', $requestedRelationships));

        $query->with($validRelationships);
        $diffTime = $request->input('diff_time');

        if ($diffTime && is_numeric($diffTime) && $diffTime > 0) {
            $diffTimeDate = Carbon::createFromTimestamp($diffTime);

            $query->withTrashed()->where(function ($query) use ($diffTimeDate) {
                $query->where('created_at', '>=', $diffTimeDate);

            });
            $updatedMealsWithTrashed = $query->get();

            foreach ($updatedMealsWithTrashed as $meal) {
                if ($meal->created_at !== null && $meal->status !== 'created') {
                    $meal->update(['status' => 'created']);
                }
                if ($meal->updated_at !== null && $meal->status !== 'modified') {
                    $meal->update(['status' => 'modified']);
                }
                if ($meal->deleted_at !== null && $meal->status !== 'deleted') {
                    $meal->update(['status' => 'deleted']);
                }
            }

        }

        $meals = $query->paginate($request->input('per_page', 10));
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
