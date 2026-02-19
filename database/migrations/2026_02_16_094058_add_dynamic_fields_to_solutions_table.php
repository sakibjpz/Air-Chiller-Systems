<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('solutions', function (Blueprint $table) {
            // Feature boxes (stored as JSON)
            $table->json('features')->nullable()->after('description');
            
            // Equipment list (stored as JSON)
            $table->json('equipment')->nullable()->after('features');
            
            // Statistics (stored as JSON)
            $table->json('statistics')->nullable()->after('equipment');
            
            // Why section heading
            $table->string('why_heading')->nullable()->after('statistics');
            
            // Why section description
            $table->text('why_description')->nullable()->after('why_heading');
            
            // Equipment section heading
            $table->string('equipment_heading')->nullable()->after('why_description');
            
            // Expertise section heading
            $table->string('expertise_heading')->nullable()->after('equipment_heading');
            
            // Meta data for SEO
            $table->string('meta_title')->nullable()->after('expertise_heading');
            $table->text('meta_description')->nullable()->after('meta_title');
            $table->string('meta_keywords')->nullable()->after('meta_description');
        });
    }

    public function down(): void
    {
        Schema::table('solutions', function (Blueprint $table) {
            $table->dropColumn([
                'features',
                'equipment',
                'statistics',
                'why_heading',
                'why_description',
                'equipment_heading',
                'expertise_heading',
                'meta_title',
                'meta_description',
                'meta_keywords'
            ]);
        });
    }
};
