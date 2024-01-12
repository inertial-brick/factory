<?php

namespace App\Models;


use App\Models\Meal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Ingredient extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $fillable = ['title', 'slug'];
    public $translatedAttributes = ['title', 'slug'];
    public function meals(): BelongsToMany
    {
        return $this->belongsToMany(
            Meal::class,
            'ingredients_meals',
        )->withTimestamps();
    }
}
