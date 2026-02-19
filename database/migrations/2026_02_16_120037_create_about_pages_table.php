<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();
            
            // Hero Section
            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_image')->nullable();
            $table->json('hero_stats')->nullable(); // Array of stats with value and label
            
            // Company Overview Section
            $table->string('overview_title')->nullable();
            $table->text('overview_description')->nullable();
            $table->string('overview_image')->nullable();
            $table->string('overview_badge_text')->nullable();
            $table->string('overview_badge_value')->nullable();
            $table->string('overview_philosophy_title')->nullable();
            $table->text('overview_philosophy_text')->nullable();
            $table->string('overview_philosophy_icon')->nullable();
            
            // Vision Section
            $table->string('vision_title')->nullable();
            $table->text('vision_description')->nullable();
            $table->string('vision_icon')->nullable();
            $table->json('vision_points')->nullable(); // Array of vision points
            
            // Mission Section
            $table->string('mission_title')->nullable();
            $table->text('mission_description')->nullable();
            $table->string('mission_icon')->nullable();
            $table->json('mission_points')->nullable(); // Array of mission points
            
            // Scope of Work Sections
            $table->json('scope_sections')->nullable(); // Array of scope sections with title, icon, color, points
            
            // Modification Services
            $table->json('modification_services')->nullable(); // Array of modification services with icon, title, description
            
            // Service Support
            $table->json('service_support')->nullable(); // Array of support services with icon, title, description
            
            // CTA Section
            $table->string('cta_title')->nullable();
            $table->text('cta_description')->nullable();
            $table->string('cta_primary_button_text')->nullable();
            $table->string('cta_primary_button_link')->nullable();
            $table->string('cta_secondary_button_text')->nullable();
            $table->string('cta_secondary_button_link')->nullable();
            
            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            
            // Status
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_pages');
    }
};
