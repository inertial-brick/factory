<?php

use App\Models\Meal;
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
            //$table->string('slug');
            //$table->unsignedBigInteger('meal_id');
            //$table->timestamps();
        });


        // Schema::table('ingredients', function ($table) {
        //   $table->foreign('meal_id')->references('id')->on('meals')->onUpdate('cascade')->onDelete('cascade');
        //});
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
