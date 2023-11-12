<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['title'];
    public function meals(): BelongsToMany
    {
        return $this->belongsToMany(Meal::class, 'meals_tags')->withTimestamps();
    }
}
