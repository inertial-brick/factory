<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMealRequest;
use App\Http\Requests\UpdateMealRequest;
use App\Http\Resources\MealResource;
use App\Http\Resources\MealCollection;
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

        $meals = $query->paginate($request->input('per_page', 10));

        foreach ($meals as $meal) {
            $createdAt = $meal->created_at;
            $updatedAt = $meal->updated_at;
            $deletedAt = $meal->deleted_at;
            $status = $meal->status;

            if ($diffTime && is_numeric($diffTime) && $diffTime > 0) {

                $diffTimeDate = Carbon::createFromTimestamp($diffTime);

                if ($createdAt !== null && $status !== 'created') {
                    $status = 'created';
                    $meal->save();
                }
                if ($createdAt !== $updatedAt && $status !== 'modified') {
                    $status = 'modified';
                    $meal->save();
                }
                if ($deletedAt !== null && $status !== 'deleted') {
                    $status = 'deleted';
                    $meal->save();
                }
                /*   if ($createdAt === null && $updatedAt === null && $deletedAt === null && $status !== 'created') {
                      $meal->update(['status' => 'created']);
                  } */

                $query->withTrashed()->where(function ($query) use ($diffTimeDate) {
                    $query->where('created_at', '>=', $diffTimeDate)
                        ->orWhere('updated_at', '>=', $diffTimeDate)
                        ->orWhere('deleted_at', '>=', $diffTimeDate);
                });

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
