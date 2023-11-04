<?php

namespace App\Models;

use App\Models\Ingredient;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    protected $perPage = 5;

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

}
