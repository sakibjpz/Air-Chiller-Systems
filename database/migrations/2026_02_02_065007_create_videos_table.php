<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            
            // Video source options (choose one)
            $table->string('video_url')->nullable()->comment('For YouTube/Vimeo URLs');
            $table->string('video_path')->nullable()->comment('For uploaded videos - storage path');
            $table->string('video_disk')->default('public')->comment('Storage disk: public, s3, etc.');
            $table->integer('video_size')->nullable()->comment('File size in bytes');
            $table->string('video_duration')->nullable()->comment('HH:MM:SS format');
            $table->string('mime_type')->nullable()->comment('video/webm, video/mp4, etc.');
            
            // Video type and identification
            $table->enum('video_type', ['uploaded', 'youtube', 'vimeo'])->default('uploaded');
            $table->string('video_id')->nullable()->comment('For YouTube/Vimeo videos');
            
            // Thumbnail
            $table->string('thumbnail')->nullable()->comment('Custom thumbnail image');
            $table->string('thumbnail_disk')->default('public')->comment('Thumbnail storage disk');
            
            // Overlay content
            $table->string('overlay_title')->nullable();
            $table->text('overlay_description')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            
            // Display settings
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('show_overlay')->default(true);
            
            // Video player settings
            $table->boolean('autoplay')->default(true);
            $table->boolean('muted')->default(true);
            $table->boolean('loop')->default(true);
            $table->boolean('controls')->default(false);
            $table->boolean('playsinline')->default(true)->comment('For mobile browsers');
            $table->boolean('show_info')->default(false)->comment('For YouTube: hide title/uploader');
            
            // SEO and metadata
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            
            // Timestamps
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('videos');
    }
};