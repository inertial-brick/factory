<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model implements TranslatableContract
{
    use HasFactory, Translatable;


    protected $fillable = ['title', 'slug'];

    public $translatedAttributes = ['title', 'slug'];
    public function meals(): HasMany
    {
        return $this->hasMany(Meal::class);
    }
}
