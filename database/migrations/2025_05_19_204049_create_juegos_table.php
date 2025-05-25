<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * inicia las migraciones para crear la tabla 'juegos'.
     */
    public function up(): void
    {
        Schema::create('juegos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('genero');
            $table->text('descripcion'); 
            $table->string('trailer')->nullable();
            $table->string('imagen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * retrocede las migraciones eliminando la tabla 'juegos'.
     */
    public function down(): void
    {
        Schema::dropIfExists('juegos');
    }
};
