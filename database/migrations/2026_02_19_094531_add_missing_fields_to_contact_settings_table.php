<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contact_settings', function (Blueprint $table) {
            // Call Us section
            $table->string('call_us_title')->nullable()->after('id');
            $table->string('call_us_description')->nullable()->after('call_us_title');
            $table->string('call_us_phone')->nullable()->after('call_us_description');
            
            // Email Us section
            $table->string('email_us_title')->nullable()->after('call_us_phone');
            $table->string('email_us_description')->nullable()->after('email_us_title');
            $table->string('email_us_address')->nullable()->after('email_us_description');
            
            // Visit Our Office section
            $table->string('office_title')->nullable()->after('email_us_address');
            $table->string('office_description')->nullable()->after('office_title');
            $table->text('office_address')->nullable()->after('office_description');
            
            // Business Hours section
            $table->string('hours_title')->nullable()->after('office_address');
            $table->string('monday_friday_label')->nullable()->after('hours_title');
            $table->string('monday_friday_hours')->nullable()->after('monday_friday_label');
            $table->string('saturday_label')->nullable()->after('monday_friday_hours');
            $table->string('saturday_hours')->nullable()->after('saturday_label');
            $table->string('sunday_label')->nullable()->after('saturday_hours');
            $table->string('sunday_hours')->nullable()->after('sunday_label');
            $table->text('emergency_note')->nullable()->after('sunday_hours');
        });
    }

    public function down(): void
    {
        Schema::table('contact_settings', function (Blueprint $table) {
            $table->dropColumn([
                'call_us_title',
                'call_us_description',
                'call_us_phone',
                'email_us_title',
                'email_us_description',
                'email_us_address',
                'office_title',
                'office_description',
                'office_address',
                'hours_title',
                'monday_friday_label',
                'monday_friday_hours',
                'saturday_label',
                'saturday_hours',
                'sunday_label',
                'sunday_hours',
                'emergency_note',
            ]);
        });
    }
};