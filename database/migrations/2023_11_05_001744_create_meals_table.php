<?php

use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->id(); // Dodajte auto-increment ključ "id" za svako jelo
            $table->string('title'); // Dodajte stupac za naslov jela na hrvatskom jeziku
            $table->text('description'); // Dodajte stupac za opis jela na hrvatskom jeziku
            $table->string('status')->default('created'); // Dodajte stupac za status jela
            $table->timestamps();
            // $table->unsignedBigInteger('category_id')->nullable(); // Dodajte stupac za ID kategorije jela
            //$table->foreign('category_id')->references('id')->on('categories'); // Stvaranje veze s tablicom "categories"

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meals');
    }
};
