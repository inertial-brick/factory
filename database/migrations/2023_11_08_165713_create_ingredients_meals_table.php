<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ingredients_meals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('meal_fk');
            $table->unsignedBigInteger('ingredient_fk');
            $table->foreign('meal_fk')->references('id')->on('meals');
            $table->foreign('ingredient_fk')->references('id')->on('ingredients');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('ingredients_meals');
        Schema::dropIfExists('meals');
        Schema::dropIfExists('ingredients');
    }
};

