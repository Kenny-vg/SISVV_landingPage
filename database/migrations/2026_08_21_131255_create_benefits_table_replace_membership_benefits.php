<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('benefits', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        DB::statement('
            INSERT INTO benefits (name, sort_order, created_at, updated_at)
            SELECT benefit, MIN(sort_order), CURRENT_TIMESTAMP, CURRENT_TIMESTAMP
            FROM membership_benefits
            GROUP BY benefit
        ');

        Schema::create('benefit_membership', function (Blueprint $table) {
            $table->foreignId('membership_id')->constrained()->cascadeOnDelete();
            $table->foreignId('benefit_id')->constrained()->cascadeOnDelete();
            $table->unique(['membership_id', 'benefit_id']);
        });

        DB::statement('
            INSERT INTO benefit_membership (membership_id, benefit_id)
            SELECT mb.membership_id, b.id
            FROM membership_benefits mb
            JOIN benefits b ON b.name = mb.benefit
        ');

        Schema::dropIfExists('membership_benefits');
    }

    public function down(): void
    {
        Schema::create('membership_benefits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('membership_id')->constrained()->cascadeOnDelete();
            $table->text('benefit');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        DB::statement('
            INSERT INTO membership_benefits (membership_id, benefit, sort_order, created_at, updated_at)
            SELECT bm.membership_id, b.name, b.sort_order, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP
            FROM benefit_membership bm
            JOIN benefits b ON b.id = bm.benefit_id
        ');

        Schema::dropIfExists('benefit_membership');
        Schema::dropIfExists('benefits');
    }
};
