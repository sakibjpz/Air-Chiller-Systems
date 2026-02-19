<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contact_settings', function (Blueprint $table) {
            // Hero Section
            $table->string('hero_title')->nullable()->after('id');
            $table->string('hero_subtitle')->nullable()->after('hero_title');
            $table->string('hero_support_text')->nullable()->after('hero_subtitle');
            
            // Form Section
            $table->string('form_title')->nullable()->after('hero_support_text');
            $table->string('form_subtitle')->nullable()->after('form_title');
            
            // Form Fields Labels
            $table->string('field_name_label')->nullable()->after('form_subtitle');
            $table->string('field_name_placeholder')->nullable()->after('field_name_label');
            
            $table->string('field_email_label')->nullable()->after('field_name_placeholder');
            $table->string('field_email_placeholder')->nullable()->after('field_email_label');
            $table->string('field_email_optional_text')->nullable()->after('field_email_placeholder');
            
            $table->string('field_phone_label')->nullable()->after('field_email_optional_text');
            $table->string('field_phone_placeholder')->nullable()->after('field_phone_label');
            
            $table->string('field_message_label')->nullable()->after('field_phone_placeholder');
            $table->string('field_message_placeholder')->nullable()->after('field_message_label');
            $table->string('field_message_optional_text')->nullable()->after('field_message_placeholder');
            
            $table->string('submit_button_text')->nullable()->after('field_message_optional_text');
            
            // Map Section
            $table->string('map_title')->nullable()->after('submit_button_text');
            $table->string('map_subtitle')->nullable()->after('map_title');
            $table->string('address_title')->nullable()->after('map_subtitle');
            $table->string('directions_title')->nullable()->after('address_title');
            $table->string('directions_link_text')->nullable()->after('directions_title');
        });
    }

    public function down(): void
    {
        Schema::table('contact_settings', function (Blueprint $table) {
            $table->dropColumn([
                'hero_title',
                'hero_subtitle',
                'hero_support_text',
                'form_title',
                'form_subtitle',
                'field_name_label',
                'field_name_placeholder',
                'field_email_label',
                'field_email_placeholder',
                'field_email_optional_text',
                'field_phone_label',
                'field_phone_placeholder',
                'field_message_label',
                'field_message_placeholder',
                'field_message_optional_text',
                'submit_button_text',
                'map_title',
                'map_subtitle',
                'address_title',
                'directions_title',
                'directions_link_text',
            ]);
        });
    }
};