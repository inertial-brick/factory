<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model implements TranslatableContract
{
    use HasFactory, Translatable;


    public $translatedAttributes = ['title', 'slug'];
    protected $fillable = ['title', 'slug'];
    public function meals(): BelongsToMany
    {
        return $this->belongsToMany(Meal::class, 'meals_tags')->withTimestamps();
    }
}
