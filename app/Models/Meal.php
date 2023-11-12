<?php

namespace App\Models;

use App\Models\Ingredient;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Meal extends Model implements TranslatableContract
{

    use HasFactory, Translatable;
    protected $perPage = 5;

    public $translatedAttributes = ['title', 'description'];
    protected $fillable = ['title', 'description'];
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(
            Ingredient::class,
            'ingredients_meals',
        )->withTimestamps();
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(
            Tag::class,
            'meals_tags',
        )->withTimestamps();
    }
}
