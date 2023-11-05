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
        Schema::create('ingredient_tag_category_meal', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('meal_id')->constrained('meals')->cascadeOnDelete();
            //$table->foreignId('ingredient_id')->constrained('ingredients')->cascadeOnDelete();
            $table->boolean('active')->default(1);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredient_tag_category_meal');
    }
};
