<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateReviewTable extends Migration
{
    public function up()
    {
        Schema::create('review', function (Blueprint $table) {
            $table->bigIncrements('id'); // id único para cada review
            $table->unsignedBigInteger('id_juego'); // id del juego asociado
            $table->decimal('nota', 3, 1); // nota con precisión de 3 dígitos y 1 decimal
            $table->string('comentario', 255); // comentario del reviewer, máximo 255 caracteres
            $table->boolean('aceptada')->default(false); // estado de aceptación, por defecto false
            $table->string('nombre_reviewer', 100); // nombre del reviewer, máximo 100 caracteres
            $table->timestamps(); // columnas created_at y updated_at
            
            $table->foreign('id_juego')
                  ->references('id')
                  ->on('juegos')
                  ->onDelete('cascade'); // elimina las reviews asociadas si el juego es eliminado
        });

        // Agrega la restricción CHECK después de crear la tabla
        if (config('database.default') !== 'sqlite') {
            DB::statement('ALTER TABLE review ADD CONSTRAINT review_chk_1 CHECK (nota BETWEEN 1.0 AND 10.0)'); // restricción para que la nota esté entre 1.0 y 10.0
        }
    }

    public function down()
    {
        Schema::dropIfExists('review'); // elimina la tabla 'review'
    }
}