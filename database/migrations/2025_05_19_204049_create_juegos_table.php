<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('juegos', function (Blueprint $table) {
            $table->id(); // id único para cada juego
            $table->string('nombre'); // nombre del juego
            $table->string('genero'); // género del juego
            $table->text('descripcion'); // descripción del juego
            $table->string('trailer')->nullable(); // enlace al tráiler del juego, opcional
            $table->string('imagen')->nullable(); // nombre del archivo de imagen del juego, opcional
            $table->timestamps(); // columnas created_at y updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('juegos'); // elimina la tabla 'juegos'
    }
};