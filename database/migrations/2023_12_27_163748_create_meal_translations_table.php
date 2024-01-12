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
        Schema::create('meal_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meal_id')->constrained();
            $table->string('locale')->index();
            $table->string('title');
            $table->text('description');
            $table->unique(['meal_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_translations');
    }
};
