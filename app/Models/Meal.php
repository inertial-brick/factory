<?php

namespace App\Models;

use App\Models\Ingredient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Meal extends Model
{
    use HasFactory;
    protected $perPage = 5;
    protected $table = 'meals';



    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // public function ingredients(): BelongsToMany
    //{
    //  return $this->belongsToMany(
    //    Ingredient::class,
    //  'ingredient_tag_category_meal'

    //);
    //}


}
