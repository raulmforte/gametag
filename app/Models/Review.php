<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review'; // especifica que use la tabla 'review'

    protected $fillable = [
        'id_juego', // id del juego asociado
        'nombre_reviewer', // nombre del reviewer
        'nota', // nota asignada al juego
        'comentario', // comentario del reviewer
        'aceptada', // estado de aceptación de la review
    ];

    public function juego()
    {
        return $this->belongsTo(Juego::class, 'id_juego'); // relación con el modelo Juego
    }
}