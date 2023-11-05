<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    use HasFactory;

    protected $table = 'ingredients';

    //public function meals(): BelongsToMany
    //{
    //  return $this->belongsToMany(
    //    Meal::class,
    //  'ingredient_tag_category_meal'
    //)
    //;
    //}


}
