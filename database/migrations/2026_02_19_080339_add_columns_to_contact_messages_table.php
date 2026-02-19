<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->string('email')->nullable()->after('name');
            $table->string('phone')->after('email');
            $table->text('message')->nullable()->after('phone');
            $table->boolean('is_read')->default(false)->after('message');
            $table->boolean('is_replied')->default(false)->after('is_read');
            $table->text('admin_notes')->nullable()->after('is_replied');
        });
    }

    public function down(): void
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->dropColumn(['name', 'email', 'phone', 'message', 'is_read', 'is_replied', 'admin_notes']);
        });
    }
};