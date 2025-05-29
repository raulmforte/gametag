<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // id único para cada usuario
            $table->string('name'); // nombre del usuario
            $table->string('email')->unique(); // email único para cada usuario
            $table->timestamp('email_verified_at')->nullable(); // fecha de verificación del email, opcional
            $table->string('password'); // contraseña del usuario
            $table->rememberToken(); // token para "recordar sesión"
            $table->timestamps(); // columnas created_at y updated_at
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // email como clave primaria
            $table->string('token'); // token para restablecer la contraseña
            $table->timestamp('created_at')->nullable(); // fecha de creación del token
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // id único para cada sesión
            $table->foreignId('user_id')->nullable()->index(); // id del usuario asociado, opcional
            $table->string('ip_address', 45)->nullable(); // dirección IP del usuario
            $table->text('user_agent')->nullable(); // información del navegador del usuario
            $table->longText('payload'); // datos de la sesión
            $table->integer('last_activity')->index(); // última actividad en la sesión
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('users'); // elimina la tabla 'users'
        Schema::dropIfExists('password_reset_tokens'); // elimina la tabla 'password_reset_tokens'
        Schema::dropIfExists('sessions'); // elimina la tabla 'sessions'
    }
};