<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('category')->nullable()->after('slug');
            $table->string('pdf_path')->nullable()->after('image');
            $table->dateTime('event_date')->nullable()->change();
            $table->string('location')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['category', 'pdf_path']);
            $table->dateTime('event_date')->nullable(false)->change();
            $table->string('location')->nullable(false)->change();
        });
    }
};
