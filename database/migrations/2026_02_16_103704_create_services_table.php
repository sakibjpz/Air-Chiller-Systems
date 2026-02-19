<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            
            // Basic Info
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('subtitle')->nullable();
            $table->text('description');
            $table->string('image')->nullable();
            $table->string('icon')->nullable();
            
            // Hero Section
            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_image')->nullable();
            
            // Statistics/Stats Bar
            $table->json('statistics')->nullable(); // Array of stats with value and label
            
            // Service Overview Cards (4 cards)
            $table->json('overview_cards')->nullable(); // Array of cards with icon, title, description
            
            // Complete Support Section
            $table->string('support_title')->nullable();
            $table->text('support_description')->nullable();
            $table->json('support_features')->nullable(); // Array of features with icon, title, description
            $table->string('support_image')->nullable();
            
            // Building Systems Upgrades (Grid items)
            $table->json('building_systems')->nullable(); // Array of systems with icon, title, description, features
            
            // Chillers Section
            $table->string('chillers_title')->nullable();
            $table->text('chillers_description')->nullable();
            $table->json('chillers')->nullable(); // Array of chiller types with image, title, description, tags
            
            // Central Plant Section
            $table->string('central_plant_title')->nullable();
            $table->text('central_plant_description')->nullable();
            $table->json('central_plant_features')->nullable();
            $table->json('central_plant_services')->nullable(); // Array of services
            $table->string('central_plant_image')->nullable();
            $table->string('central_plant_stats')->nullable(); // e.g., "40% Energy Savings"
            
            // CTA Section
            $table->string('cta_title')->nullable();
            $table->text('cta_description')->nullable();
            $table->string('cta_button_text')->nullable();
            $table->string('cta_button_link')->nullable();
            $table->string('cta_phone')->nullable();
            
            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            
            // Status
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
