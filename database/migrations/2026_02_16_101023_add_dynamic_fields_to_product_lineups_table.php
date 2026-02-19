<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('product_lineups', function (Blueprint $table) {
            // Rich content fields as JSON
            $table->json('features')->nullable()->after('description');
            $table->json('specifications')->nullable()->after('features');
            $table->json('applications')->nullable()->after('specifications');
            $table->json('technical_details')->nullable()->after('applications');
            $table->json('downloads')->nullable()->after('technical_details');
            $table->json('gallery_images')->nullable()->after('downloads');
            
            // Additional text fields
            $table->string('subtitle')->nullable()->after('title');
            $table->string('model_number')->nullable()->after('subtitle');
            $table->string('brand')->nullable()->after('model_number');
            $table->string('origin')->nullable()->after('brand');
            $table->string('warranty')->nullable()->after('origin');
            
            // Meta fields for SEO
            $table->string('meta_title')->nullable()->after('warranty');
            $table->text('meta_description')->nullable()->after('meta_title');
            $table->string('meta_keywords')->nullable()->after('meta_description');
        });
    }

    public function down(): void
    {
        Schema::table('product_lineups', function (Blueprint $table) {
            $table->dropColumn([
                'features',
                'specifications',
                'applications',
                'technical_details',
                'downloads',
                'gallery_images',
                'subtitle',
                'model_number',
                'brand',
                'origin',
                'warranty',
                'meta_title',
                'meta_description',
                'meta_keywords'
            ]);
        });
    }
};
