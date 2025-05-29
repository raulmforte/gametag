<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id(); // id único para cada trabajo
            $table->string('queue')->index(); // nombre de la cola, indexado para búsquedas rápidas
            $table->longText('payload'); // datos del trabajo
            $table->unsignedTinyInteger('attempts'); // número de intentos realizados
            $table->unsignedInteger('reserved_at')->nullable(); // marca de tiempo cuando el trabajo fue reservado
            $table->unsignedInteger('available_at'); // marca de tiempo cuando el trabajo estará disponible
            $table->unsignedInteger('created_at'); // marca de tiempo cuando el trabajo fue creado
        });

        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary(); // id único para cada lote de trabajos
            $table->string('name'); // nombre del lote
            $table->integer('total_jobs'); // número total de trabajos en el lote
            $table->integer('pending_jobs'); // número de trabajos pendientes
            $table->integer('failed_jobs'); // número de trabajos fallidos
            $table->longText('failed_job_ids'); // ids de los trabajos fallidos
            $table->mediumText('options')->nullable(); // opciones adicionales para el lote
            $table->integer('cancelled_at')->nullable(); // marca de tiempo cuando el lote fue cancelado
            $table->integer('created_at'); // marca de tiempo cuando el lote fue creado
            $table->integer('finished_at')->nullable(); // marca de tiempo cuando el lote fue finalizado
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id(); // id único para cada trabajo fallido
            $table->string('uuid')->unique(); // uuid único para identificar el trabajo fallido
            $table->text('connection'); // conexión utilizada para el trabajo
            $table->text('queue'); // nombre de la cola donde estaba el trabajo
            $table->longText('payload'); // datos del trabajo fallido
            $table->longText('exception'); // detalles de la excepción que causó el fallo
            $table->timestamp('failed_at')->useCurrent(); // marca de tiempo cuando el trabajo falló
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs'); // elimina la tabla 'jobs'
        Schema::dropIfExists('job_batches'); // elimina la tabla 'job_batches'
        Schema::dropIfExists('failed_jobs'); // elimina la tabla 'failed_jobs'
    }
};