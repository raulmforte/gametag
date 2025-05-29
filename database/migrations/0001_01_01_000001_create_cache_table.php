<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary(); // clave única para cada entrada de caché
            $table->mediumText('value'); // valor almacenado en la caché
            $table->integer('expiration'); // tiempo de expiración de la entrada de caché
        });

        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary(); // clave única para cada bloqueo de caché
            $table->string('owner'); // propietario del bloqueo
            $table->integer('expiration'); // tiempo de expiración del bloqueo
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cache'); // elimina la tabla 'cache'
        Schema::dropIfExists('cache_locks'); // elimina la tabla 'cache_locks'
    }
};