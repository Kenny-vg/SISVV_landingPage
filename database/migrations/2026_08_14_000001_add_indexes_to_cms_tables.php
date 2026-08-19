<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Añade índices a las columnas usadas en los filtros y ordenamientos de
     * las consultas públicas del sitio para evitar table scans.
     */
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->index(['is_published', 'created_at']);
        });

        Schema::table('heroes', function (Blueprint $table) {
            $table->index(['is_active', 'sort_order']);
        });

        Schema::table('facilities', function (Blueprint $table) {
            $table->index(['is_published', 'sort_order']);
        });

        Schema::table('disciplines', function (Blueprint $table) {
            $table->index(['is_published', 'sort_order']);
        });

        Schema::table('memberships', function (Blueprint $table) {
            $table->index(['is_published', 'sort_order']);
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->index('is_visible');
        });

        Schema::table('page_sections', function (Blueprint $table) {
            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropIndex(['is_published', 'created_at']);
        });

        Schema::table('heroes', function (Blueprint $table) {
            $table->dropIndex(['is_active', 'sort_order']);
        });

        Schema::table('facilities', function (Blueprint $table) {
            $table->dropIndex(['is_published', 'sort_order']);
        });

        Schema::table('disciplines', function (Blueprint $table) {
            $table->dropIndex(['is_published', 'sort_order']);
        });

        Schema::table('memberships', function (Blueprint $table) {
            $table->dropIndex(['is_published', 'sort_order']);
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropIndex('categories_is_visible_index');
        });

        Schema::table('page_sections', function (Blueprint $table) {
            $table->dropIndex('page_sections_is_active_index');
        });
    }
};
