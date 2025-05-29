<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('precios', function (Blueprint $table) {
            $table->id(); // id único para cada precio
            $table->timestamps(); // columnas created_at y updated_at
            $table->foreignId('juego_id')->constrained()->onDelete('cascade'); // id del juego asociado con eliminación en cascada
            $table->string('plataforma'); // plataforma donde está disponible el juego
            $table->decimal('precio', 8, 2); // precio del juego con precisión de 8 dígitos y 2 decimales
            $table->string('url_compra'); // enlace para comprar el juego
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('precios'); // elimina la tabla 'precios'
    }
};