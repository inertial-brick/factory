<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class WithParameterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Validator::extend('valid_with_parameters', function ($attribute, $value, $parameters, $validator) {
            $relationships = explode(',', $value);
            $validRelationships = ['tags', 'category', 'ingredients'];

            return empty(array_diff($relationships, $validRelationships));
        });
    }
}
