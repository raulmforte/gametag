<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasTable extends Migration
{
    public function up(): void
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id(); // id único para cada noticia
            $table->string('titular'); // titular de la noticia
            $table->text('descripcion'); // descripción de la noticia
            $table->string('imagen')->nullable(); // ruta o nombre de la imagen, opcional
            $table->timestamps(); // columnas created_at y updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('noticias'); // elimina la tabla 'noticias'
    }
}