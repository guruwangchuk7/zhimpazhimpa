<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    // Only create the table if it doesn't already exist. This prevents
    // migrations/tests from failing when the table is present (e.g. tests
    // using an existing database or when migrations have been run twice).
    if (! Schema::hasTable('recipes')) {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('ingredients');
            $table->text('instructions');
            $table->string('image')->nullable();
            $table->integer('likes')->default(0);
            $table->timestamps();
        });
    }
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
