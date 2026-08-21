<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('disciplines', function (Blueprint $table) {
            $table->decimal('prioridad', 8, 2)->default(0)->after('schedule');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->decimal('prioridad', 8, 2)->default(0)->after('date');
            $table->index(['is_published', 'prioridad']);
        });

        DB::table('disciplines')->update(['prioridad' => DB::raw('sort_order')]);

        Schema::table('disciplines', function (Blueprint $table) {
            $table->dropIndex(['is_published', 'sort_order']);
            $table->index(['is_published', 'prioridad']);
            $table->dropColumn('sort_order');
        });
    }

    public function down(): void
    {
        Schema::table('disciplines', function (Blueprint $table) {
            $table->integer('sort_order')->default(0)->after('schedule');
        });

        DB::table('disciplines')->update(['sort_order' => DB::raw('FLOOR(prioridad)')]);

        Schema::table('disciplines', function (Blueprint $table) {
            $table->dropIndex(['is_published', 'prioridad']);
            $table->index(['is_published', 'sort_order']);
            $table->dropColumn('prioridad');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropIndex(['is_published', 'prioridad']);
            $table->dropColumn('prioridad');
        });
    }
};
