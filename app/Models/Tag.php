<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Tag extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $fillable = ['title', 'slug'];
    public $translatedAttributes = ['title', 'slug'];
    public function meals(): BelongsToMany
    {
        return $this->belongsToMany(Meal::class, 'meals_tags')->withTimestamps();
    }
}
