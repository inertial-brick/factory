<?php

namespace App\Models;

use App\Models\Meal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    use HasFactory;

    public function meals(): BelongsToMany
    {
        return $this->belongsToMany(
            Meal::class,
            'ingredients_meals',
        )->withTimestamps();
    }
}
