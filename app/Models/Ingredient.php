<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\Meal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model implements TranslatableContract
{
    use HasFactory, Translatable;



    public $translatedAttributes = ['title'];
    protected $fillable = ['title'];


    public function meals(): BelongsToMany
    {
        return $this->belongsToMany(
            Meal::class,
            'ingredients_meals',
        )->withTimestamps();
    }
}
