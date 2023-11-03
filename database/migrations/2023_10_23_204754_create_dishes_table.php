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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id(); // Dodajte auto-increment ključ "id" za svako jelo
            $table->string('title'); // Dodajte stupac za naslov jela na hrvatskom jeziku
            $table->text('description'); // Dodajte stupac za opis jela na hrvatskom jeziku
            $table->string('status')->default('created'); // Dodajte stupac za status jela
            $table->timestamps();
            // $table->unsignedBigInteger('category_id')->nullable(); // Dodajte stupac za ID kategorije jela
            //$table->foreign('category_id')->references('id')->on('categories'); // Stvaranje veze s tablicom "categories"
        });

        // Pivot tablica za veze s oznakama (tags)
        //  Schema::create('dish_tag', function (Blueprint $table) {
        //    $table->id();
        //  $table->unsignedBigInteger('dish_id');
        //$table->unsignedBigInteger('tag_id');
        //$table->foreign('dish_id')->references('id')->on('dishes');
        //$table->foreign('tag_id')->references('id')->on('tags');
        //$table->timestamps();
        //});




    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dish_tag');
        Schema::dropIfExists('dish_ingredient');
        Schema::dropIfExists('dishes');
    }

};
