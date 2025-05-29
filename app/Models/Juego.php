<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', // nombre del juego
        'genero', // género del juego
        'descripcion', // descripción del juego
        'trailer', // enlace al tráiler del juego
        'imagen', // nombre del archivo de imagen del juego
        'fecha',  // fecha de lanzamiento del juego
    ];

    public function precios()
    {
        return $this->hasMany(Precio::class); // relación uno a muchos con el modelo Precio
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id'); // relación con el usuario que creó el juego
    }

    public function updated_by()
    {
        return $this->belongsTo(User::class, 'updated_by'); // relación con el usuario que actualizó el juego
    }
}