<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_lineups', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g., "VRF : MULTI V"
            $table->string('slug')->unique();
            $table->text('description')->nullable(); // Short description
            $table->string('image')->nullable(); // Path to product image
            $table->string('button_text')->default('LEARN MORE'); // Button text (LEARN MORE)
            $table->string('button_link')->nullable(); // Link for the button
            $table->integer('sort_order')->default(0); // For manual ordering
            $table->boolean('is_active')->default(true); // To show/hide
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_lineups');
    }
};