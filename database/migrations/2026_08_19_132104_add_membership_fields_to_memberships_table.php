<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('memberships', function (Blueprint $table) {
            $table->string('tipo')->nullable()->after('price');
            $table->string('clave_membresia')->nullable()->after('tipo');
            $table->boolean('show_price')->default(true)->after('is_published');
            $table->boolean('is_featured')->default(false)->after('show_price');
        });
    }

    public function down(): void
    {
        Schema::table('memberships', function (Blueprint $table) {
            $table->dropColumn(['tipo', 'clave_membresia', 'show_price', 'is_featured']);
        });
    }
};