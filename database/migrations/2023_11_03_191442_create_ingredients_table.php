<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void // Treba bi many to many tablica, ingredients, dishes, ingredients_dishes
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->unsignedBigInteger('dish_fk');
            $table->timestamps();
            $table->foreign('dish_fk')->references('id')->on('dishes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
