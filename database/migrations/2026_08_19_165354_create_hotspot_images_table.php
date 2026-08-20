<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hotspot_images', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();           // clave única: "AREA DE JUEGOS", "PISCINA", etc.
            $table->string('label');                    // etiqueta visible
            $table->string('image_path')->nullable();   // path en storage (nullable = sin imagen)
            $table->decimal('left_percent', 5, 2);      // posición X fija
            $table->decimal('top_percent', 5, 2);       // posición Y fija
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hotspot_images');
    }
};